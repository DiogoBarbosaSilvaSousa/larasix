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
        Role::where('name','admin')->firstOr(function(){
            Role::create([
                'name' => 'admin'
            ]);
        });

        $roles = factory(Role::class,3)->create();

    }
}
