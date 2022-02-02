<?php

namespace App\Http\Controllers\ExchangeRate;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ExchangeRate\ExternalCurrencyController;
use Illuminate\Http\Request;

use App\Models\Currency;

class CurrencyController extends Controller {

    public function SyncCurrency( $date = null ) {
        return "SyncCurrency";
    }
}
