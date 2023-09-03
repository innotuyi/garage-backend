<?php

namespace Database\Seeders;

use App\Models\Cooperative;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CooperativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Cooperative::create([
            'cooperativeName' => 'COOPROMA',
            'cooperativeLocation' => '123 Cooperative Street',
            'numberOfMembers' => 100,
            'productsOrServicesOffered' => 'Coffee, Tea, Bananas',
        ]);

        Cooperative::create([
            'cooperativeName' => 'COOPAC',
            'cooperativeLocation' => '456 Cooperative Avenue',
            'numberOfMembers' => 80,
            'productsOrServicesOffered' => 'Maize, Beans, Potatoes',
        ]);

    }
}
