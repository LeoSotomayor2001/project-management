<?php

namespace App\Http\Controllers;

use App\Http\Requests\TareaRequest;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{

    public function index()
    {
        $tareas=Tarea::all();
        return view('tareas.index',compact('tareas'));
    }

    public function create()
    {   
        $proyectos=auth()->user()->proyectos;
        return view('tareas.create',compact('proyectos'));
    }
    public function store(TareaRequest $request)
    {

        $request->validated();
        
        Tarea::create([
            'proyecto_id' => $request->proyecto_id,
            'nombre' => $request->nombre,
            'fecha' => $request->fecha
        ]);
        return redirect()->route('tareas.index')->with('success', 'Tarea creada correctamente.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Tarea $tarea)
    {
        $proyectos=auth()->user()->proyectos;
        return view('tareas.edit',compact('tarea','proyectos'));
    }

    public function update(TareaRequest $request, Tarea $tarea)
    {
        $request->validated();
        $tarea->nombre=$request->nombre;
        $tarea->fecha=$request->fecha;
        $tarea->proyecto_id=$request->proyecto_id;
        $tarea->save();

        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada correctamente.');
    }

    public function destroy(string $id)
    {
        
        $tarea=Tarea::find($id);
        $tarea->delete();
        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada correctamente.');
    }
}
