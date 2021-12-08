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
    public function run() {
        $skills = \DB::table('skills')->select('id')->get();
        $levels = \DB::table('levels')->pluck('id')->toArray();
        if( $skills->count() ) {
            foreach( $skills as $skill ) {
                \DB::table('users_skills')->insert([[
                    "skills_id" => $skill->id,
                    "user_id" => 1,

                    "percentage" => rand(1, 100),
                    "year_experience" => 1,
                    "level_id" => count($levels)>0 ? $levels[array_rand($levels)] : 1,
                ]]);
            }
        }
    }
}
