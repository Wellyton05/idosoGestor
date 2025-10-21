<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Models\Visit;
use Illuminate\Http\Request;
use PDF;

class VisitsController extends Controller
{
    public function index(Request $request) {
        $visitas = Visit::with('residente')
            ->orderBy('data', 'asc')
            ->orderBy('hora', 'asc')
            ->paginate(4);         
            
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

    public function destroy(Visit $visit) {
        $visit->delete();
        
        return redirect()->route('visits.index')
            ->with('success', 'Visita cancelada com sucesso.');
    }

    public function generatePdf()
    {
        $visits = Visit::with('residente')->orderBy('data', 'desc')->orderBy('hora', 'desc')->get();

        $pdf = PDF::loadView('layouts.visits-report', compact('visits'));

        return $pdf->download('relatorio_geral_visitas.pdf');
    }
}