<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('skills')->insert([
            [
                "name" => "HTML5",
            ],[
                "name" => "CSS3",
            ],[
                "name" => "JavaScript",
            ],[
                "name" => "JQuery",
            ],[
                "name" => "Sass",
            ],[
                "name" => "Bootstrap",
            ],[
                "name" => "VueJs",
            ],[
                "name" => "NodeJs",
            ],

            [
                "name" => "PHP",
            ],[
                "name" => "Laravel",
            ],[
                "name" => "Java",
            ],[
                "name" => "ASP .NET",
            ],[
                "name" => "C#",
            ],

            [
                "name" => "MySql",
            ],[
                "name" => "Sql Server",
            ],[
                "name" => "MongoDB",
            ],[
                "name" => "Oracle",
            ],[
                "name" => "SqLite",
            ],

            [
                "name" => "Stripe",
            ],[
                "name" => "AWS",
            ],[
                "name" => "Git",
            ],[
                "name" => "Flutter",
            ],[
                "name" => "PHPUnit",
            ],[
                "name" => "Jest",
            ],[
                "name" => "Swagger",
            ],
        ]);
    }
}
