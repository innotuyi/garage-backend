<?php

namespace Database\Seeders;

use App\Models\Inspection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InspectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Inspection::create([
            'cooperativeId' => 1,
            'insepectorId' => 1,
            'inspectionDate' => '2023-04-20',
            'inspectionType' => 'Routine',
            'inspectionResults' => 'Passed',
        ]);

        Inspection::create([
            'cooperativeId' => 2,
            'insepectorId' => 2,
            'inspectionDate' => '2023-04-21',
            'inspectionType' => 'Spot Check',
            'inspectionResults' => 'Failed',
        ]);

    }
}
