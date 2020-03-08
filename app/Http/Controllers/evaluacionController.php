<?php

namespace App\Http\Controllers;

use App\evaluacion;
use App\Http\Requests\SaveEvaluacionRequest;
use App\Http\Requests\SaveAcademicRequest;
use App\Http\Controller\AcademicController;
use App\Academic;

use Illuminate\Http\Request;

class evaluacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function promedio(){
        $evaluacion = evaluacion::get();
        $academics = academic::get();
        foreach($academics as $aca){
            $total = 0;
            $cant = 0;
            $aca->update([
                'promedio' => 0,
            ]);
            foreach($evaluacion as $ev){
                if ($ev->rut_academico == $aca->rut) {
                    $total = $ev->calificacion_final + $total;
                    $cant = 1 + $cant;
                }
            }
            if($cant === 0){
                $cant = 1;
            }
            $media = $total/$cant;
            $aca->update([
                'promedio' => $media,
            ]);
        }
        $academics = academic::orderBy('promedio','DESC')->get();
        return view('evaluaciones.promedio', compact('academics'));
    }


    
    public function index()
    {
        
        return view('evaluaciones.index', [
            'evaluaciones' => evaluacion::get()
        ]);
    }

    public function show($id)
    {
        return view('evaluaciones.show',[
            'evaluacion' =>  evaluacion::findOrFail($id)
        ]);
    }

    public function createEvaluation($id)
    {
        $evaluacionAnterior = evaluacion::get();
        $reverse = $evaluacionAnterior->reverse();
        $academic = academic::findOrfail($id);
        $i = $reverse->count()-1;
        if($i === -1){
            $i = 0;
            $reverse[$i] = new evaluacion;
            $reverse[$i]->calificacion_final = 0;
            $reverse[$i]->observacion_final = 0;
        }else{  
            while($i >= 0 ){
                if($reverse[$i]->rut_academico == $academic->rut){
                    break;
                }
                $i--;
            }
            if($i === -1){
                $i = 0;
                $reverse[$i] = new evaluacion;
                $reverse[$i]->calificacion_final = 0;
                $reverse[$i]->observacion_final = 0;   
            }
        }
        return view('evaluaciones.createEvaluation', [
            'evaluacion' => new evaluacion,
            'reverse' => $reverse,
            'academic' => academic::findOrfail($id),
            'i' => $i
        ]);
    }


    public function store(SaveEvaluacionRequest $request)
    {
        evaluacion::create( $request->validated());
        return redirect()->route('evaluaciones.index')->with('status', 'La evaluación fue ingresada con éxito');  
    }

    public function edit(evaluacion $evaluacion)
    {
        return view('evaluaciones.edit',[ 
            'evaluacion' =>  $evaluacion
        ]);
    }
    
    public function update(evaluacion $evaluacion, SaveEvaluacionRequest $request)
    {
        $evaluacion->update($request->validated());
        return redirect()->route('evaluaciones.show', $evaluacion)->with('status', 'La evaluación fue actualizada con éxito');  
    }

    public function destroy(evaluacion $evaluacion)
    {
        $evaluacion->delete();
        return redirect()->route('evaluaciones.index')->with('status', 'La evaluación fue eliminada con éxito');;
    }
}
