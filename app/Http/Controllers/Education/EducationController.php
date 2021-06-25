<?php

namespace App\Http\Controllers\Education;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;
class EducationController extends Controller
{
    public function getEducations() {
        return Education::all();
    }
}
