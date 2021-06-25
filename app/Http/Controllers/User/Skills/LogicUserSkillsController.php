<?php

namespace App\Http\Controllers\User\Skills;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Skills\RulesUserSkillsController;
use App\Http\Controllers\HandlerResponses\HandlerResponsesController;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Skills;

class LogicUserSkillsController extends Controller
{
    protected $rules;
    protected $responses;

    public function __construct() {
        $this->rules = new RulesUserSkillsController;
        $this->responses = new HandlerResponsesController;
    }

    public function addSkillToUser(Request $request) {
        $validate = $this->rules->validateCreate($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );

        $user_id = $request->user;
        $skill_id = $request->skill;

        $user = User::find( $user_id );
        $skill = Skills::find( $skill_id );

        $errors = [];

        if( !$user ) $errors["user"] = "User not found";
        if( !$skill ) $errors["skill"] = "Skill not found";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );

        $hasSkill = $this->userHasSkill($user, $skill->id);
        if( $hasSkill ) $errors["user"] = "User already has the skill";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );

        $user->skills()->attach($skill);
        return $this->responses->jsonSuccess( $user->skills );
    }

    public function removeSkillToUser(Request $request) {
        $validate = $this->rules->validateCreate($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );

        $user_id = $request->user;
        $skill_id = $request->skill;

        $user = User::find( $user_id );
        $skill = Skills::find( $skill_id );

        $errors = [];

        if( !$user ) $errors["user"] = "User not found";
        if( !$skill ) $errors["skill"] = "Skill not found";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );

        $hasSkill = $this->userHasSkill($user, $skill->id);
        if( !$hasSkill ) $errors["user"] = "User not has the skill";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );

        $user->skills()->detach($skill);
        return $this->responses->jsonSuccess( $user->skills );
    }

    public function changeStatusSkillToUser(Request $request) {
        $validate = $this->rules->validateCreate($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );

        $user_id = $request->user;
        $skill_id = $request->skill;

        $user = User::find( $user_id );
        $skill = Skills::find( $skill_id );

        $errors = [];

        if( !$user ) $errors["user"] = "User not found";
        if( !$skill ) $errors["skill"] = "Skill not found";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );


        $update = $user->skills()->updateExistingPivot($skill->id, [
            "is_active" => !$skill->is_active
        ]);
        if( !$update )return $this->responses->jsonNotFound( ["user" => "User not has the skill"] );

        return $this->responses->jsonSuccess( $user->skills );
    }

    public function userSkills(Request $request) {
        $validate = $this->rules->validateUser($request);
        if( count($validate) > 0 ) return $this->responses->jsonValidationError( $validate );

        $user_id = $request->user;

        $user = User::find( $user_id );

        $errors = [];

        if( !$user ) $errors["user"] = "User not found";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );

        if( count($user->skills) == 0 ) $errors["user"] = "User not has the skill";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );

        return $this->responses->jsonSuccess( $user->skills );
    }

    public function findUserSkill($user_id, $skill_id){
        $user = User::find( $user_id );

        $errors = [];

        if( !$user ) $errors["user"] = "User not found";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );

        $skill = $user->skills()->where('skills_id', $skill_id)->first();
        if( !$skill ) $errors["user"] = "User not has the skill";
        if( count($errors) > 0) return $this->responses->jsonNotFound($errors );

        return $this->responses->jsonSuccess( $skill );
    }


    public function userHasSkill($user, $skill_id) {
        return $user->skills()->where('skills_id', $skill_id)->first();
    }
}
