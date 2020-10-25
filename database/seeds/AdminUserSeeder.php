<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstName' => "Adnane",
            'lastName' => "Miliari",
            'username' => "miliari",
            'birthDate' => "2000-04-21",
            'sexe' => "H",
            'phoneNumber' => "0637819957",
            'email' => "miliari@test.com",
            'password' => bcrypt("miliari"),
            'status' => 1,
        ]);
    }
}
