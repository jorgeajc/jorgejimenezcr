<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialsMediasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \DB::table('socials_medias')->insert([
            [
                "name"   => "facebook",
                'link'   => "https://www.facebook.com/profile.php?id=100007280987414",
                'user_id'=> 1,
                "color_id" => 3,
            ],[
                "name"   => "linkedin",
                'link'   => "https://www.linkedin.com/in/jorge-alberto-jimenez-carrillo",
                'user_id'=> 1,
                "color_id" => 5,
            ]
        ]);
    }
}
