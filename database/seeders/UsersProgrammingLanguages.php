<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersProgrammingLanguages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users_programming_languages')->insert([
            [
                "percentage" => 95,
                "year_experience" => 1,
                "programming_languages_id" => 1,
                "user_id" => 1,
                "level_id" => 1,
            ],[
                "percentage" => 10,
                "year_experience" => 2,
                "programming_languages_id" => 2,
                "user_id" => 1,
                "level_id" => 1,
            ],[
                "percentage" => 95,
                "year_experience" => 1,
                "programming_languages_id" => 3,
                "user_id" => 1,
                "level_id" => 1,
            ],[
                "percentage" => 95,
                "year_experience" => 1,
                "programming_languages_id" => 3,
                "user_id" => 1,
                "level_id" => 1,
            ],
        ]);
    }
}
