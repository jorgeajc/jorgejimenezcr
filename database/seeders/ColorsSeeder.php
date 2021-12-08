<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Colors;
class ColorsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $colors = [ "info", "secondary", "3b5998", "1da1f2", "007bb5", "f46f30", "c32361", "3d464d", "db4437", "bd081c", "00aff0", "00b489" ];
        foreach ($colors as $color) {
            Colors::updateOrCreate(
                [
                    "name" => $color
                ],[
                    "name" => $color
                ]
            );
        }
    }
}
