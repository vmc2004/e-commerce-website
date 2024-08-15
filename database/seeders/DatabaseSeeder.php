<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Size::query()->create(['name'=>'S']);
        Size::query()->create(['name'=>'M']);
        Size::query()->create(['name'=>'L']);

        Color::query()->create(['name'=>'Xanh']);
        Color::query()->create(['name'=>'Đỏ']);
        Color::query()->create(['name'=>'Tím']);

        for($i=0;$i<100; $i++){
            ProductVariant::query()->create([
                'product_id'=>rand(1,100),
                'color_id'=> rand(1,3),
                'size_id'=> rand(1,3),
                'quantity'=> rand(1,1000),
                'image'=> 'https://media.canifa.com/Simiconnector/SP-moi_Nam-19.04a.webp',
                
            ]);
        }
    }
}
