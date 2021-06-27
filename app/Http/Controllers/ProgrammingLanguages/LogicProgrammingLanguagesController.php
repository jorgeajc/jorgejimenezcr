<?php

namespace App\Http\Controllers\ProgrammingLanguages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProgrammingLanguages\RulesProgrammingLanguagesController;
use App\Http\Controllers\HandlerResponses\HandlerResponsesController;

use Illuminate\Http\Request;
use App\Models\ProgrammingLanguages;

class LogicProgrammingLanguagesController extends Controller
{
    protected $rules;
    protected $responses;

    public function __construct() {
        $this->rules = new RulesProgrammingLanguagesController;
        $this->responses = new HandlerResponsesController;
    }
    public function all() {
        $program_lang = ProgrammingLanguages::all();
        if( count($program_lang) == 0 ) {
            return $this->responses->jsonValidationError( $validate );
        }
        return $this->responses->jsonSuccess( $program_lang );
    }
    public function getActive() {
        $program_lang = ProgrammingLanguages::whereIsActive( true )->get();
        if( count($program_lang) == 0 ) {
            return $this->responses->jsonValidationError( $validate );
        }
        return $this->responses->jsonSuccess( $program_lang );
    }
    public function find( $id ) {
        $skill = ProgrammingLanguages::find( $id );
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
        return $this->responses->jsonSuccess( ProgrammingLanguages::create($request->all()) );
    }
    public function update( $id, Request $request ) {
        $skill = ProgrammingLanguages::find( $id );
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
        $skill = ProgrammingLanguages::find( $id );
        if( !$skill ) {
            return $this->responses->jsonNotFound( ["skill"=>"Skill not found"] );
        }
        $skill->update([
            "is_active" => !$skill->is_active
        ]);
        return $this->responses->jsonSuccess( $skill );
    }
}
