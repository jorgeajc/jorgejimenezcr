<?php

namespace App\Http\Controllers\Color;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function getColors() {
        return Color::all();
    }
}
