<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvitacionRequest;
use App\Http\Requests\ProyectoRequest;
use App\Models\proyecto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProyectoController extends Controller
{
    public function index()
    {

        $userProjects = auth()->user()->proyectos;//obtener los proyectos donde el usuario es colaborador
        return view('proyectos.index', compact('userProjects'));
    }
    public function create()
    {
        return view('proyectos.create');
    }
    public function show(proyecto $proyecto)
    {   
        //obtener las tareas del proyecto
        $tareas = $proyecto->tareas;
        // obtener los usuarios directamente desde la relación del proyecto
        $usersProject = $proyecto->users; 
        return view('proyectos.show', compact('proyecto', 'tareas', 'usersProject'));
    }


    public function store(ProyectoRequest $request)
    {

        $request->validated();

        $proyecto = proyecto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'usuario_id' => auth()->user()->id
        ]);

        // Asignar al usuario autenticado como el primer colaborador
        $proyecto->users()->attach(Auth::id());

        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado correctamente.');
    }

    public function edit(proyecto $proyecto)
    {
        return view('proyectos.edit', compact('proyecto'));
    }


    public function update(ProyectoRequest $request, proyecto $proyecto)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $proyecto->update($validated);

        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado exitosamente.');
    }

    public function destroy(proyecto $proyecto)
    {
        $proyecto->delete();
        return redirect()->route('proyectos.index');
    }
}
