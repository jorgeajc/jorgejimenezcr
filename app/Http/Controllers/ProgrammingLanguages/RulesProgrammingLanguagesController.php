<?php

namespace App\Http\Controllers\ProgrammingLanguages;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class RulesProgrammingLanguagesController extends Controller
{
    public function validateCreate($request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|unique:programming_languages,name',
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return [];
        }
    }
    public function validateUpdate($request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|unique:programming_languages,name',
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return [];
        }
    }
}
