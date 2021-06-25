<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
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
                'is_active' => true,
            ],[
                "name"      => "secondary",
                'is_active' => true,
            ],

            [
                "name"      => "3b5998",
                'is_active' => true,
            ],[
                "name"      => "1da1f2",
                'is_active' => true,
            ],[
                "name"      => "007bb5",
                'is_active' => true,
            ],[
                "name"      => "f46f30",
                'is_active' => true,
            ],[
                "name"      => "c32361",
                'is_active' => true,
            ],[
                "name"      => "3d464d",
                'is_active' => true,
            ],[
                "name"      => "db4437",
                'is_active' => true,
            ],[
                "name"      => "bd081c",
                'is_active' => true,
            ],[
                "name"      => "00aff0",
                'is_active' => true,
            ],[
                "name"      => "00b489",
                'is_active' => true,
            ]
        ]);
    }
}
