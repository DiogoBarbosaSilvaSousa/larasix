<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

   // use RefreshDatabase;

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
     *  Tabela users
     *
     * @return void
     */
    public function testUserAdmin()
    {

        $users = User::where('email', 'admin@gmail.com')->exists();


        if ($users) {
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
}
