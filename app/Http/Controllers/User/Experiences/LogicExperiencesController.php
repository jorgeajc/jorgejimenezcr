<?php

namespace App\Http\Controllers\User\Experiences;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Experiences\RulesExperiencesController;
use App\Http\Controllers\HandlerResponses\HandlerResponsesController;

use Illuminate\Http\Request;
use App\Models\User;

use Auth;

class LogicExperiencesController extends Controller
{
    protected $rules;
    protected $responses;

    public function __construct() {
        $this->rules = new RulesExperiencesController;
        $this->responses = new HandlerResponsesController;
    }
    public function all() {
        $user = Auth::user();
        if( count($user->experiences) == 0 ) return $this->responses->jsonNotFound(["experience" => __('api.user.experience.not_has')]);
        return $this->responses->jsonSuccess( $user->experiences );
    }
    public function find( $experience_id ) {
        $user = Auth::user();
        $experience = $user->experiences()->where('id', $experience_id )->first();
        if( !$experience ) return $this->responses->jsonNotFound( ["experience"=>__('api.user.experience.not_found')] );
        return $this->responses->jsonSuccess( $experience );
    }
    public function changeStatus( $experience_id ) {
        $user = Auth::user();

        $experience = $user->experiences()->where('id', $experience_id )->first();
        if( !$experience ) return $this->responses->jsonNotFound( ["experience"=>__('api.user.experience.not_found')] );

        $experience->update([
            "is_active" => !$experience->is_active
        ]);
        return $this->responses->jsonSuccess( $experience );
    }
    public function create( Request $request ) {
        $validate = $this->rules->validateCreate($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );

        $user = Auth::user();
        return $this->responses->jsonSuccess( $user->experiences()->create($request->all()) );
    }
    public function update( $experience_id, Request $request ) {
        $validate = $this->rules->validateUpdate($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );

        $user = Auth::user();

        $experience = $user->experiences()->where('id', $experience_id )->first();
        if( !$experience ) return $this->responses->jsonNotFound( ["experience"=>__('api.user.experience.not_found')] );

        $experience->update($request->all());
        return $experience;
    }

    public function delete( $experience_id ) {
        $experience = Auth::user()->experiences()->where('id', $experience_id )->first();
        if( !$experience ) return $this->responses->jsonNotFound( ["experience"=>__('api.user.experience.not_found')] );
        if( count($experience->details) > 0 ) return $this->responses->jsonNotFound( ["experience"=>__('api.user.experience.delete_failed')] );
        $experience->delete();
        return $this->responses->jsonSuccess( $experience );
    }

}
