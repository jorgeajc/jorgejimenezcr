<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \DB::table('experiences')->insert([
            [
                'name'      => "Frontend Developer",
                'place'     => "at Creative Agency",
                'start_month'=> 05,
                'start_year'=> 2015,
                'end_month'  => null,
                'end_year'  => null,
                'description'=> "Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.",
                'user_id'   => 1,
                'created_at'=> Carbon::now()
            ],[
                'name'      => "Graphic Designer",
                'place'      => "at Design Studio",
                'start_month'=> 06,
                'start_year'  => 2013,
                'end_month'=> 05,
                'end_year'  => 2015,
                'description'=> "Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.",
                'user_id'   => 1,
                'created_at'=> Carbon::now()
            ],[
                'name'      => "Junior Web Developer",
                'place'      => "at Indie Studio",
                'start_month'=> 01,
                'start_year'  => 2011,
                'end_month'=> 05,
                'end_year'  => 2013,
                'description'=> "User generated content in real-time will have multiple touchpoints for offshoring. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.",
                'user_id'   => 1,
                'created_at'=> Carbon::now()
            ]
        ]);
    }
}
