<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::where('name','administrator')->firstOr(function(){
            Role::create(['name' => 'administrator']);
        });

        Role::where('name','editor')->firstOr(function(){
            Role::create(['name' => 'editor']);
        });

        Role::where('name','author')->firstOr(function(){
            Role::create(['name' => 'author']);
        });

        Role::where('name','contributor')->firstOr(function(){
            Role::create(['name' => 'contributor']);
        });

        Role::where('name','subscriber')->firstOr(function(){
            Role::create(['name' => 'subscriber']);
        });

    }
}
