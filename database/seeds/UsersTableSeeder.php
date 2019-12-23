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
        DB::table('users')->insert([
            'firstname' => 'André',
            'lastname' => 'Kedl',
            'email' => 'andre@kedl.ca',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'firstname' => 'Stéphan',
            'lastname' => 'Paquet',
            'email' => 'stephanpaquet@gmail.com',
            'password' => bcrypt('4patates'),
        ]);
    }
}
