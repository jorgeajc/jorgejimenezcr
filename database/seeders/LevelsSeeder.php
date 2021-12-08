<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Levels;

class LevelsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $levels = [ "BEGINNER", "MASTER", "EXPERT", "ADVANCE" ];
        foreach ($levels as $level) {
            Levels::updateOrCreate(
                [
                    "name" => $level
                ],[
                    "name" => $level
                ]
            );
        }
    }
}
