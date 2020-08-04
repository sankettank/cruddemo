<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) {

	    	UserSeeder::create([

	            'name' => str_random(8),

	            'email' => str_random(12).'@mail.com',

	            'password' => bcrypt('123456')

	        ]);

    	}
    }
}
