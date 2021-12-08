<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialsMedias;

class SocialsMediasSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $social_medias = [
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
        ];
        foreach ($social_medias as $sm) {
            SocialsMedias::updateOrCreate(
                [
                    "name"   => $sm['name'],
                    'user_id'=> $sm['user_id'],
                ],[
                    "name"   => $sm['name'],
                    'user_id'=> $sm['user_id'],
                    'link'   =>  $sm['link'],
                    "color_id" =>  $sm['color_id'],
                ]
            );
        }
    }
}
