<?php

namespace App\Http\Controllers;

use App\Http\Requests\TareaRequest;
use App\Models\proyecto;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{

    public function index()
    {
        $tareas=auth()->user()->tareas;
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

    public function asignar(Request $request, proyecto $proyecto, Tarea $tarea)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);
    
        if (!$tarea->users->contains($request->user_id)) {
            $tarea->users()->attach($request->user_id);
            return redirect()->route('proyectos.show', $proyecto->id)->with('success', 'Asignado correctamente.');
        }
    
        return redirect()->route('proyectos.show', $proyecto->id)->with('error', 'El usuario ya tiene esta tarea asignada.');
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

        return redirect()->route('proyectos.show',$tarea->proyecto)->with('success', 'Tarea actualizada correctamente.');
    }

    public function destroy(string $id)
    {
        
        $tarea=Tarea::find($id);
        $tarea->delete();
        return redirect()->route('proyectos.show',$tarea->proyecto)->with('success', 'Tarea eliminada correctamente.');
    }
}
