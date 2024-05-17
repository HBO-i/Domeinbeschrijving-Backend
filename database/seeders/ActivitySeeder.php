<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\ActivityTranslation;
use App\Models\Language;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            'nl' => ['Analyseren', 'Adviseren', 'Ontwerpen', 'Realiseren', 'Manage & control'],
            'en' => ['Analysis', 'Advise', 'Design', 'Realise', 'Manage & control'],
        ];
        $languages = Language::get();

        for ($i = 0; $i < 5; $i++){
            Activity::create();
        }

        foreach($values as $key => $value){
            $language = $languages->where('value', 'LIKE', $key)->first();

            foreach($value as $translationKey => $translation){
                ActivityTranslation::create([
                    'value' => $translation,
                    'activity_id' => $translationKey + 1,
                    'language_id' => $language->id,
                ]);
            }
        }
    }
}
