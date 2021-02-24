<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task')->insert([
            'task' => Str::random(10),
            'due_date' => date("Y-m-d H:i:s"),
            'status' => 'A',
        ]);
    }
}
