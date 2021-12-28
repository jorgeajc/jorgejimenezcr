<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experiences;
use App\Models\ExperienceDetails;
use App\Models\User;
class ExperiencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user = User::where('email', "albertop2203@gmail.com")->first();
        if( $user ) {
            $experiences = [
                [
                    'name'          => "Desarrollador Full Stack",
                    'place'         => "Epic Studio",
                    'start_month'   => 11,
                    'start_year'    => 2020,
                    'end_month'     => null,
                    'end_year'      => null,
                    'details'       => [
                        "Desarrollo del Sistema web territoriodezaguates.com",
                        "Desarrollo del Sistema web alimento.cr",
                        "Realización de pruebas de aseguramiento de la calidad para descubrir errores y optimizar la usabilidad",
                        "Completar tareas detalladas de programación y desarrollo para sitios web internos"
                    ]
                ],[
                    'name'          => "Desarrollador web por pasantía de practicante",
                    'place'         => "Epic Studio",
                    'start_month'   => 07,
                    'start_year'    => 2020,
                    'end_month'     => 11,
                    'end_year'      => 2020,
                    'details'       => [
                        "Realización de pruebas de aseguramiento de la calidad para descubrir errores y optimizar la usabilidad de sistemas tanto internos como de cliente",
                        "Desarrollo del Sistema web alimento.cr"
                    ]
                ],[
                    'name'          => "Desarrollo universitario",
                    'place'         => "Municipalidad de Nicoya",
                    'start_month'   => 02,
                    'start_year'    => 2019,
                    'end_month'     => 07,
                    'end_year'      => 2020,
                    'details'       => [
                        "Sistema interno de control vehicular, reservación y mantenimiento de los vehículos, control de presupuesto interno"
                    ]
                ],
            ];
            foreach ($experiences as $e) {
                $ex_new =Experiences::updateOrCreate(
                    [
                        "name"      => $e['name'],
                        'user_id'   => $user->id,
                    ],[
                        "name"      => $e['name'],
                        'place'     => $e['place'],

                        'start_month'=> $e['start_month'],
                        "start_year" => $e['start_year'],

                        "end_month"  => $e['end_month'],
                        "end_year"   => $e['end_year'],

                        "user_id"    => $user->id,
                    ]
                );
                foreach ($e['details'] as $detail) {
                    $array = [
                        "description"      => $detail,
                        'experiences_id'   => $ex_new->id,
                    ];
                    ExperienceDetails::updateOrCreate(
                        $array,$array
                    );
                }
            }
        }
    }
}
