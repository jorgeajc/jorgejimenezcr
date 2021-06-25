<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \DB::table('social_media')->insert([
            [
                "name"   => "facebook",
                'link'   => "google.com",
                'user_id'=> 1,
                "color_id" => 3,
            ],[
                "name"   => "twitter",
                'link'   => "google.com",
                'user_id'=> 1,
                "color_id" => 4,
            ],[
                "name"   => "linkedin",
                'link'   => "google.com",
                'user_id'=> 1,
                "color_id" => 5,
            ],[
                "name"   => "instagram",
                'link'   => "google.com",
                'user_id'=> 1,
                "color_id" => 6,
            ],[
                "name"   => "dribbble",
                'link'   => "google.com",
                'user_id'=> 1,
                "color_id" => 7,
            ],[
                "name"   => "dropbox",
                'link'   => "google.com",
                'user_id'=> 1,
                "color_id" => 8,
            ],[
                "name"   => "google-plus",
                'link'   => "google.com",
                'user_id'=> 1,
                "color_id" => 9,
            ],[
                "name"   => "pinterest-p",
                'link'   => "google.com",
                'user_id'=> 1,
                "color_id" => 10,
            ],[
                "name"   => "skype",
                'link'   => "google.com",
                'user_id'=> 1,
                "color_id" => 11,
            ],[
                "name"   => "vine",
                'link'   => "google.com",
                'user_id'=> 1,
                "color_id" => 12,
            ],[
                "name"   => "skype",
                'link'   => "google.com",
                'user_id'=> 1,
                "color_id" => 12,
            ]
        ]);
    }
}
