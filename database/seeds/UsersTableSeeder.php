<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();

        if($users->count() ==0){
            $this->command->info("please create some users !");
            return;
        }

        $nbUsers = (int)$this->command->ask("How many of user you want generate ?", 5);

        factory(App\User::class,  $nbUsers)->create();  
    }
}
