<?php

namespace App\Http\Controllers\User\ProgrammingLanguages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\ProgrammingLanguages\RulesProgramLangController;
use App\Http\Controllers\HandlerResponses\HandlerResponsesController;

use Illuminate\Http\Request;
use App\Models\ProgrammingLanguages;
use App\Models\Levels;
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
        if( count($user->programmingLanguages) == 0 ) return $this->responses->jsonNotFound(["user" => __('api.user.program_lang.not_has')]);
        return $this->responses->jsonSuccess( $user->programmingLanguages );
    }
    public function find($prog_lang_id){
        $user = Auth::user();

        $prog_lang = $user->programmingLanguages()->where('programming_languages_id', $prog_lang_id)->first();
        if( !$prog_lang ) return $this->responses->jsonNotFound(["user" => __('api.user.program_lang.not_found')]);

        return $this->responses->jsonSuccess( $prog_lang );
    }
    public function create(Request $request) {
        $validate = $this->rules->validateCreate($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );

        $prog_lang_id   = $request->programming_lang_id;
        $level_id       = $request->level_id;
        $percentage     = $request->percentage;
        $year_experience= $request->year_experience;

        $user = Auth::user();

        $errors = [];

        $prog_lang = ProgrammingLanguages::find( $prog_lang_id );
        if( !$prog_lang ) return $this->responses->jsonNotFound(["programming_languages" => __('api.user.program_lang.not_found')]);

        $level = Levels::find( $level_id );
        if( !$level ) return $this->responses->jsonNotFound(["level" => __('api.user.level.not_found')]);

        $hasProgLang = $this->userHasProgramLangs($user, $prog_lang->id);
        if( $hasProgLang ) return $this->responses->jsonNotFound(["user" => __('api.user.program_lang.has')]);

        /* $entities = [ 'programming_languages_id'  => $prog_lang->id, 'level_id'  => $level->id ];
        $pivots = [ 'percentage'  => $percentage, 'year_experience'  => $year_experience ];
        $combination = $user->combinePivot($entities, $pivots);
        $user->programmingLanguages()->sync($combination); */

        $user->programmingLanguages()->attach(
            $prog_lang->id,
            [
                'level_id'  => $level->id,
                'percentage'  => $percentage,
                'year_experience'  => $year_experience,
            ]
        );
        return $this->responses->jsonSuccess( $user->programmingLanguages );
    }
    public function remove($prog_lang_id) {
        $user = Auth::user();

        $hasProgLang = $this->userHasProgramLangs($user, $prog_lang_id);
        if( !$hasProgLang ) return $this->responses->jsonNotFound(["user" => __('api.user.program_lang.not_has')]);

        $user->programmingLanguages()->detach([$prog_lang_id]);
        $prog_langs = $user->programmingLanguages;
        if( count($prog_langs) > 0 ) return $this->responses->jsonSuccess(  $prog_langs );
        return $this->responses->jsonSuccess(  ["user" => __('api.user.program_lang.error')] );
    }
    public function changeStatus( $prog_lang_id ) {
        $user = Auth::user();

        $prog_lang = $this->userHasProgramLangs($user, $prog_lang_id);
        if( !$prog_lang )  return $this->responses->jsonNotFound( ["user" => __('api.user.program_lang.not_has')] );

        $update = $user->programmingLanguages()->updateExistingPivot($prog_lang->id, [
            "is_active" => !$prog_lang->pivot->is_active
        ]);
        if( !$update ) return $this->responses->jsonNotFound( ["user" => __('api.user.program_lang.error')] );
        return $this->responses->jsonSuccess( $prog_lang );
    }
    public function userHasProgramLangs($user, $prog_lang_id) {
        return $user->programmingLanguages()->where('programming_languages_id', $prog_lang_id)->first();
    }
}
