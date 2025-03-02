<?php

namespace Database\Seeders;

use App\Models\MineralDeposit;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class MineralDepositSeeder extends Seeder
{
    public function run()
    {
        $filePath = storage_path('app/public/revenue_on_solid_minerals.xlsx');
        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true);

        foreach ($rows as $index => $row) {
            if ($index > 1) { // Skip the header row
                MineralDeposit::create([
                    'mineral_name' => $row['B'],
                    'description' => 'Imported from Excel'
                ]);
            }
        }
    }
}
