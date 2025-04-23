<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{   
    public function index()
    {
    $residents = Resident::all();  // Busca todos os residentes
    return view('layouts.residents', compact('residents'));  // Envia para a view
    }

    public function create()
    {
        return view('layouts.add-residents');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'idade' => 'required|integer|min:0',
            'nome_responsavel' => 'required|string|max:255',
            'contato_responsavel' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:residents,cpf',
            'estado_saude' => 'required|string',
        ]);

        Resident::create($request->all());

        return redirect()->back()->with('success', 'Residente cadastrado com sucesso!');
    }
}
