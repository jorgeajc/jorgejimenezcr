<?php

namespace App\Http\Controllers\User\Skills;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class RulesUserSkillsController extends Controller {
    public function validateCreate($request) {
        $validator = Validator::make($request->all(), [
            'skill_id'  => 'required',
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return [];
        }
    }
    public function validateRemove($request) {
        $validator = Validator::make($request->all(), [
            'skill_id'  => 'required',
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return [];
        }
    }
}
