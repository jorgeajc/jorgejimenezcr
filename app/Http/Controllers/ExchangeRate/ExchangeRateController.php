<?php

namespace App\Http\Controllers\ExchangeRate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\ExchangeRate\ExternalCurrencyController;

use App\Http\Controllers\HandlerResponses\HandlerResponsesController;

use App\Models\ExchangeRate;

class ExchangeRateController extends Controller {

    protected $responses;
    public function __construct() {
        $this->responses = new HandlerResponsesController;
    }


    public function syncExchangeCurrency( $date = null ) {
        $ExternalC = new ExternalCurrencyController();
        $response = $ExternalC->getExchangeRate( $date );

        if( $response->getStatusCode() == 200 ) {
            $data = $response->getData();
            $data = $data->body;
            $data = $data->data;
            $exchange_rate =  ExchangeRate::where("date", $data->date);
            if( $exchange_rate->count()== 0 ) {
                $data = [
                    "purchase"      => $data->purchase,
                    "sale"          => $data->sale,
                    "date"          => $data->date,
                    "currency_id"   => 1
                ];
                return $this->responses->jsonSuccess(
                    ExchangeRate::create( $data )
                );
            }
            return $this->responses->jsonSuccess(
                $exchange_rate->first()
            );
        }

        return $this->responses->jsonExternalServerError( "Error" );
    }
}
