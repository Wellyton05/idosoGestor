<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{   
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $residents = Resident::when($search, function ($query, $search) {
            return $query->where('nome', 'like', '%' . $search . '%');
        })->paginate(10)->appends($request->query());
    
        return view('layouts.residents', compact('residents'));
    }
    

    public function create()
    {
        return view('layouts.add-residents');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|min:0|max:255',
            'idade' => 'required|integer|min:60|max:120',
            'nome_responsavel' => 'required|string|min:0|max:255',
            'contato_responsavel' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:residents,cpf',
            'estado_saude' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

         $data = $request->all();

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $path = $request->file('photo')->store('residents', 'public');
            $data['photo'] = $path;
        }

        Resident::create($data);

        return redirect()->back()->with('success', 'Residente cadastrado com sucesso!');
    }

      public function edit(Resident $resident)
    {
        $resident->load(['activities', 'visits']);

        // Define as opções possíveis para o estado de saúde
        $opcoes = ['Boa', 'Regular', 'Precária'];

        return view('layouts.edit-resident', compact('resident', 'opcoes'));
    }

   public function update(Request $request, Resident $resident)
    {
        $data = $request->validate([
            'idade' => 'required|numeric',
            'contato' => 'required|string',
            'cpf' => 'required|string',
            'estado_saude' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $path = $request->file('photo')->store('residents', 'public');
            $data['photo'] = $path;
        }

        $resident->update($data);

        return redirect()->route('residents.index')->with('success', 'Dados atualizados com sucesso!');
    }

    public function destroy(Resident $resident)
    {
        // Apaga a foto do storage se existir
        if ($resident->photo && \Storage::disk('public')->exists($resident->photo)) {
            \Storage::disk('public')->delete($resident->photo);
        }

        $resident->delete();

        return redirect()->route('residents.index')->with('success', 'Residente excluído com sucesso!');
    }

    public function generatePdf(Resident $resident)
    {
        $resident->load(['activities', 'visits']); // carrega relacionamentos

        $pdf = PDF::loadView('residents.report', compact('resident'));

        return $pdf->download('relatorio_residente_' . $resident->id . '.pdf');
    }
   

}
