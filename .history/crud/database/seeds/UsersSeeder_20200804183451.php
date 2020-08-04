<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UsersSeeder::truncate();
           $users = [
            [
              'name' => 'Super Admin',
              'email' => 'superadmin@gmail.com',
              'password' => '123456',
            ],
            [
              'name' => 'User',
              'email' => 'user@gmail.com',
              'password' => '13456',
            ],
             [
              'name' => 'Client',
              'email' => 'client@gmail.com',
              'password' => '13456',
            ]
          ];

          foreach($users as $user)
          {
              User::create([
               'name' => $user['name'],
               'email' => $user['email'],
               'password' => Hash::make($user['password'])
             ]);
           }
    }
}
