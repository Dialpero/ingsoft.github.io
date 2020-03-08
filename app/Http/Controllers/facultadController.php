<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\facultad;
use App\user;

class facultadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facultades = facultad::get();

        return view('facultades.show',compact('facultades','usuarios'));
    }

    public function show()
    {
        $facultades = facultad::get();

        return view('facultades.show',compact('facultades','usuarios'));
    }

    public function indiv(Facultad $facultad)
    {
        return view('facultades.indiv', [
            'facultades' => $facultad
            ]);
    }

    public function create()
    {
        $usuarios = user::get();
        return view('facultades.add_facultad',compact('usuarios'));
    }

    public function store()
    {
        facultad::create([
            'id_Decano'=>request('id_Decano'),
            'nombre'=>request('nombre'),
            'estado'=>request('estado'),
        ]);
        return redirect()->route('facultades.show');
    }

    public function edit(Facultad $facultad)
    {
        return view('facultades.edit', [
        'facultad' => $facultad
        ]);
    }

    public function update(Facultad $facultad)
    {
        $facultad->update([
            'nombre' => request('nombre'),
            'estado' => request('estado'),
        ]);
        return redirect()->route('facultades.show');
    }

    public function destroy(Facultad $facultad)
    {
        $facultad->delete();
        return redirect()->route('facultades.show');
    }
}
