<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioController extends Controller {
    public function index() {
        return view('portfolio.index');
    }
    public function portfolioDetails() {
        return view('portfolio.portfolio-details');
    }
}
