<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::updateOrCreate(
            [
                'email'     => "albertop2203@gmail.com"
            ],[
                "name"      => "Jorge Alberto",
                'last_name' => "Jimenez Carrillo",
                'email'     => "albertop2203@gmail.com",
                'password'  =>  Hash::make("123JorgeMyoga"),
                'whatsapp'  => "61953152",
                'birthday'  => Carbon::parse('02-10-1998'),
                'facebook_id'  => null,
                'google_id' => null,
                'address'   => "Costa Rica, Guanacaste, Nicoya",
                'about_me'  => "Desarrollador FullStack. Experiencia en todas las etapas del ciclo de vida desarrollo de proyectos web dinámicos. Fuerte experiencia de backend.",
                'my_carrer' => "Ingeniero en sistemas - Desarrollador full stack",
                'country'   => "Costa Rica",
                'site'      => "www.jorgejimenezcr.com",
                'title'     => "Bachillerato Universitario",
                'availability'=> "Disponible"
            ]
        );
    }
}
