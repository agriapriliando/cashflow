<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jens')->insert([
            [
                'name' => 'In',
                'note' => 'Income, uang masuk',
            ],
            [
                'name' => 'Out',
                'note' => 'Outcome, uang keluar',
            ],
            [
                'name' => 'Transfer',
                'note' => 'Uang ditransfer',
            ],
        ]);
    }
}
