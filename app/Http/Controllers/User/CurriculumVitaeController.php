<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use App\Models\experiences;
use PDF;

class CurriculumVitaeController extends Controller
{
    public $UserController;
    public function __construct() {
        $this->UserController = new UserController;
    }

    public function viewCV( ) {
        $user           = $this->UserController->searchUser(  );
        $skills         = $user->skills;
        $experiences    = $user->experiences;
        $educations     = $user->educations;
        $social_media   = $user->social_media;

        return view('clients.home', compact('skills', 'user', 'experiences', 'educations', 'social_media'));
    }
    public function downloadPDF() {
        // retreive all records from db
        $data = $this->UserController->userAuth();

        // share data to view
        view()->share('user',$data);
        $pdf = PDF::loadView('pdf.view', $data);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}
