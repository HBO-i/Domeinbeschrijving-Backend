<?php

namespace Database\Seeders;

use App\Models\Focus;
use App\Models\FocusTranslation;
use App\Models\Language;
use Illuminate\Database\Seeder;

class FocusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            'nl' => ['Toekomstgericht organiseren', 'Onderzoekend vermogen', 'Persoonlijk leiderschap', 'Doelgericht interacteren'],
            'en' => ['Future-oriented organisation', 'Investigative ability', 'Personal leadership', 'Targeted interaction']
        ];

        $languages = Language::get();

        for ($i = 0; $i < 4; $i++){
            Focus::create();
        }

        foreach ($values as $key => $value){
            $language = $languages->where('value', 'LIKE', $key)->first();

            foreach ($value as $translationKey => $translation){
                FocusTranslation::create([
                    'focus_id' => $translationKey + 1,
                    'value' => $translation,
                    'language_id' => $language->id
                ]);
            }
        }
    }
}
