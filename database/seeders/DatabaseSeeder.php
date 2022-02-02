<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(UserSeeder::class);//Seeder de user

        $this->call(ColorsSeeder::class);//Seeder de color

        $this->call(LevelsSeeder::class);//Seeder de levels

        $this->call(SkillsSeeder::class);//Seeder de Skills
        $this->call(UsersSkills::class);//Seeder de relationships user skill

        $this->call(ExperiencesSeeder::class);//Seeder de experiences

        $this->call(EducationsSeeder::class);//Seeder de educations

        $this->call(SocialsMediasSeeder::class);//Seeder de social medias

        $this->call(CurrencySeeder::class);//currencies

        // $this->call(ProgrammingLanguages::class);//Seeder de social medias
        // $this->call(UsersProgrammingLanguages::class);//Seeder de social medias
    }
}
