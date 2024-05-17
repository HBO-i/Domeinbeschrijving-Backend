<?php

namespace Database\Seeders;

use App\Models\ArchitectureLayer;
use App\Models\ArchitectureLayerTranslation;
use App\Models\Language;
use Illuminate\Database\Seeder;

class ArchitectureLayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            'nl' => ['Gebruikersinteractie', 'Organisatieprocessen', 'Infrastructuur', 'Software', 'Hardware-interfacing'],
            'en' => ['User interaction', 'Organisational processes', 'Infrastructure', 'Software', 'Hardware-interfacing']
        ];

        $languages = Language::get();

        for ($i = 0; $i < 5; $i++){
            ArchitectureLayer::create();
        }

        foreach ($values as $key => $value){
            $language = $languages->where('value', 'LIKE', $key)->first();

            foreach ($value as $translationKey => $translation){
                ArchitectureLayerTranslation::create([
                    'value' => $translation,
                    'architecture_layer_id' => $translationKey + 1,
                    'language_id' => $language->id
                ]);
            }
        }
    }
}
