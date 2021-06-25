<?php

namespace App\Http\Controllers\ProgrammingLanguages;
use App\Http\Controllers\Controller;
use App\Models\ProgrammingLanguages;
use Illuminate\Http\Request;

class ProgrammingLanguageController extends Controller
{
    public function getProgrammingLanguages() {
        return ProgrammingLanguages::all();
    }
}
