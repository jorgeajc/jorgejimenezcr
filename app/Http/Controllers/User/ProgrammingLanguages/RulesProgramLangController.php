<?php

namespace App\Http\Controllers\User\ProgrammingLanguages;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class RulesProgramLangController extends Controller {
    public function validateCreate($request) {
        $validator = Validator::make($request->all(), [
            'programming_lang_id'  => 'required',
            'percentage'  => 'required',
	        'year_experience'  => 'required|integer'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return [];
        }
    }
}
