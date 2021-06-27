<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProgrammingLanguages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('programming_languages')->insert([
            [
                "name" => "HTML",
            ],[
                "name" => "CSS",
            ],[
                "name" => "JavaScript",
            ],[
                "name" => "WordPress",
            ],[
                "name" => "Adobe Photoshop",
            ],[
                "name" => "Adobe Illustrator",
            ],[
                "name" => "Sketch",
            ],[
                "name" => "Adobe XD",
            ],
        ]);
    }
}
