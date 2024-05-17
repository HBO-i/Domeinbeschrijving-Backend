<?php

namespace Database\Seeders;

use App\Models\Competency;
use App\Models\CompetencyTranslation;
use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            'nl' => ['Organisatorische context', 'Ethiek', 'Procesmanagement', 'Methodische Probleemaanpak', 'Onderzoek', 'Oplossing', 'Ondernemend zijn', 'Persoonlijke ontwikkeling', 'Persoonlijke profilering', 'Partners', 'Communicatie', 'Samenwerking'],
            'en' => ['Organisational context', 'Ethics', 'Process management', 'Methodical problem approach', 'Research', 'Solution', 'Entrepreneurial mindset', 'Personal development', 'Personal profiling', 'Partners', 'Communication', 'Collaboration']
        ];

        $languages = Language::get();

        for ($i = 0; $i < 12; $i++){
            Competency::create([
                'focus_id' => round((($i - 1) / 3) + 1)
            ]);
        }

        foreach ($values as $key => $value){
            $language = $languages->where('value', 'LIKE', $key)->first();

            foreach ($value as $translationKey => $translation){
                CompetencyTranslation::create([
                    'value' => $translation,
                    'competency_id' => $translationKey + 1,
                    'language_id' => $language->id
                ]);
            }
        }
    }
}
