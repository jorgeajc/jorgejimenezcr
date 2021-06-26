<?php

namespace App\Http\Controllers\User\Skills;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Skills\RulesUserSkillsController;
use App\Http\Controllers\HandlerResponses\HandlerResponsesController;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Skills;
use Auth;
class LogicUserSkillsController extends Controller
{
    protected $rules;
    protected $responses;

    public function __construct() {
        $this->rules = new RulesUserSkillsController;
        $this->responses = new HandlerResponsesController;
    }

    public function all( Request $request ) {
        $user = Auth::user();

        if( count($user->skills) == 0 ) return $this->responses->jsonNotFound(["user" => "User not has the skill"]);

        return $this->responses->jsonSuccess( $user->skills );
    }
    public function find( $skill_id ){
        $user = Auth::user();

        $skill = $this->userHasSkill($user, $skill_id);
        if( !$skill ) return $this->responses->jsonNotFound(["user" => "User not has the skill"]);

        return $this->responses->jsonSuccess( $skill );
    }
    public function create(Request $request) {
        $validate = $this->rules->validateCreate($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );

        $skill_id = $request->skill_id;

        $user = Auth::user();
        $skill = Skills::find( $skill_id );

        if( !$skill ) return $this->responses->jsonNotFound(["skill" => "Skill not found"]);

        $hasSkill = $this->userHasSkill($user, $skill->id);
        if( $hasSkill ) return $this->responses->jsonNotFound(["user" => "User already has the skill"]);

        $user->skills()->attach($skill);
        return $this->responses->jsonSuccess( $user->skills );
    }
    public function remove( $skill_id ) {
        $user = Auth::user();

        $hasSkill = $this->userHasSkill($user, $skill->id);
        if( !$hasSkill )  return $this->responses->jsonNotFound( ["user" => "User not has the skill"]);

        $user->skills()->detach([$skill_id]);
        $skills = $user->skills;

        if( count($skills) > 0 ) return $this->responses->jsonSuccess(  $skills );
        return $this->responses->jsonSuccess(  ["user" => "User not has the skills"] );
    }
    public function changeStatus( $skill_id ) {
        $user = Auth::user();

        $skill = $this->userHasSkill($user, $skill_id);
        if( !$skill ) return $this->responses->jsonNotFound( ["user" => "User not has the skill"] );

        $update = $user->skills()->updateExistingPivot($skill->id, [
            "is_active" => !$skill->pivot->is_active
        ]);
        if( !$update ) return $this->responses->jsonNotFound( ["user" => "User not has the skill"] );

        return $this->responses->jsonSuccess( $skill );
    }
    public function userHasSkill($user, $skill_id) {
        return $user->skills()->where('skills_id', $skill_id)->first();
    }
}
