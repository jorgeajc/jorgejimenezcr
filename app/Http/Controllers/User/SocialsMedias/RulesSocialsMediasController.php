<?php

namespace App\Http\Controllers\User\SocialsMedias;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class RulesSocialsMediasController extends Controller {
    public function validateCreate($request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'link'  => 'required',
            'color_id'  => 'required'
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
            'link'  => 'required',
            'color_id'  => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return [];
        }
    }
}
