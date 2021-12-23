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
            ["name"=>"HTML5", "type" => "frontend", "path"=>"assets_portfolio/img/skills/html.png"],
            ["name"=>"CSS3", "type" => "frontend", "path"=>"assets_portfolio/img/skills/css.png"],
            ["name"=>"JavaScript", "type" => "frontend", "path"=>"assets_portfolio/img/skills/js.png"],
            ["name"=>"JQuery", "type" => "frontend", "path"=>"assets_portfolio/img/skills/jquery.png"],
            ["name"=>"Ajax", "type" => "frontend", "path"=>"assets_portfolio/img/skills/ajax.png"],
            ["name"=>"Sass", "type" => "frontend", "path"=>"assets_portfolio/img/skills/sass.png"],
            ["name"=>"Bootstrap", "type" => "frontend", "path"=>"assets_portfolio/img/skills/bootstrap.png"],
            ["name"=>"VueJs", "type" => "frontend", "path"=>"assets_portfolio/img/skills/vuejs.png"],
            ["name"=>"NodeJs", "type" => "frontend", "path"=>"assets_portfolio/img/skills/nodejs.png"],

            ["name"=>"PHP", "type" => "backend", "path"=>"assets_portfolio/img/skills/php.png"],
            ["name"=>"Laravel", "type" => "backend", "path"=>"assets_portfolio/img/skills/laravel.png"],
            ["name"=>"Java", "type" => "backend", "path"=>"assets_portfolio/img/skills/java.jpg"],
            ["name"=>"ASP .NET", "type" => "backend", "path"=>"assets_portfolio/img/skills/asp-net.jpg"],
            ["name"=>"C#", "type" => "backend", "path"=>"assets_portfolio/img/skills/c-sharp.png"],

            ["name"=>"MySql", "type" => "database", "path"=>"assets_portfolio/img/skills/mysql.png"],
            ["name"=>"Sql Server", "type" => "database", "path"=>"assets_portfolio/img/skills/sql-server.jpg"],
            ["name"=>"MongoDB", "type" => "database", "path"=>"assets_portfolio/img/skills/mongo-db.png"],
            ["name"=>"Oracle", "type" => "database", "path"=>"assets_portfolio/img/skills/oracle.jpg"],
            ["name"=>"SqLite", "type" => "database", "path"=>"assets_portfolio/img/skills/sqlite.png"],

            ["name"=>"Stripe", "type" => "other", "path"=>"assets_portfolio/img/skills/stripe.png"],
            ["name"=>"AWS", "type" => "other", "path"=>"assets_portfolio/img/skills/aws.png"],
            ["name"=>"Git", "type" => "other", "path"=>"assets_portfolio/img/skills/git.png"],

            ["name"=>"Flutter", "type" => "other", "path"=>"assets_portfolio/img/skills/flutter.jpg"],

            ["name"=>"PHPUnit", "type" => "other", "path"=>"assets_portfolio/img/skills/php-unit.png"],
            ["name"=>"Jest", "type" => "other", "path"=>"assets_portfolio/img/skills/jest.jpg"],
            ["name"=>"Swagger", "type" => "other", "path"=>"assets_portfolio/img/skills/swagger.png"],
        ];
        foreach ($skills as $skill) {
            Skills::updateOrCreate(
                [
                    "name" => $skill['name']
                ],[
                    "name" => $skill['name'],
                    "path" => $skill['path'],
                    "type" => $skill['type']
                ]
            );
        }
    }
}
