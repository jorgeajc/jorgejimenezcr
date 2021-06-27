<?php

namespace App\Http\Controllers\Colors;

use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;

class RulesColorsController extends Controller {
    public function validateCreate($request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|unique:colors,name',
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return [];
        }
    }
    public function validateUpdate($request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|unique:colors,name',
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return [];
        }
    }
}
