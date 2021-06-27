<?php

namespace App\Http\Controllers\User\ProgrammingLanguages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\ProgrammingLanguages\RulesProgramLangController;
use App\Http\Controllers\HandlerResponses\HandlerResponsesController;

use Illuminate\Http\Request;
use App\Models\ProgrammingLanguages;
use Auth;

class LogicUserProgramLangController extends Controller
{
    protected $rules;
    protected $responses;

    public function __construct() {
        $this->rules = new RulesProgramLangController;
        $this->responses = new HandlerResponsesController;
    }

    public function all(Request $request) {
        $user = Auth::user();

        if( count($user->programmingLanguages) == 0 ) return $this->responses->jsonNotFound(["user" => "User not has the programming language"]);

        return $this->responses->jsonSuccess( $user->programmingLanguages );
    }
    public function find($prog_lang_id){
        $user = Auth::user();

        $prog_lang = $user->programmingLanguages()->where('programming_languages_id', $prog_lang_id)->first();
        if( !$prog_lang ) return $this->responses->jsonNotFound(["user" => "User not has the programming language"]);

        return $this->responses->jsonSuccess( $prog_lang );
    }
    public function create(Request $request) {
        $validate = $this->rules->validateCreate($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );

        $prog_lang_id = $request->programming_lang_id;
        $percentage = $request->percentage;
        $year_experience = $request->year_experience;

        $user = Auth::user();
        $prog_lang = ProgrammingLanguages::find( $prog_lang_id );

        $errors = [];

        if( !$prog_lang ) return $this->responses->jsonNotFound(["programming_languages" => "Programming languages not found"]);

        $hasProgLang = $this->userHasProgramLangs($user, $prog_lang->id);
        if( $hasProgLang ) return $this->responses->jsonNotFound(["user" => "User already has the programming language"]);

        $user->programmingLanguages()->attach($prog_lang, [
            'percentage'  => $percentage,
	        'year_experience'  => $year_experience
        ]);
        return $this->responses->jsonSuccess( $user->programmingLanguages );
    }
    public function remove($prog_lang_id) {
        $user = Auth::user();

        $hasProgLang = $this->userHasProgramLangs($user, $prog_lang_id);
        if( !$hasProgLang ) return $this->responses->jsonNotFound(["user" => "User not has the programming language"]);

        $user->programmingLanguages()->detach([$prog_lang_id]);
        $prog_langs = $user->programmingLanguages;
        if( count($prog_langs) > 0 ) return $this->responses->jsonSuccess(  $prog_langs );
        return $this->responses->jsonSuccess(  ["user" => "User not has the programming language"] );
    }
    public function changeStatus( $prog_lang_id ) {
        $user = Auth::user();

        $prog_lang = $this->userHasProgramLangs($user, $prog_lang_id);
        if( !$prog_lang )  return $this->responses->jsonNotFound( ["user" =>"User not has the programming language"] );

        $update = $user->programmingLanguages()->updateExistingPivot($prog_lang->id, [
            "is_active" => !$prog_lang->pivot->is_active
        ]);
        if( !$update )return $this->responses->jsonNotFound( ["user" => "User not has the programming language"] );

        return $this->responses->jsonSuccess( $prog_lang );
    }
    public function userHasProgramLangs($user, $prog_lang_id) {
        return $user->programmingLanguages()->where('programming_languages_id', $prog_lang_id)->first();
    }
}
