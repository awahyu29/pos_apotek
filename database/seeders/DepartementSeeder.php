<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departement;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departements = [
            [
                'name' => 'Apoteker',
                'description' => 'Desc'
            ],
            [
                'name' => 'Assist Apoteker',
                'description' => 'Desc'
            ],

        ];

        foreach ($departements as $departement) {
            Departement::create($departement);
        }
    }
}
