<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');

        $residents = Resident::when($search, function ($query, $search) {
            return $query->where('nome', 'like', '%' . $search . '%');
        })->paginate(10)->appends($request->query());

        return view('layouts.communication', compact('residents'));
    }
}
