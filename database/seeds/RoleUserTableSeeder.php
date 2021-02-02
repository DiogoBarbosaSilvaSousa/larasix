<?php

use Illuminate\Database\Seeder;
use App\RoleUser;
use App\User;
use App\Role;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Verifico se existe algum registro com o email selecionado
         * caso não eu crio um registro com o email selecionado.
         */
        $user = User::where('email','admin@gmail.com')->firstOr(function(){
                    return User::create([
                        'name' => 'Admin',
                        'email' => 'admin@gmail.com',
                        'email_verified_at' => now(),
                        'password' => Hash::make('password'),
                        'remember_token' => Str::random(10)
                    ]);
                });

        /**
         * Verifico se existe algum registro com o name selecionado
         * caso não eu crio um registro com o name selecionado.
         */
        $role =  Role::where('name','administrator')->firstOr(function(){
                    return Role::create([
                        'name' => 'administrator'
                    ]);
                });

        /**
         * Crio o registro na tabela intermediária que liga USERS a ROLES
         */
        RoleUser::firstOrCreate(['user_id' => $user->id, 'role_id' => $role->id]);
    }
}
