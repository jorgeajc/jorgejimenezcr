<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('colors')->insert([
            [
                "name"      => "info",
            ],[
                "name"      => "secondary",
            ],[
                "name"      => "3b5998",
            ],[
                "name"      => "1da1f2",
            ],[
                "name"      => "007bb5",
            ],[
                "name"      => "f46f30",
            ],[
                "name"      => "c32361",
            ],[
                "name"      => "3d464d",
            ],[
                "name"      => "db4437",
            ],[
                "name"      => "bd081c",
            ],[
                "name"      => "00aff0",
            ],[
                "name"      => "00b489",
            ]
        ]);
    }
}
