<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'XBOX',
            'slug' => 'xbox',
        ]);
        Category::create([
            'name' => 'PS5',
            'slug' => 'ps5',
        ]);
        Category::create([
            'name' => 'PC',
            'slug' => 'pc',
        ]);
        Category::create([
            'name' => 'PSP',
            'slug' => 'psp',
        ]);
    }
}
