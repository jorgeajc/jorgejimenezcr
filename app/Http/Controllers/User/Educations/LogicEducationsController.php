<?php

namespace App\Http\Controllers\User\Educations;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Educations\RulesEducationsController;
use App\Http\Controllers\HandlerResponses\HandlerResponsesController;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Colors;
use App\Models\SocialsMedias;

use Auth;
class LogicEducationsController extends Controller
{
    protected $rules;
    protected $responses;

    public function __construct() {
        $this->rules = new RulesEducationsController;
        $this->responses = new HandlerResponsesController;
    }
    public function all() {
        $user = Auth::user();

        $errors = [];

        if( count($user->educations) == 0 ) $errors["user"] = "User not has the educations";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );

        return $this->responses->jsonSuccess( $user->educations );
    }
    public function find( $education_id ) {
        $user = Auth::user();
        $educations = $user->educations()->where('id', $education_id )->first();
        if( count($educations) == 0 ) return $this->responses->jsonNotFound( ["educations"=>"educations not found"] );
        return $this->responses->jsonSuccess( $educations );
    }
    public function changeStatus( $education_id ) {
        $user = Auth::user();

        $educations = $user->social_media()->where('id', $education_id )->first();
        if( !$educations ) return $this->responses->jsonNotFound( ["education"=>"Education not found"] );

        $educations->update([
            "is_active" => !$educations->is_active
        ]);
        return $this->responses->jsonSuccess( $educations );
    }
    public function create( Request $request ) {
        $validate = $this->rules->validateCreate($request);
        if( count($validate) > 0 ) {
            return $this->responses->jsonValidationError( $validate );
        }
        $user = Auth::user();
        return $this->responses->jsonSuccess( $user->educations()->create($request->all()) );
    }
    public function update( $education_id, Request $request ) {
        $validate = $this->rules->validateUpdate($request);
        if( count($validate) > 0 ) {
            return $this->responses->jsonValidationError( $validate );
        }

        $user = Auth::user();

        $education = $user->educations()->where('id', $education_id )->first();
        if( !$education ) return $this->responses->jsonNotFound( ["education"=>"Education not found"] );

        $education->update($request->all());
        return $education;
    }
}
