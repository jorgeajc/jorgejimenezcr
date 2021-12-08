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
                'my_carrer'  => "Ingeniería en sistemas",
                'country'   => "Costa Rica"
            ]
        ]);
    }
}
