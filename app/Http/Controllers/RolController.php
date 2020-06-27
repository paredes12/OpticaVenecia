<?php

namespace App\Http\Controllers;

use DB;
use App\roles as roles;
use App\permissions as permissions;
use App\role_has_permissions;
use Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function getRoles()
    {
        $roles=roles::all();
        return $roles;
    }

    public function adminRoles()
    {
        $roles=roles::all();     
        return view('layouts.crudRoles.roles',compact('roles'));
    }
    public function editarRolesView($id)
    {        
        $rol=new roles;            
        $rol=DB::table('roles')->where('id',$id)->first();
        return view('layouts.crudUsuario.editarUsuario',compact('rol'));
       //return $usuario->id." ".$usuario->name;
    }
    public function addPermission($id, $permissions){        
        $rol=roles::find($id);

    }
    public function crearRole(Request $request)
    {
        //$permisos=[];
        
        $mytime = Carbon\Carbon::now();        
        //return $request->all();
        $idRole=new roles;
        $idRole = roles::orderBy('created_at', 'desc')->first();
        
        $nuevoRol=new roles;
        $nuevoRol->id=$idRole->id+1;
        $nuevoRol->name=$request->name;        
        $nuevoRol->guard_name='web';                        
        $nuevoRol->created_at=$mytime->toDateTimeString();
        $nuevoRol->updated_at=$mytime->toDateTimeString();
        $nuevoRol->save();        
        
        $permiso=new role_has_permissions;
        foreach($request->permission_id as $permiso){
            $this->role_has_permissions($permiso, $nuevoRol->id);
        }
        
        return back()->with('mensaje','Rol creado');  
        //return $permisos;
    }
    public function role_has_permissions($permission_id,$role_id)
    {
        $nuevoPermiso=new \App\role_has_permissions;
        $nuevoPermiso->permission_id=$permission_id;
        $nuevoPermiso->role_id=$role_id;        
        $nuevoPermiso->save();
        //return $nuevoPermiso->all();
    }
    public function crearRoleView()
    {        
        $permissions=permissions::all();     
        return view('layouts.crudRoles.crearRoles',compact('permissions'));    
    }
    public function editarRoleView($id){    
        $permission_id=[];
        $activos=role_has_permissions::where('role_id',$id)->get();
        foreach($activos as $row){
            array_push($permission_id,$row->permission_id);
        }
        $allPermission=permissions::whereNotIn('id',$permission_id)->get();
        
        //$role_has_permissions=role_has_permissions::whereIn('role_id',$id)->get(); 
        $permisos = DB::table('role_has_permissions')
            ->join('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')            
            ->where('role_id',$id)
            ->get();

        //$permisos=permissions::where('id',$id)->get();
        $rol=new roles;            
        $rol=DB::table('roles')->where('id',$id)->first();
        return view('layouts.crudRoles.editarRoles',compact('rol','permisos','allPermission'));
        //return $permisos;
    }
    public function editarRole(Request $request,$id)
    {
                
        if(!($request->has('permission_id'))){
            $mytime = Carbon\Carbon::now();                
            //return $request->all();
            $idRol=new roles;
            $idRol::where('id',$id)->update(['name'=>$request->name,                           
                                'updated_at'=>$mytime->toDateTimeString()]); 
            return redirect()->route('editarRolesView',$id)->with('mensaje','Rol actualizado'); 
        }                
        else{
            foreach($request->permission_id as $permiso){
                $this->role_has_permissions($permiso, $id);                
            }
            return redirect()->route('editarRolesView',$id)->with('mensaje','Permiso agregado'); 
        }                             
    }
    public function eliminarRole($id){
        $mytime = Carbon\Carbon::now();                                
        $rol= roles::find($id);       
        $rol->delete();     
           
        return redirect()->route('adminPermisos')->with('mensaje','Role eliminado');           
    }
    public function eliminarPermiso($role_id,$permission_id)
    {
        $permiso=role_has_permissions::where("permission_id",$permission_id)
        ->where('role_id',$role_id);
        $permiso->delete();
        return redirect()->route('editarRolesView',$role_id)->with('mensaje','Permiso eliminado'); 
    }    
}
