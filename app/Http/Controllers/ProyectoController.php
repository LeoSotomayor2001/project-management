<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProyectoRequest;
use App\Models\proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index(){

        $userProjects = auth()->user()->proyectos;
        return view('proyectos.index' , compact('userProjects'));
    }
    public function create(){
        return view('proyectos.create');
    }

    public function store(ProyectoRequest $request){
        
        $request->validated();

        proyecto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'usuario_id' => auth()->user()->id
        ]);

        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado correctamente.');
    }
}
