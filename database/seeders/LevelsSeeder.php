<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('levels')->insert([
            [
                "name" => "BEGINNER",
            ],[
                "name" => "MASTER",
            ],[
                "name" => "EXPERT",
            ],[
                "name" => "ADVANCE",
            ],
        ]);
    }
}
