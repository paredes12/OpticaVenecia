<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado as empleado;
use App\User as user;

class EmpleadoController extends Controller
{
    //
    public function empleados(){
        $empleados=empleado::select('empleado.id',
                'empleado.nombre_empleado',
                'empleado.apellido_empleado',
                'empleado.salario_base',
                'users.name')->join('users','empleado.user_id','=','users.id')->get();
        return view('layouts.crudEmpleado.empleados',compact('empleados'));
        //return $empleados;
    }
    public function editarEmpleadoView($id){      
        $usuariosTomados=[];
        $empleados=empleado::all();        
        foreach($empleados as $row){            
                if(!($row->id==$id)){
                    array_push($usuariosTomados,$row->user_id);                
            }           
        }           

        $usuarios=user::whereNotIn('id',$usuariosTomados)->get();
        $empleado=empleado::where('id',$id)->firstOrFail();                               
        return view('layouts.crudEmpleado.editarEmpleado',compact('empleado','usuarios'));
        //return $usuariosTomados;
        
    }
    public function editarEmpleado(Request $request, $id){                    
        //return $request->all();
        $empleado=new empleado;
        $empleado::where('id',$id)->update(['nombre_empleado'=>$request->nombre_empleado,
                            'apellido_empleado'=>$request->apellido_empleado,
                            'salario_base'=>$request->salario_base,
                            'user_id'=>$request->user_id]);
                
                               
        return redirect()->route('empleados')->with('mensaje','Usuario actualizado');   
    }
    public function eliminarEmpleado($id){

    }
    public function crearEmpleado(Request $request){
        $usuariosDisponibles=[];
        $empleados=empleado::all();
        foreach($empleados as $row){
            array_push($usuariosDisponibles,$row->user_id);
        }
        $usuarios=user::whereNotIn('id',$usuariosDisponibles)->get();
    }
}
