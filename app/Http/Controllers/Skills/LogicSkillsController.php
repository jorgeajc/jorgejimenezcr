<?php

namespace App\Http\Controllers\Skills;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Skills\RulesSkillsController;
use App\Http\Controllers\HandlerResponses\HandlerResponsesController;


use Illuminate\Http\Request;
use App\Models\Skills;

class LogicSkillsController extends Controller {
    protected $rules;
    protected $responses;

    public function __construct() {
        $this->rules = new RulesSkillsController;
        $this->responses = new HandlerResponsesController;
    }
    public function all() {
        $skills = Skills::with('users')->get();
        if( count($skills) == 0 ) return $this->responses->jsonValidationError( ["skill"=>__('api.skills.no_registered')] );
        return $this->responses->jsonSuccess( $skills );
    }
    public function getActive() {
        $skills = Skills::whereIsActive( true )->get();
        if( count($skills) == 0 ) return $this->responses->jsonValidationError( ["skill"=>__('api.skills.no_active')] );
        return $this->responses->jsonSuccess( $skills );
    }
    public function find( $id ) {
        $skill = Skills::find( $id );
        if( !$skill ) return $this->responses->jsonNotFound( ["skill"=>__('api.skills.not_found')] );
        return $this->responses->jsonSuccess( $skill );
    }
    public function create( Request $request ) {
        $validate = $this->rules->validateCreate($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );
        return $this->responses->jsonSuccess( Skills::create($request->all()) );
    }
    public function update( $id, Request $request ) {
        $skill = Skills::find( $id );
        if( !$skill ) return $this->responses->jsonNotFound( ["skill"=>__('api.skills.not_found')] );

        $validate = $this->rules->validateUpdate($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );

        $skill->update($request->all());
        return $skill;
    }
    public function changeStatus( $id ) {
        $skill = Skills::find( $id );
        if( !$skill ) return $this->responses->jsonNotFound( ["skill"=>__('api.skills.not_found')] );

        $skill->update([
            "is_active" => !$skill->is_active
        ]);
        return $this->responses->jsonSuccess( $skill );
    }
    public function delete( $id ) {
        $skill = Skills::find( $id );
        if( !$skill ) return $this->responses->jsonNotFound( ["skill"=>__('api.skills.not_found')] );
        if( count($skill->users) > 0 ) return $this->responses->jsonNotFound( ["skill"=>__('api.skills.delete_failed')] );
        $skill->delete();
        return $this->responses->jsonSuccess( $skill );
    }
}
