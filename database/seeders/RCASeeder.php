<?php

namespace Database\Seeders;

use App\Models\Rca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RCASeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rca::create([
            'inspectionID' => 1,
            'rootCauseDescription' => 'Equipment malfunction',
            'impact' => 'Minor disruption',
            'correctiveAction' => 'Equipment maintenance',
        ]);

        RCA::create([
            'inspectionID' => 2,
            'rootCauseDescription' => 'Safety violation',
            'impact' => 'Safety risk',
            'correctiveAction' => 'Safety training',
        ]);
    }
}
