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
        $this->rules = new RulesColorController;
        $this->responses = new HandlerResponsesController;
    }
    public function all() {
        $color = Colors::all();
        if( count($color) == 0 ) {
            return $this->responses->jsonValidationError( $validate );
        }
        return $this->responses->jsonSuccess( $color );
    }
    public function getActive() {
        $color = Colors::whereIsActive( true )->get();
        if( count($color) == 0 ) {
            return $this->responses->jsonValidationError( $validate );
        }
        return $this->responses->jsonSuccess( $color );
    }
    public function find( $id ) {
        $skill = Colors::find( $id );
        if( !$skill ) {
            return $this->responses->jsonNotFound( ["skill"=>"Skill not found"] );
        }
        return $this->responses->jsonSuccess( $skill );
    }
    public function create( Request $request ) {
        $validate = $this->rules->validateCreate($request);
        if( count($validate) > 0 ) {
            return $this->responses->jsonValidationError( $validate );
        }
        return $this->responses->jsonSuccess( Colors::create($request->all()) );
    }
    public function update( $id, Request $request ) {
        $skill = Colors::find( $id );
        if( !$skill ) {
            return $this->responses->jsonNotFound( ["skill"=>"Skill not found"] );
        }
        $validate = $this->rules->validateUpdate($request);
        if( count($validate) > 0 ) {
            return $this->responses->jsonValidationError( $validate );
        }
        $skill->update($request->all());
        return $skill;
    }
    public function changeStatus( $id ) {
        $skill = Colors::find( $id );
        if( !$skill ) {
            return $this->responses->jsonNotFound( ["skill"=>"Skill not found"] );
        }
        $skill->update([
            "is_active" => !$skill->is_active
        ]);
        return $this->responses->jsonSuccess( $skill );
    }
}
