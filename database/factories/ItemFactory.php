<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nomenclature = $this->faker->userName();
        return [
            'nomenclature' => $nomenclature,
            'sku' => substr(strtoupper(str_replace(array('a','b,c,d,f,g,h,j,k,l,m,n,p,q,r,s,t,v,w,x,y,z'), '-', $nomenclature)), 0, 20),
            'part' => substr(strtoupper(str_replace(array(1, 2, 3, 4, 5, 6), '', $nomenclature)), 0, 10),
            'color' => $this->faker->colorName(),
            'size' => $this->faker->numberBetween(1, 15),
            'quantity' => $this->faker->numberBetween(5, 200),
        ];
    }
}
