<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessionalSkillsIndexRequest;
use App\Http\Resources\FocusResource;
use App\Http\Services\DescriptionService;

class ProfessionalSkillsController extends Controller
{
    /**
     * Show the professional skills descriptions.
     */
    public function index(ProfessionalSkillsIndexRequest $request)
    {
        $validated = $request->validated();

        $language = null;

        if (array_key_exists('language', $validated)){
            $language = Language::find($validated['language']);
        } else { // Set default value to NL.
            $language = Language::where('value', 'LIKE', 'nl')->first();
        }

        $foci = Focus::with(['translations' => function ($translations) use ($language){
            return $translations->where('language_id', '=', $language->id);
        }, 'competencies' => function ($competency) use ($language){
            return $competency->with(['translations' => function ($translations) use ($language){
                return $translations->where('language_id', '=', $language->id);
            }, 'description' => function ($description) use ($language){
                return $description->with(['translations' => function ($translations) use ($language){
                    return $translations->where('language_id', '=', $language->id);
                }]);
            }]);
        }])->get();

        return FocusResource::collection($foci);
    }
}
