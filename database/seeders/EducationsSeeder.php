<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Educations;
use App\Models\User;

class EducationsSeeder extends Seeder {
    public function run() {
        $user = User::where('email', "albertop2203@gmail.com")->first();
        if( $user ) {
            $educations = [
                [
                    "name"       => "Bachillerato en ingeniería en sistemas de información",
                    "place"      => "Universidad Nacional de Costa Rica (UNA)",
                    'start_year' => "2016",
                    'end_year'   => "2020",
                ],[
                    "name"       => "Calidad de software",
                    "place"      => "CENTIC Universidad Nacional de Costa Rica (UNA)",
                    'start_year' => "2019",
                    'end_year'   => "2019",
                ],[
                    "name"       => "Desarrollo de aplicación Java para punto de venta",
                    "place"      => "Universidad Nacional de Costa Rica (UNA), Excelencia académica",
                    'start_year' => "2018",
                    'end_year'   => "2018",
                ],[
                    "name"       => "Diplomado en programaciónde aplicaciones informáticas",
                    "place"      => "Universidad Nacional de Costa Rica (UNA)",
                    'start_year' => "2016",
                    'end_year'   => "2019",
                ],
            ];
            foreach ($educations as $e) {
                Educations::updateOrCreate(
                    [
                        "name"      => $e['name'],
                        'user_id'   => $user->id,
                    ],[
                        "name"      => $e['name'],
                        'place'     => $e['place'],
                        'start_year'=> $e['start_year'],
                        "end_year"  => $e['end_year'],
                        "user_id"   => $user->id,
                    ]
                );
            }
        }
    }
}
