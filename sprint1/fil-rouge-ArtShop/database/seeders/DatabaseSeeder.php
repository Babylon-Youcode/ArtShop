<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Category::create(['name'=>'Standard', 'slug'=>'Standard', 'description'=>'standard category']);
        Category::create(['name'=>'Diptyque', 'slug'=>'Diptyque', 'description'=>'Diptyque category']);
        Category::create(['name'=>'triptyque', 'slug'=>'triptyque', 'description'=>'triptyque category']);
        Category::create(['name'=>'Quadruple', 'slug'=>'Quadruple', 'description'=>'Quadruple category']);
    }
        Product::create([
             'name'=>'std',
             'image'=>'product/',
             'price'=>rand(150,200),
             'description'=>'This is description of a product',
             'additional_info'=>'This is description of a additional_info',
             'category_id'=>rand(1,3)
         ]);
}
