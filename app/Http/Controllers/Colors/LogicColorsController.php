<?php

namespace App\Http\Controllers\Colors;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Colors\RulesColorsController;
use App\Http\Controllers\HandlerResponses\HandlerResponsesController;

use Illuminate\Http\Request;
use App\Models\Colors;

class LogicColorsController extends Controller {
    protected $rules;
    protected $responses;

    public function __construct() {
        $this->rules = new RulesColorsController;
        $this->responses = new HandlerResponsesController;
    }
    public function all() {
        $color = Colors::all();
        if( count($color) == 0 ) return $this->responses->jsonValidationError( ["color"=>__('api.color.no_registered')] );
        return $this->responses->jsonSuccess( $color );
    }
    public function getActive() {
        $color = Colors::whereIsActive( true )->get();
        if( count($color) == 0 ) return $this->responses->jsonValidationError( ["color"=>__('api.color.no_active')] );
        return $this->responses->jsonSuccess( $color );
    }
    public function find( $id ) {
        $color = Colors::find( $id );
        if( !$color ) return $this->responses->jsonNotFound( ["color"=>__('api.color.not_found')] );
        return $this->responses->jsonSuccess( $color );
    }
    public function create( Request $request ) {
        $validate = $this->rules->validateCreate($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );
        return $this->responses->jsonSuccess( Colors::create($request->all()) );
    }
    public function update( $id, Request $request ) {
        $color = Colors::find( $id );
        if( !$color ) return $this->responses->jsonNotFound( ["color"=>__('api.color.not_found')] );

        $validate = $this->rules->validateUpdate($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );

        $color->update($request->all());
        return $color;
    }
    public function changeStatus( $id ) {
        $color = Colors::find( $id );
        if( !$color ) return $this->responses->jsonNotFound( ["color"=>__('api.color.not_found')] );

        $color->update([
            "is_active" => !$color->is_active
        ]);
        return $this->responses->jsonSuccess( $color );
    }
}
