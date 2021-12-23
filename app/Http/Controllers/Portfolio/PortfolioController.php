<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\User\UserController;

class PortfolioController extends Controller {
    public $UC;
    public function __construct() {
        $this->UC = new UserController;
    }
    public function index() {
        $user = $this->UC->searchUser();
        return view('portfolio.index', [
            "user" => $user
        ]);
    }
    public function portfolioDetails() {
        return view('portfolio.portfolio-details');
    }
}
