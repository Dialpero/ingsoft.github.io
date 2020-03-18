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
        $usuarios = user::get();
        return view('departamentos.indiv', [
            'departamento' => $departamento,
            'usuarios' => $usuarios
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
        return redirect()->route('departamentos.temporal');
    }

    public function temp()
    {
        $departamento = departamento::latest()->get();
        $usuarios = user::get();
        foreach($usuarios as $us){
            if($us->id == $departamento[0]->id_Secretaria){
                $us->update([
                    'estado' => 'activo',
                ]);
            }
        }
        return redirect()->route('departamentos.show');
    }

    public function edit(Departamento $departamento)
    {
        $usuarios = user::get();
        return view('departamentos.edit', [
        'departamento' => $departamento,
        'usuarios' => $usuarios
        ]);
    }

    public function update(Departamento $departamento)
    {
        $usuarios = user::get();
        $departamento->update([
            'nombre' => request('nombre'),
            'estado' => request('estado'),
            'id_Secretaria' => request('id_Secretaria'),
        ]);
        foreach($usuarios as $us){
            if($us->id == $departamento->id_Secretaria){
                $us->update([
                    'estado' => 'Activo'
                ]);
            }
        }
        return redirect()->route('departamentos.show');
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamentos.show');
    }

    public function usermod(User $usuario)
    {
        $departamentos = departamento::get();
        foreach($departamentos as $dep){
            if($dep->id_Secretaria == $usuario->id){
                $usuario->update([
                    'estado' => 'Inactivo',
                ]);
                $dep->delete();
            }
        }
        return redirect()->route('departamentos.show');
    }
}
