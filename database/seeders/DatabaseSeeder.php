<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public static function getNLExcelPath(): string
    {
        return storage_path('app/public/excel/DB23_kubus_NL.xlsx');
    }

    public static function getENExcelPath(): string
    {
        return storage_path('app/public/excel/DB23_kubus_EN.xlsx');
    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LanguageSeeder::class,
            ArchitectureLayerSeeder::class,
            ActivitySeeder::class,
            LevelSeeder::class,
            FocusSeeder::class,
            DescriptionSeeder::class,
            CompetencySeeder::class,
            ProfessionalSkillsDescriptionSeeder::class
        ]);
    }
}
