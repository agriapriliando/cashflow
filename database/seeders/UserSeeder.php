<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'agri',
                'email' => 'agri@gmail.com',
                'password' => bcrypt('password'),
            ],
            [
                'username' => 'dita',
                'email' => 'dita@gmail.com',
                'password' => bcrypt('password'),
            ]
        ]);
    }
}
