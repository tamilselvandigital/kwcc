<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('history')->insert([
            'title' => Str::random(10),
            'description' => Str::random(80),
            'event_date' => date("Y-m-d"),
            'status' => 'NEW',
        ]);
    }
}
