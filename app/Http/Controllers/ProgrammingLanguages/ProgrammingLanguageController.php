<?php

namespace App\Http\Controllers\ProgrammingLanguages;
use App\Http\Controllers\Controller;
use App\Models\Programming_language;
use Illuminate\Http\Request;

class ProgrammingLanguageController extends Controller
{
    public function getProgrammingLanguages() {
        return Programming_language::all();
    }
}
