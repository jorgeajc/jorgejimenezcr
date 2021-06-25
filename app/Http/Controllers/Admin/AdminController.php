<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;

class AdminController extends Controller {
    public $UserController;
    public function __construct() {
        $this->UserController = new UserController;
    }

    public function profile() {
        $user           = $this->UserController->userAuth();
        $skills         = $user->skills;
        $social_media   = $user->social_media;
        $experiences    = $user->experiences;

        $educations  = $user->educations()->orderBy('end_year', 'DESC')->get();
        return view('admin.profile.profile', compact('skills', 'user', 'social_media', 'educations', 'experiences'));
    }

    public function index() {
        $user = $this->UserController->userAuth();
        return view("admin.home.index", compact('user'));
    }

    private function getYearsEducation( $byStartYear, $byEndYear ) {
        $arrayStartYear = [];
        $arrayEndYear   = [];
        foreach( $byStartYear as $key => $item ) {
            array_push($arrayStartYear,$key);
        }
        foreach( $byEndYear as $key => $item ) {
            array_push($arrayEndYear,$key);
        }
        $years = array_unique( array_merge( $arrayStartYear, $arrayEndYear ) );
        sort( $years );
        return $years;
    }
}
