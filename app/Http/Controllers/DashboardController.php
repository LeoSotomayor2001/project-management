<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $proyectos = $user->proyectos;

        // Recoger todos los colaboradores únicos
        $colaboradores = collect();

        foreach ($proyectos as $proyecto) {
            $colaboradores = $colaboradores->merge($proyecto->users);
        }

        $colaboradoresUnicos = $colaboradores->unique('id')->count();
        return view('dashboard.dashboard', compact('proyectos', 'colaboradoresUnicos'));
    }
}
