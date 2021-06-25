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
    public function run()
    {
        $this->call(UserSeeder::class);//Seeder de user
        $this->call(ColorSeeder::class);//Seeder de color
        $this->call(LevelSeeder::class);//Seeder de Skills
        $this->call(SkillsSeeder::class);//Seeder de Skills
        $this->call(UserSkills::class);//Seeder de Skills
        $this->call(ExperienceSeeder::class);//Seeder de Skills
        $this->call(EducationSeeder::class);//Seeder de Skills
        $this->call(SocialMediaSeeder::class);//Seeder de Skills
    }
}
