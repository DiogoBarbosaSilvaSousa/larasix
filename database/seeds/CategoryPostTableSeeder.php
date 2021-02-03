<?php

use Illuminate\Database\Seeder;
use App\CategoryPost;

class CategoryPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Crio o registro na tabela intermediária que liga POSTS a CATEGORIES
         */
        CategoryPost::firstOrCreate(['post_id' => 1, 'category_id' => 1]);
        CategoryPost::firstOrCreate(['post_id' => 2, 'category_id' => 2]);
        CategoryPost::firstOrCreate(['post_id' => 3, 'category_id' => 3]);
        CategoryPost::firstOrCreate(['post_id' => 4, 'category_id' => 4]);
        CategoryPost::firstOrCreate(['post_id' => 5, 'category_id' => 1]);
        CategoryPost::firstOrCreate(['post_id' => 6, 'category_id' => 2]);
        CategoryPost::firstOrCreate(['post_id' => 7, 'category_id' => 3]);
        CategoryPost::firstOrCreate(['post_id' => 8, 'category_id' => 4]);
        CategoryPost::firstOrCreate(['post_id' => 9, 'category_id' => 1]);
        CategoryPost::firstOrCreate(['post_id' => 10, 'category_id' => 2]);
        CategoryPost::firstOrCreate(['post_id' => 11, 'category_id' => 3]);
        CategoryPost::firstOrCreate(['post_id' => 12, 'category_id' => 4]);
    }
}
