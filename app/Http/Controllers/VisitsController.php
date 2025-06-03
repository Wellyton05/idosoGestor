<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitsController extends Controller
{
    public function index(Request $request) {
        $visitas = Visit::with('residente')->get(); // ← Remove o where
        $residentes = Resident::all();
        
        return view('layouts.visits', compact('visitas', 'residentes'));
    }


    public function store(Request $request) {
        $request->validate([
            'data' => 'required|date',
            'hora' => 'required',
            'visitante' => 'required|string|max:255',
            'resident_id' => 'required|exists:residents,id'
        ]);

        Visit::create($request->only('data', 'hora', 'visitante', 'resident_id'));

    return redirect()->route('visits.index', ['data' => $request->input('data')])
        ->with('success', 'Visita agendada com sucesso.');
    }
}
