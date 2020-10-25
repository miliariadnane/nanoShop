<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSaveUser()
    {
        $user = new User();

        $user->firstName = "";
        $user->lastName = "miliari";
        $user->username = "miliari";
        $user->birthDate = "1998-07-21";
        $user->email = "miliari@test.com";
        $user->sexe = "H";
        $user->status = 1;
        $user->phoneNumber = "0600002020";
        $user->address = "boudnib, errachidia";
        $user->password = bcrypt("miliari");

        $user->save();
        
        // vérifier l'égalité
        $this->assertDatabaseHas('users', [
            'firstName' => 'adnane',
            'username' => 'miliari',
            'address' => 'boudnib, errachidia',
        ]);
        

        /*
         $this->assertDatabaseMissing('users', [
             'firstName' => 'adnane',
         ]);
        */
    }
 
    public function testUserStoreValide() {
        $data = [
            'firstName' => 'adnane',
            'username' => 'miliari',
            'address' => 'boudnib, errachidia',
        ];

        $this->post('/users', $data)
             ->assertStatus(302);

    }


    public function testUserStoreFail() {
        $data = [
            'firstName' => '',
            'username' => '',
            'email' => '',
        ];

        $this->post('/users', $data)
             ->assertStatus(302)
             ->assertSessionHas('errors');
        
        $messages = session('errors')->getMessages();
        $this->assertEquals($messages['firstName'][0],'The firstName filed is required');
    }

}
