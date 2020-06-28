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
        $nuevoUsuario->password=bcrypt($request->password);
        //$nuevoUsuario->remember_token=$request->remember_token;
        $nuevoUsuario->created_at=$mytime->toDateTimeString();
        $nuevoUsuario->updated_at=$mytime->toDateTimeString();
        $nuevoUsuario->save();            
        
        $this->model_has_roles($request->model_id, 'App\User',$nuevoUsuario->id);
        return back()->with('mensaje','Usuario creado');  
    }
    public function model_has_roles($role_id, $model_type, $model_id)
    {
        $nuevoRol=new \App\model_has_roles;
        $nuevoRol->role_id=$role_id;
        $nuevoRol->model_type=$model_type;
        $nuevoRol->model_id=$model_id;
        $nuevoRol->save();
        return $nuevoRol->all();
    }
    public function administrarPermisos()
    {   
        $users=User::where('active',1)->get();
        return view('layouts.crudUsuario.permisos',compact('users'));
    }
    public function editarUsuarioView($id)
    {
        $roles=roles::all(); 
        $idSelected=model_has_roles::where('model_id',$id)->firstOrFail();        
        $rolSelected=roles::where('id',$idSelected->role_id)->firstOrFail();
        $usuario=new user;            
        $usuario=DB::table('users')->where('id',$id)->first();
        return view('layouts.crudUsuario.editarUsuario',compact('usuario','roles','rolSelected'));
        //return $rolSelected;
    }
    public function editarUsuario(Request $request, $id)
    {
        $mytime = Carbon\Carbon::now();                
        //return $request->all();
        $idUsuario=new user;
        $idUsuario::where('id',$id)->update(['name'=>$request->name,
                            'email'=>$request->email,
                            'password'=>bcrypt($request->password),
                            'updated_at'=>$mytime->toDateTimeString()]);
                
        
        $rol=new model_has_roles;
        $rol::where('model_id',$id)->update(['role_id'=>$request->role_id,
                    ]);                
        return redirect()->route('home')->with('mensaje','Usuario actualizado');        
    }
    public function desactivarUsuario($id){
        $mytime = Carbon\Carbon::now();                
        //return $request->all();
        
        $user= User::find($id);
        $user->active = 0;
        $user->updated_at=$mytime->toDateTimeString();
        $user->update();     
           
        return redirect()->route('home')->with('mensaje','Usuario desactivado');                  
    }
    
}
