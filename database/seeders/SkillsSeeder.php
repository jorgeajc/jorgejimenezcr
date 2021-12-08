<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skills;

class SkillsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $skills = [
            "HTML5", "CSS3", "JavaScript", "JQuery", "Sass", "Bootstrap", "VueJs", "NodeJs",
            "PHP", "Laravel", "Java", "ASP .NET", "C#",
            "MySql", "Sql Server", "MongoDB", "Oracle", "SqLite",
            "Stripe", "AWS", "Git",
            "Flutter",
            "PHPUnit", "Jest", "Swagger",
        ];
        foreach ($skills as $skill) {
            Skills::updateOrCreate(
                [
                    "name" => $skill
                ],[
                    "name" => $skill
                ]
            );
        }
    }
}
