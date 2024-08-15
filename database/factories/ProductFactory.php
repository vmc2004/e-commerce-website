<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->text(25);
        return [

            'code'          => Str::random(9),
            'name'          =>  $name,
            'slug'          => Str::slug($name) .'-'.  Str::random(8),
            'image'         => 'https://th.bing.com/th/id/OIP.8S7khZ-BbVNwYTQlIOCKJAHaLI?w=124&h=187&c=7&r=0&o=5&dpr=1.3&pid=1.7',
            'price'         => rand(10,100),
            'price_sale'    => null,
            'description'   => fake()->paragraph(),
            'material'      => fake()->text(50),
            'category_id'   => rand(1,4),
            'brand_id'      => rand(1,3)
        ];
    }
}
