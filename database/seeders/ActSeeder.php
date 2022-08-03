<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acts')->insert([
            [
                'user_id' => 1,
                'jen_id' => 1,
                'tanggal' => Carbon::now(),
                'note' => 'Gajih Agustus 2022',
                'nominal' => 3300000,
            ],
            [
                'user_id' => 1,
                'jen_id' => 1,
                'tanggal' => Carbon::now(),
                'note' => 'Tukin 2022',
                'nominal' => 3000000,
            ],
        ]);
    }
}
