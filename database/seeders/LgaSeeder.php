<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LgaSeeder extends Seeder
{
    public function run(): void
    {
        $localGovernments = [
            'Birnin Gwari', 'Chikun', 'Giwa', 'Igabi', 'Ikara', 'Jaba', "Jema'a",
            'Kachia', 'Kaduna North', 'Kaduna South', 'Kagarko', 'Kajuru', 'Kaura',
            'Kauru', 'Kubau', 'Kudan', 'Lere', 'Makarfi', 'Sabon Gari', 'Sanga',
            'Soba', 'Zangon Kataf', 'Zaria'
        ];

        foreach ($localGovernments as $lga) {
            DB::table('lgas')->insert([
                'name' => $lga,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
