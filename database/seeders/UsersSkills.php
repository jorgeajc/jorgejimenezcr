<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSkills extends Seeder
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
                "user_id" => 1,
            ],[
                "skills_id" => 2,
                "user_id" => 1,
            ],[
                "skills_id" => 3,
                "user_id" => 1,
            ],
        ]);
    }
}
