<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \DB::table('users')->insert([
            [
                "name"      => "Jorge",
                'last_name' => "Jimenez",
                'email'     => "albertop2203@gmail.com",
                'password'  =>  Hash::make("123Jorge"),
                'whatsapp'  => "61953152",
                'birthday'  => Carbon::parse('02-10-1998'),
                'facebook_id'  => null,
                'google_id' => null,
                'address'   => "Portal",
                'about_me'  => "Hello! I’m Jorge Jimenez. I am passionate about UI/UX design and Web Design. I am a skilled front-end developer and master of graphic design tools such as Photoshop and Sketch. I am a quick learner and a team worker that gets the job done.I can easily capitalize on low hanging fruits and quickly maximize timely deliverables for real-time schemas.",
                'my_carrer'  => "Front-end and Back-end Developer",
                'country'   => "Costa Rica"
            ]
        ]);
    }
}
