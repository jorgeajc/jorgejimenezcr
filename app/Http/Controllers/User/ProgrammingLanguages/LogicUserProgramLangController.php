<?php

namespace App\Http\Controllers\User\ProgrammingLanguages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\ProgrammingLanguages\RulesProgramLangController;
use App\Http\Controllers\HandlerResponses\HandlerResponsesController;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProgrammingLanguages;

class LogicUserProgramLangController extends Controller
{
    protected $rules;
    protected $responses;

    public function __construct() {
        $this->rules = new RulesProgramLangController;
        $this->responses = new HandlerResponsesController;
    }

    public function addProgrammingLangToUser(Request $request) {
        $validate = $this->rules->validateCreate($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );

        $user_id = $request->user;
        $prog_lang_id = $request->programming_lang_id;
        $percentage = $request->percentage;
        $year_experience = $request->year_experience;

        $user = User::find( $user_id );
        $prog_lang = ProgrammingLanguages::find( $prog_lang_id );

        $errors = [];

        if( !$user ) $errors["user"] = "User not found";
        if( !$prog_lang ) $errors["programming_languages"] = "Programming languages not found";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );

        $hasProgLang = $this->userHasProgramLangs($user, $prog_lang->id);
        if( $hasProgLang ) $errors["user"] = "User already has the programming language";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );

        $user->programmingLanguages()->attach($prog_lang, [
            'percentage'  => $percentage,
	        'year_experience'  => $year_experience
        ]);
        return $this->responses->jsonSuccess( $user->programmingLanguages );
    }

    public function removeProgramLangsToUser(Request $request) {
        $validate = $this->rules->validateIds($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );

        $user_id = $request->user;
        $prog_lang_id = $request->programming_lang_id;

        $user = User::find( $user_id );
        $prog_lang = ProgrammingLanguages::find( $prog_lang_id );

        $errors = [];

        if( !$user ) $errors["user"] = "User not found";
        if( !$prog_lang ) $errors["programming_languages"] = "Programming language not found";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );

        $hasProgLang = $this->userHasProgramLangs($user, $prog_lang->id);
        if( !$hasProgLang ) $errors["user"] = "User not has the programming language";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );

        $user->programmingLanguages()->detach($prog_lang);
        return $this->responses->jsonSuccess( $user->programmingLanguages );
    }

    public function changeStatusProgramLangsToUser(Request $request) {
        $validate = $this->rules->validateIds($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );

        $user_id = $request->user;
        $prog_lang_id = $request->programming_lang_id;

        $user = User::find( $user_id );
        $prog_lang = ProgrammingLanguages::find( $prog_lang_id );

        $errors = [];

        if( !$user ) $errors["user"] = "User not found";
        if( !$prog_lang ) $errors["programming_languages"] = "Programming language not found";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );


        $update = $user->programmingLanguages()->updateExistingPivot($prog_lang->id, [
            "is_active" => !$prog_lang->is_active
        ]);
        if( !$update )return $this->responses->jsonNotFound( ["user" => "User not has the programming language"] );

        return $this->responses->jsonSuccess( $user->programmingLanguages );
    }

    public function userProgramLangs(Request $request) {
        $validate = $this->rules->validateUserId($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );

        $user_id = $request->user;

        $user = User::find( $user_id );

        $errors = [];

        if( !$user ) $errors["user"] = "User not found";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );

        if( count($user->programmingLanguages) == 0 ) $errors["user"] = "User not has the programming language";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );

        return $this->responses->jsonSuccess( $user->programmingLanguages );
    }

    public function findUserProgramLangs($user_id, $prog_lang_id){
        $user = User::find( $user_id );

        $errors = [];

        if( !$user ) $errors["user"] = "User not found";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );

        $prog_lang = $user->programmingLanguages()->where('programming_languages_id', $prog_lang_id)->first();
        if( !$prog_lang ) $errors["user"] = "User not has the programming language";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );

        return $this->responses->jsonSuccess( $prog_lang );
    }


    public function userHasProgramLangs($user, $prog_lang_id) {
        return $user->programmingLanguages()->where('programming_languages_id', $prog_lang_id)->first();
    }
}
