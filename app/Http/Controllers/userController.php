<?php

namespace App\Http\Controllers;

use DB;
use App\roles as roles;
use App\User as user;
use App\model_has_roles as model_has_roles;
use Carbon;
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
    public function crearUsuarioView()
    {
        $roles=roles::all();     
        return view('layouts.crudUsuario.crearUsuario',compact('roles'));
    }
    
    public function crearUsuario(Request $request)
    {
        $mytime = Carbon\Carbon::now();        
        //return $request->all();
        $idUsuario=new user;
        $idUsuario = User::orderBy('created_at', 'desc')->first();
        
        $nuevoUsuario=new user;
        $nuevoUsuario->id=$idUsuario->id+1;
        $nuevoUsuario->name=$request->name;
        $nuevoUsuario->email=$request->email;
        //$nuevoUsuario->email_verified_at=$request->email_verified_at;
        $nuevoUsuario->password=$request->password;
        //$nuevoUsuario->remember_token=$request->remember_token;
        $nuevoUsuario->created_at=$mytime->toDateTimeString();
        $nuevoUsuario->updated_at=$mytime->toDateTimeString();
        $nuevoUsuario->save();
        //return back()->with('mensaje','Usuario creado');  
     
        $nuevoRol=new model_has_roles;
        $nuevoRol->role_id=$request->model_id;
        $nuevoRol->model_type='App\User';
        $nuevoRol->model_id=$idUsuario->id+1;
        $nuevoRol->save();
        return $nuevoRol->all();      
    }

    public function administrarPermisos()
    {
        return view('layouts.crudUsuario.permisos');
    }

    
}
