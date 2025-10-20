<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Models\Activity;
use Illuminate\Http\Request;
use PDF;

class ActivitiesController extends Controller
{
    public function index(Request $request)
    {
        $query = Activity::query();

        if ($request->has('search')) {
            $query->where('nome', 'like', '%' . $request->search . '%');
        }

        $activities = $query->with('residents')->orderBy('nome')->paginate(10);
        $residents = Resident::all();

        return view('layouts.activities', compact('activities', 'residents'));
    }

    public function addResident(Request $request, Activity $activity)
    {
        $request->validate([
            'resident_id' => 'required|exists:residents,id',
        ]);

        $activity->residents()->syncWithoutDetaching($request->resident_id);

        return redirect()->back()->with('success', 'Residente adicionado à atividade.');
    }

    public function removeResident(Activity $activity, Resident $resident)
    {
        $activity->residents()->detach($resident->id);

        return redirect()->back()->with('success', 'Residente removido da atividade.');
    }

    public function generatePdf()
    {
        $activities = Activity::with('residents')->orderBy('nome')->get();

        $pdf = PDF::loadView('layouts.activities-report', compact('activities'));

        return $pdf->download('relatorio_atividades_participantes.pdf');
    }
}
