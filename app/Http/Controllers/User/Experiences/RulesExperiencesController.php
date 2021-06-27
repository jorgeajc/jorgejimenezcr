<?php

namespace App\Http\Controllers\User\Experiences;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class RulesExperiencesController extends Controller
{
    public function validateCreate($request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'place'  => 'required',
            'description'  => 'required',
            'start_month'  => 'required',
            'start_year'  => 'required',
            'end_month'  => 'required',
            'end_year'  => 'required'
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
            'start_month'  => 'required',
            'start_year'  => 'required',
            'end_month'  => 'required',
            'end_year'  => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return [];
        }
    }
}
