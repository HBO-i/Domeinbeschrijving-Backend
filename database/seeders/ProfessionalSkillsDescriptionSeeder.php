<?php

namespace Database\Seeders;

use App\Models\CompetencyTranslation;
use App\Models\Language;
use App\Models\ProfessionalSkillsDescription;
use App\Models\ProfessionalSkillsDescriptionTranslation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ProfessionalSkillsDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 12; $i++){
            ProfessionalSkillsDescription::create([
                'competency_id' => $i + 1
            ]);
        }

        $reader = new Xlsx();
        $spreadsheet = $reader->load(DatabaseSeeder::getNLExcelPath());

        $language = Language::where('value', 'LIKE', 'nl')->first();

        $this->readExcelSheet($spreadsheet, $language);

        $spreadsheet = $reader->load(DatabaseSeeder::getENExcelPath());

        $language = Language::where('value', 'LIKE', 'en')->first();

        $this->readExcelSheet($spreadsheet, $language);
    }

    private function readExcelSheet(Spreadsheet $spreadsheet, Language $language) : void
    {
        $sheetNames = array_filter($spreadsheet->getSheetNames(), function ($v) {
            return $v === 'profskills';
        });

        if (count($sheetNames) > 0){
            $sheetName = reset($sheetNames);
            
            $workSheet = $spreadsheet->getSheetByName($sheetName);
            
            $seperatorColor = 'C00000';
            $currentRowIndex = 3;
            $competencyColumn = 'B';
            $descriptionColumn = 'C';

            $endRow = null;

            while($endRow === null){
                $currentCell = $workSheet->getCell($descriptionColumn.$currentRowIndex);

                if ($currentCell->getStyle()->getFill()->getStartColor()->getRGB() === $seperatorColor) {
                    $currentRowIndex++;
                    continue;
                }

                if ($currentCell->getStyle()->getFill()->getStartColor()->getRGB() === 'FFFFFF') {
                    $endRow = $currentRowIndex;
                    continue;
                }

                $description = $this->getCellValue($currentCell);

                $currentCell = $workSheet->getCell($competencyColumn.$currentRowIndex);
                $competencyTranslationValue = $this->getCellValue($currentCell);
                $competencyTranslation = CompetencyTranslation::where('value', 'LIKE', rtrim($competencyTranslationValue))->first();
                $professionalSkillsDescription = $competencyTranslation->competency()->first()->description()->first();

                ProfessionalSkillsDescriptionTranslation::create([
                    'value' => $description,
                    'professional_skills_description_id' => $professionalSkillsDescription->id,
                    'language_id' => $language->id
                ]);

                $currentRowIndex++;
            }
        }
    }

    private function getCellValue(Cell $cell) : ?string
    {
        return gettype($cell->getValue()) == 'string' || $cell->getValue() === null
            ? $cell->getValue() 
            : $cell->getValue()->getPlainText();
    }
}
