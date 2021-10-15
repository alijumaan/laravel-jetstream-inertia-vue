<?php

namespace Database\Seeders;

use App\Models\Item;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::factory(50)->create();
    }
}
