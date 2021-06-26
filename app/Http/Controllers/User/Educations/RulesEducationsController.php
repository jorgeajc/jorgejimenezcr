<?php

namespace App\Http\Controllers\User\Educations;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class RulesEducationsController extends Controller {
    public function validateCreate($request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'place'  => 'required',
            'description'  => 'required',
            'start_year'  => 'required',
            'end_year'  => 'required',
            'status'  => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return [];
        }
    }
    public function validateUpdate($request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'place'  => 'required',
            'description'  => 'required',
            'start_year'  => 'required',
            'end_year'  => 'required',
            'status'  => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return [];
        }
    }
}
