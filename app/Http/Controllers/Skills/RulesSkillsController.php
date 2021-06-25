<?php

namespace App\Http\Controllers\Skills;

use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;

class RulesSkillsController extends Controller {
    public function validateCreate($request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|unique:skills,name',
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return [];
        }
    }
    public function validateUpdate($request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|unique:skills,name',
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return [];
        }
    }
}
