<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::where('name','auto')->firstOr(function(){
            Category::create(['name' => 'auto']);
        });

        Category::where('name','comida')->firstOr(function(){
            Category::create(['name' => 'comida']);
        });

        Category::where('name','vida')->firstOr(function(){
            Category::create(['name' => 'vida']);
        });

        Category::where('name','tecnologia')->firstOr(function(){
            Category::create(['name' => 'tecnologia']);
        });
    }
}
