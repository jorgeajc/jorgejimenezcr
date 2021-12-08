<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ExperiencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \DB::table('experiences')->insert([
            [
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
