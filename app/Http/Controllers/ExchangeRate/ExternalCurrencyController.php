<?php

namespace App\Http\Controllers\ExchangeRate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Http\Controllers\HandlerResponses\HandlerResponsesController;

class ExternalCurrencyController extends Controller {
    private $client = null;
    protected $responses;
    public function __construct() {
        $this->client = new Client();
        $this->responses = new HandlerResponsesController;
    }

    public function getExchangeRate( $date = null ) {
        if( !$date ) {
            $date = Carbon::today()->format("d/m/Y");
        } else {
            $date = Carbon::parse($date)->format("d/m/Y");
        }
        $res = $this->client->request('GET', "https://tipodecambio.paginasweb.cr/api/$date");
        if( $res->getStatusCode() == 200 ) {
            $data = $res->getBody()->getContents();
            $data = json_decode($data);

            $purchase = $data->compra;
            $sale = $data->venta;
            $date = $data->fecha;

            if( $purchase && $sale && $date ) {
                return $this->responses->jsonSuccess( [
                    "purchase"  => $purchase,
                    "sale"      => $sale,
                    "date"      => $date,
                ] );
            }
        }
        return $this->responses->jsonExternalServerError( "Error" );
    }
}
