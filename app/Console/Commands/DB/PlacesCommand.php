<?php

namespace App\Console\Commands\DB;

use Exception;
use App\Models\Place;
use App\Models\Industry;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PlacesCommand extends Command
{
    protected $signature = 'db:store-places';


    protected $description = 'store places';

    public function handle(): void
    {
        $filePath = 'Places/Base.xlsx';
        $spreadsheet = IOFactory::load(Storage::disk('public')->path($filePath));
        $sheet = $spreadsheet->getActiveSheet();
        $rowCount = $sheet->getHighestRow();
        $currentIndustry = '';

        try {
            for ($row = 2; $row <= $rowCount; $row++) {
                $industryName = $sheet->getCell('A' . $row)->getValue();
                $namePlace = $sheet->getCell('B' . $row)->getValue();
                $descriptionPlace = $sheet->getCell('C' . $row)->getValue();

                if (! empty(trim($industryName)) && strtoupper($industryName) === $industryName)
                    $currentIndustry = trim($industryName);

                if (! empty(trim($namePlace)) && ! empty(trim($descriptionPlace))) {
                    $industry = Industry::firstWhere('name', $currentIndustry);

                    Place::create([
                        'industry_id' => $industry->id,
                        'name' => $namePlace,
                        'description' => $descriptionPlace
                    ]);
                }
            }
            $this->info('places stored');
        } catch (Exception $exception) {
            $this->error('Error: ' . $exception->getMessage());
        }
    }
}
