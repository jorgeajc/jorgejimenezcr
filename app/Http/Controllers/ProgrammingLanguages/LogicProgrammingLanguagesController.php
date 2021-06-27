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
        if( count($program_lang) == 0 ) return $this->responses->jsonValidationError( ["program_lang"=>__('api.program_lang.no_registered')] );
        return $this->responses->jsonSuccess( $program_lang );
    }
    public function getActive() {
        $program_lang = ProgrammingLanguages::whereIsActive( true )->get();
        if( count($program_lang) == 0 ) return $this->responses->jsonValidationError( ["program_lang"=>__('api.program_lang.no_active')] );
        return $this->responses->jsonSuccess( $program_lang );
    }
    public function find( $id ) {
        $pm = ProgrammingLanguages::find( $id );
        if( !$pm ) return $this->responses->jsonNotFound( ["program_lang"=>__('api.program_lang.not_found')] );
        return $this->responses->jsonSuccess( $pm );
    }
    public function create( Request $request ) {
        $validate = $this->rules->validateCreate($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );
        return $this->responses->jsonSuccess( ProgrammingLanguages::create($request->all()) );
    }
    public function update( $id, Request $request ) {
        $pm = ProgrammingLanguages::find( $id );
        if( !$pm ) return $this->responses->jsonNotFound( ["program_lang"=>__('api.program_lang.not_found')] );

        $validate = $this->rules->validateUpdate($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );

        $pm->update($request->all());
        return $pm;
    }
    public function changeStatus( $id ) {
        $pm = ProgrammingLanguages::find( $id );
        if( !$pm ) return $this->responses->jsonNotFound( ["program_lang"=>__('api.program_lang.not_found')] );
        $pm->update([
            "is_active" => !$pm->is_active
        ]);
        return $this->responses->jsonSuccess( $pm );
    }
}
