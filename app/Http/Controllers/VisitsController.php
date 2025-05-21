<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitsController extends Controller
{
    public function index(){
        return view('layouts.visits');
    }
}
