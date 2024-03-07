<?php

namespace App\Http\Controllers;

class GroomingController extends Controller
{
    public function grooming_page()
    {
        return view('grooming_page');
    }

    public function show_groomingForm()
    {
        return view('show_groomingForm');
    }
}
