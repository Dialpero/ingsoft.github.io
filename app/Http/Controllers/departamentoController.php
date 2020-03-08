<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\departamento;
use App\facultad;
use App\user;
use App\Http\Controller\facultadController;



class departamentoController extends Controller
{

    public function show()
    {
        $departamentos = departamento::get();

        return view('departamentos.show',compact('departamentos','facultades','usuarios'));
    }

    public function indiv(Departamento $departamento)
    {
        return view('departamentos.indiv', [
            'departamento' => $departamento
            ]);
    }
    
    public function create()
    {
        $facultades = facultad::get();
        $usuarios = user::get();
        return view('departamentos.add_departamentos',compact('facultades','usuarios'));
    }

    public function store(Facultad $facultad)
    {
        departamento::create([
            'facultad'=>request('facultad'),
            'id_Dept'=>request('id_Dept'),
            'nombre'=>request('nombre'),
            'estado'=>request('estado'),
            'id_Secretaria' => request('id_Secretaria'),
        ]);
        return redirect()->route('departamentos.show');
    }

    public function edit(Departamento $departamento)
    {
        return view('departamentos.edit', [
        'departamento' => $departamento
        ]);
    }

    public function update(Departamento $departamento)
    {
        $departamento->update([
            'nombre' => request('nombre'),
            'estado' => request('estado'),
            'id_Secretaria' => request('id_Secretaria'),
        ]);
        return redirect()->route('departamentos.show');
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamentos.show');
    }
}
