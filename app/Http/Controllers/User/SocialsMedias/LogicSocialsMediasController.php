<?php

namespace App\Http\Controllers\User\SocialsMedias;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\SocialsMedias\RulesSocialsMediasController;
use App\Http\Controllers\HandlerResponses\HandlerResponsesController;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Colors;
use App\Models\SocialsMedias;

use Auth;

class LogicSocialsMediasController extends Controller
{
    protected $rules;
    protected $responses;

    public function __construct() {
        $this->rules = new RulesSocialsMediasController;
        $this->responses = new HandlerResponsesController;
    }
    public function all() {
        $user = Auth::user();

        $errors = [];

        if( count($user->social_media) == 0 ) $errors["user"] = "User not has the social medias";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );

        return $this->responses->jsonSuccess( $user->social_media );
    }
    public function create( Request $request ) {
        $validate = $this->rules->validateCreate($request);
        if( count($validate) > 0 ) {
            return $this->responses->jsonValidationError( $validate );
        }
        $color_id = $request->color_id;

        $user = Auth::user();
        $color = Colors::find( $color_id );
        if( !$color ) {
            return $this->responses->jsonNotFound( ["color"=>"Color not found"] );
        }
        return $this->responses->jsonSuccess( $user->social_media()->create($request->all()) );
    }
    public function find( $social_id ) {
        $user = Auth::user();
        $social_medias = $user->social_media()->where('id', $social_id )->get();
        if( count($social_medias) == 0 ) {
            return $this->responses->jsonNotFound( ["social_medias"=>"Social media not found"] );
        }
        return $this->responses->jsonSuccess( $social_medias );
    }
    public function changeStatus( $social_id ) {
        $user = Auth::user();

        $social_media = $user->social_media()->where('id', $social_id )->first();
        return($social_media);
        if( !$social_media ) {
            return $this->responses->jsonNotFound( ["social_medias"=>"Social media not found"] );
        }
        $social_media->update([
            "is_active" => !$social_media->is_active
        ]);
        return $this->responses->jsonSuccess( $social_media );
    }
    public function update( $id, Request $request ) {
        $validate = $this->rules->validateUpdate($request);
        if( count($validate) > 0 ) {
            return $this->responses->jsonValidationError( $validate );
        }

        $social_id = $id;
        $color_id = $request->color_id;

        $user = Auth::user();

        $color = Colors::find( $color_id );
        if( !$color ) {
            return $this->responses->jsonNotFound( ["color"=>"Color not found"] );
        }

        $social_media = $user->social_media()->where('id', $social_id )->first();
        if( !$social_media ) {
            return $this->responses->jsonNotFound( ["social_medias"=>"Social media not found"] );
        }

        $social_media->update($request->all());
        return $social_media;
    }


}
