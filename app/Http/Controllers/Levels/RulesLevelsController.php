<?php

namespace App\Http\Controllers\Levels;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class RulesLevelsController extends Controller
{
    public function validateCreate($request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|unique:levels,name',
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return [];
        }
    }
    public function validateUpdate($request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|unique:levels,name',
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return [];
        }
    }
}
