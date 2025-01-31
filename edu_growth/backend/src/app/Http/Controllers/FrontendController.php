<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Pertandingan;
use App\Models\Report;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        $courses = Course::all();
        $reports = Report::all();
        // $pertandingans = Pertandingan::with(['clientA', 'clientB'])->get();
        // return view('frontend.index', compact('courses', 'layanans', 'pertandingans'));
        return view('frontend.index', compact('courses', 'reports'));
    }
}
