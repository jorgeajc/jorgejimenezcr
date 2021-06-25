<?php

namespace App\Http\Controllers\Educations;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Educations;
class EducationsController extends Controller
{
    public function getEducations() {
        return Educations::all();
    }
}
