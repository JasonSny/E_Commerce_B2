<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i < 10; $i++)
        {
            Product::create([
                'title' => $faker->randomElement(['GTA', 'Rust', 'PUBG', 'CSGO', ' Call Of Duty : Modern Warfare'
                , 'Doom', 'Battlefield V', 'Skyrim', 'Tetris', 'monkaS Game', 'Dora']),
                'slug' => $faker->slug,
                'subtitle' => $faker->sentence(4),
                'description' => $faker->text,
                'price' => $faker->numberBetween(3, 120),
                'image' => 'https://via.placeholder.com/200x250'

            ])->categories()->attach([
                rand(1, 4),
                rand(1, 4)
            ]);
        }
    }
}
