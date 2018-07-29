<?php

use Illuminate\Database\Seeder;
use Ngsoft\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'lastname' => 'Puello Gonzalez',
            'name' => 'Victor',
           'email' => 'victor.puello@gmail.com',
            'username' => 'victor.puello',
            'type' => 'admin'
        ]);
       // factory(User::class,40)->create();
    }
}
