<?php

namespace Database\Seeders;

use App\Models\Inspector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InspectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inspector::create([
            'name' => 'Michael Johnson',
            'email' => 'michael@example.com',
        
        ]);

        Inspector::create([
            'name' => 'Sarah Williams',
            'email' => 'sarah@example.com',
           
        ]);
    }
}
