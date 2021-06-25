<?php

namespace App\Http\Controllers\Colors;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Colors;

class ColorsController extends Controller
{
    public function getColors() {
        return Colors::all();
    }
}
