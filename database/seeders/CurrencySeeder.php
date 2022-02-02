<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $currencies = [
            [ "country" => "Costa rica", "iso_code" => "CRC" ],
            [ "country" => "Estados Unidos", "iso_code" => "USD" ],
         ];
        foreach ($currencies as $currency) {
            Currency::updateOrCreate([
                "iso_code" => $currency["iso_code"]
            ],[
                "country" => $currency["country"],
                "iso_code" => $currency["iso_code"]
            ]);
        }
    }
}
