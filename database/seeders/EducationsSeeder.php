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
            ],[
                "name"       => "Bachelor of Computer Science",
                "place"      => "from Regional College",
                'start_year' => "2007",
                'end_year'   => "2011",
                'description'=> "Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.",
                "status"     => "Finaliced",
                'user_id'    => 1,
            ],[
                "name"       => "Science and Mathematics",
                "place"      => "from Mt. High Scool",
                'start_year' => "2005",
                'end_year'   => "2007",
                'description'=> "User generated content in real-time will have multiple touchpoints for offshoring. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.",
                "status"     => "Finaliced",
                'user_id'    => 1,
            ]
        ]);
    }
}
