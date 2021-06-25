<?php

namespace App\Http\Controllers\Experiences;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experiences;

class ExperiencesController extends Controller {
    public function getExperiences() {
        return Experiences::whereUserId(1)->get();
    }
}
