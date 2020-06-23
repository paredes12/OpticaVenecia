<?php

namespace App\Http\Controllers;

use DB;
use App\roles;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function crearUsuario()
    {
        $roles=roles::all();     
        return view('layouts.crudUsuario.crearUsuario',compact('roles'));
    }
    
    public function administrarPermisos()
    {
        return view('layouts.crudUsuario.permisos');
    }

    
}
