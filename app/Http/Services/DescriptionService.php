<?php

namespace App\Http\Services;

use App\Models\Language;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DescriptionService
{
    private static array $dictionary = [
        'levels' => [
            'id' => 'level_id',
            'value' => 'level_value'
        ],
        'activities' => [
            'id' => 'activity_id',
            'value' => 'activity_translation_value'
        ],
        'architecture_layers' => [
            'id' => 'architecture_layer_id',
            'value' => 'architecture_layer_translation_value'
        ]
    ];

    public function getSkills($validated)
    {
        $language = null;

        if (array_key_exists('language', $validated)){
            $language = Language::find($validated['language']);
        } else { // Set default value to NL.
            $language = Language::where('value', 'LIKE', 'nl')->first();
        }
        
        $query = DB::table('foci')->select(
            'foci.id AS focus_id',
            'focus_translations.value AS focus_value',
            'competencies.id AS competency_id',
            'competency_translations.value AS competency_value',
            'professional_skills_descriptions.id AS description_id',
            'professional_skills_description_translations.value AS description_value'
        )->join('focus_translations', 'foci.id', '=', 'focus_translations.focus_id')
        ->join('competencies', 'foci.id', '=', 'competencies.focus_id')
        ->join('competency_translations', 'competencies.id', '=', 'competency_translations.competency_id')
        ->join('professional_skills_descriptions', 'competencies.id', '=', 'professional_skills_descriptions.competency_id')
        ->join('professional_skills_description_translations', 'professional_skills_descriptions.id', '=', 'professional_skills_description_translations.professional_skills_description_id', 'inner')
        ->where('focus_translations.language_id', '=', $language->id)
        ->where('competency_translations.language_id', '=', $language->id)
        ->where('professional_skills_description_translations.language_id', '=', $language->id);

        if(array_key_exists('search', $validated)){
            $query->where('professional_skills_description_translations.value', 'LIKE', '%'.$validated['search'].'%');
        }

        $foci = $query->get();

        return $this->groupProfessionalSkills($foci);
    }

    /**
     * Display the descriptions.
     */
    public function getDescriptions($validated)
    {
        // Set default grouping.
        if (!isset($validated['grouping'])){
            $validated['grouping'] = 'architecture_layers,activities,levels';
        }

        // Set default language to dutch.
        if (!isset($validated['language'])){
            $validated['language'] = Language::where('value', 'LIKE', 'nl')->first()->id;
        }

        /** @var \Illuminate\Database\Eloquent\Builder $descriptionQuery The query instance. */
        $descriptionQuery = DB::table('descriptions')->select(
            'descriptions.id', 
            'descriptions.activity_id', 
            'descriptions.architecture_layer_id', 
            'descriptions.level_id',
            'levels.value as level_value',
            'description_translations.value as description_translation_value',
            'architecture_layer_translations.value as architecture_layer_translation_value',
            'activity_translations.value as activity_translation_value'
        )
            ->join('description_translations', 'descriptions.id', '=', 'description_translations.description_id')
            ->join('activity_translations', 'activity_translations.activity_id', '=', 'descriptions.activity_id')
            ->join('architecture_layer_translations', 'architecture_layer_translations.architecture_layer_id', '=', 'descriptions.architecture_layer_id')
            ->join('levels', 'levels.id', '=', 'descriptions.level_id')
            ->orderby('descriptions.architecture_layer_id')
            ->orderBy('descriptions.activity_id')
            ->orderBy('levels.id');

        // Apply the search filter.
        if (isset($validated['search'])){
            $descriptionQuery = $descriptionQuery->where('description_translations.value', 'LIKE', '%'.$validated['search'].'%');
        }

        // Apply the level filters.
        if (isset($validated['level'])) {
            $descriptionQuery = $descriptionQuery->whereIn('descriptions.level_id', $validated['level']);
        }

        // Apply the activity filters.
        if (isset($validated['activity'])) {
            $descriptionQuery = $descriptionQuery->whereIn('descriptions.activity_id', $validated['activity']);
        }

        // Apply the architecture layer filters.
        if (isset($validated['architecture_layer'])) {
            $descriptionQuery = $descriptionQuery->whereIn('descriptions.architecture_layer_id', $validated['architecture_layer']);
        }

        // Retrieve the data with the correct translations.
        $descriptionQuery = $descriptionQuery
            ->where('description_translations.language_id', '=', $validated['language'])
            ->where('activity_translations.language_id', '=', $validated['language'])
            ->where('architecture_layer_translations.language_id', '=', $validated['language']);

        $descriptions = $this->groupDescriptions($descriptionQuery->get(), explode(',', $validated['grouping']));

        return $descriptions;
    }

    private function groupProfessionalSkills(Collection $descriptions)
    {
        $foci = $descriptions->unique('focus_id');

        foreach($foci as $focus){
            $focus->competencies = $descriptions->where('focus_id', '=', $focus->focus_id);
        }

        return $foci;
    }

    /**
     * Group the descriptions based on the provided grouping order.
     * 
     * @param Collection $descriptions The description query collection.
     * @param array $grouping The grouping order.
     */
    private function groupDescriptions(Collection $descriptions, array $grouping)
    {
        $results = [];

        foreach ($descriptions as $item){
            $arrayItem = (array) $item;
            $primary = array_filter($results, function ($e) use ($arrayItem, $grouping){
                return $e['id'] == $arrayItem[self::$dictionary[$grouping[0]]['id']];
            });

            $primaryKey = array_key_first($primary);

            if ($primaryKey === null){
                $primary = [
                    'id' => $arrayItem[self::$dictionary[$grouping[0]]['id']], 
                    'value' => $arrayItem[self::$dictionary[$grouping[0]]['value']], 
                    'items' => []
                ];
            } else {
                $primary = $primary[$primaryKey];
            }

            $secondary = array_filter($primary['items'], function ($e) use ($arrayItem, $grouping){
                return $e['id'] == $arrayItem[self::$dictionary[$grouping[1]]['id']];
            });
            
            $secondaryKey = array_key_first($secondary);
            
            if ($secondaryKey === null){
                $secondary = [
                    'id' => $arrayItem[self::$dictionary[$grouping[1]]['id']],
                    'value' => $arrayItem[self::$dictionary[$grouping[1]]['value']],
                    'items' => []
                ];
            } else {
                $secondary = $secondary[$secondaryKey];
            }

            $tertiary = array_filter($secondary['items'], function ($e) use ($arrayItem, $grouping){
                return $e['id'] == $arrayItem[self::$dictionary[$grouping[2]]['id']];
            });

            $tertiaryKey = array_key_first($tertiary);

            if ($tertiaryKey === null){
                $tertiary = [
                    'id' => $arrayItem[self::$dictionary[$grouping[2]]['id']],
                    'value' => $arrayItem[self::$dictionary[$grouping[2]]['value']],
                    'items' => []
                ];
            } else {
                $tertiary = $tertiary[$tertiaryKey];
            }
            
            $tertiary['items'][] = $item->description_translation_value;
            $tertiaryKey === null ? $secondary['items'][] = $tertiary : $secondary['items'][$tertiaryKey] = $tertiary;
            $secondaryKey === null ? $primary['items'][] = $secondary : $primary['items'][$secondaryKey] = $secondary;
            $primaryKey === null ? $results[] = $primary : $results[$primaryKey] = $primary;
        }

        return $results;
    }
}