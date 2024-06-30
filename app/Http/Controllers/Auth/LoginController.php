<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(LoginRequest  $request){
        $request->validated();

        if(!auth()->attempt($request->only('email','password')) ){
            return back()->with('error','Credenciales Incorrectas');
        }

    }
}
