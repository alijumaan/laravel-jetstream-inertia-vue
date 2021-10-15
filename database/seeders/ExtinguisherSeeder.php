<?php

namespace Database\Seeders;

use App\Models\Extinguisher;
use Illuminate\Database\Seeder;

class ExtinguisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Extinguisher::create([
            'type' => 'water',
            'slug' => 'water',
        ]);

        Extinguisher::create([
            'type' => 'foam',
            'slug' => 'foam',
        ]);

        Extinguisher::create([
            'type' => 'powder',
            'slug' => 'powder',
        ]);

        Extinguisher::create([
            'type' => 'co2',
            'slug' => 'co2',
        ]);
    }
}
