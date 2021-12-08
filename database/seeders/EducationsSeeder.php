<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EducationsSeeder extends Seeder {
    public function run() {
        \DB::table('educations')->insert([
            [
                "name"       => "Masters in Information Technology",
                "place"      => "from International University",
                'start_year' => "2011",
                'end_year'   => "2013",
                'description'=> "Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.",
                "status"     => "Finaliced",
                'user_id'    => 1,
            ]
        ]);
    }
}
