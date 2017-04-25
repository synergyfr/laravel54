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
        // foreach  50
        //App\User::create([
    	//
        //]);

        // factory('App\User', 50)->create(); 
        // create 50 users

        // create user models, but not persist them
        // create or make
        factory('App\User', 50)->create([
        	'name' => 'John Doe'
        ]);


    }
}
