<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSkills extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users_skills')->insert([
            [
                "skills_id" => 1,
                "levels_id" => 2,
                "percentage" => 95,
                "color_id" => 1,
                "user_id" => 1
            ],[
                "skills_id" => 2,
                "levels_id" => 2,
                "percentage" => 30,
                "color_id" => 1,
                "user_id" => 1
            ],[
                "skills_id" => 3,
                "levels_id" => 2,
                "percentage" => 50,
                "color_id" => 1,
                "user_id" => 1
            ],
        ]);
    }
}
