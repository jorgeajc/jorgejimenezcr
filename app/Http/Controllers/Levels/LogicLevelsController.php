<?php

namespace App\Http\Controllers\Levels;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Levels\RulesLevelsController;
use App\Http\Controllers\HandlerResponses\HandlerResponsesController;

use Illuminate\Http\Request;
use App\Models\Levels;

class LogicLevelsController extends Controller
{
    protected $rules;
    protected $responses;

    public function __construct() {
        $this->rules = new RulesLevelsController;
        $this->responses = new HandlerResponsesController;
    }
    public function all() {
        $levels = Levels::all();
        if( count($levels) == 0 ) {
            return $this->responses->jsonValidationError( $validate );
        }
        return $this->responses->jsonSuccess( $levels );
    }
    public function getActive() {
        $levels = Levels::whereIsActive( true )->get();
        if( count($levels) == 0 ) {
            return $this->responses->jsonValidationError( $validate );
        }
        return $this->responses->jsonSuccess( $levels );
    }
    public function find( $id ) {
        $skill = Levels::find( $id );
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
        return $this->responses->jsonSuccess( Levels::create($request->all()) );
    }
    public function update( $id, Request $request ) {
        $skill = Levels::find( $id );
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
        $skill = Levels::find( $id );
        if( !$skill ) {
            return $this->responses->jsonNotFound( ["skill"=>"Skill not found"] );
        }
        $skill->update([
            "is_active" => !$skill->is_active
        ]);
        return $this->responses->jsonSuccess( $skill );
    }
}
