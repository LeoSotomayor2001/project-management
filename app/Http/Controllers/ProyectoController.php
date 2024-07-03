<?php

namespace App\Http\Controllers;

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
}
