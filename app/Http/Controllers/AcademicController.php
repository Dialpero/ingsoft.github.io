<?php

namespace App\Http\Controllers;

use App\Academic;
use App\evaluacion;
use App\Http\Requests\SaveEvaluacionRequest;
use App\Http\Requests\SaveAcademicRequest;
use Illuminate\Http\Request;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        //$portafolio = DB::table('academics')->get(); // Sin crear archivo 'academic.php'

        return view('academics.index', [
            'academics' => Academic::latest()->paginate()
        ]);
    }

    public function show($id)
    {
        $evaluaciones = evaluacion::get();
        $academic = Academic::findOrFail($id);
        $collection = collect([]);
        $concatenated = collect([]);
        foreach($evaluaciones as $evaluacion){
            if($evaluacion->rut_academico ==  $academic->rut){
                $concatenated = $collection->concat($concatenated)->concat([$evaluacion]);
            }      
        }
        return view('academics.show',[
            'academic' => Academic::findOrFail($id),
            'concatenated' => $concatenated
        ]);
    }
    public function create()
    {
        return view('academics.create', [
            'academic' => new Academic
        ]);
    }

    public function store(SaveAcademicRequest $request)
    {
        Academic::create( $request->validated());
        return redirect()->route('academics.index')->with('status', 'El académico fue ingresado con éxito');  
    }
    public function edit(Academic $academic)
    {
        return view('academics.edit',[ 
            'academic' =>  $academic
        ]);
    }
    
    public function update(Academic $academic, SaveAcademicRequest $request)
    {
        $academic->update($request->validated());
        return redirect()->route('academics.show', $academic)->with('status', 'El académico fue actualizado con éxito');  
    }

    public function destroy(Academic $academic)
    {
        $evaluacion = evaluacion::get();
        foreach($evaluacion as $dato){
            if($dato->rut_academico == $academic->rut){
                $dato->delete();
            }
        }
        $academic->delete();
        return redirect()->route('academics.index')->with('status', 'El académico fue eliminado con éxito');  
    }
}