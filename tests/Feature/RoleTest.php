<?php

namespace Tests\Feature;

use App\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /**
     * Tabela roles verificar se existe o perfil 'admin'
     */

    public function roleAdmin()
    {

        $roles = Role::where('name','admin')->exists();

        if($roles){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
}
