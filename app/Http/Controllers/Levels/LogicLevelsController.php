<?php

namespace App\Http\Controllers\Levels;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Levels\RulesLevelsController;
use App\Http\Controllers\HandlerResponses\HandlerResponsesController;

use Illuminate\Http\Request;
use App\Models\Levels;

class LogicLevelsController extends Controller {
    protected $rules;
    protected $responses;

    public function __construct() {
        $this->rules = new RulesLevelsController;
        $this->responses = new HandlerResponsesController;
    }
    public function all() {
        $levels = Levels::with('skills')->get();
        if( count($levels) == 0 ) return $this->responses->jsonValidationError( ["level"=>__('api.level.no_registered')] );
        return $this->responses->jsonSuccess( $levels );
    }
    public function getActive() {
        $levels = Levels::whereIsActive( true )->get();
        if( count($levels) == 0 ) return $this->responses->jsonValidationError( ["level"=>__('api.level.no_active')] );
        return $this->responses->jsonSuccess( $levels );
    }
    public function find( $id ) {
        $level = Levels::find( $id );
        if( !$level ) return $this->responses->jsonNotFound( ["level"=>__('api.level.not_found')] );
        return $this->responses->jsonSuccess( $level );
    }
    public function create( Request $request ) {
        $validate = $this->rules->validateCreate($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );
        return $this->responses->jsonSuccess( Levels::create($request->all()) );
    }
    public function update( $id, Request $request ) {
        $level = Levels::find( $id );
        if( !$level ) return $this->responses->jsonNotFound( ["level"=>__('api.level.not_found')] );

        $validate = $this->rules->validateUpdate($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );

        $level->update($request->all());
        return $level;
    }
    public function changeStatus( $id ) {
        $level = Levels::find( $id );
        if( !$level ) return $this->responses->jsonNotFound( ["level"=>__('api.level.not_found')] );

        $level->update([
            "is_active" => !$level->is_active
        ]);
        return $this->responses->jsonSuccess( $level );
    }

    public function delete( $id ) {
        $levels = Levels::find( $id );
        if( !$levels ) return $this->responses->jsonNotFound( ["level"=>__('api.level.not_found')] );
        if( count($levels->skills) > 0 ) return $this->responses->jsonNotFound( ["level"=>__('api.level.delete_failed')] );
        $levels->delete();
        return $this->responses->jsonSuccess( $levels );
    }
}
