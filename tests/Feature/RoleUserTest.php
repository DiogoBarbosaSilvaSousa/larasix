<?php

namespace Tests\Feature;

use App\RoleUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class RoleUserTest extends TestCase
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
     * Tabela role_user (intermediária)
     *
     * @return void
     */

    public function testRoleUser()
    {

        $rolesUsers = RoleUser::count();

        if($rolesUsers > 0) {
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }


    }


}
