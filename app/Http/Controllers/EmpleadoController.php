<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado as empleado;
use App\User as user;

class EmpleadoController extends Controller
{
    //Formulario de empleados
    public function empleados(){
        $empleados=empleado::select('empleado.id',
                'empleado.nombre_empleado',
                'empleado.apellido_empleado',
                'empleado.salario_base',
                'users.name')->join('users','empleado.user_id','=','users.id')->get();
        return view('layouts.crudEmpleado.empleados',compact('empleados'));
        //return $empleados;
    }

    //Crear Empleado
    public function crearEmpleado(Request $request)
    {
                $nuevoEmpleado = new empleado;
                $nuevoEmpleado->nombre_empleado=$request->nombre_empleado;
                $nuevoEmpleado->apellido_empleado=$request->apellido_empleado;
                $nuevoEmpleado->salario_base=$request->salario_base;
                $nuevoEmpleado->user_id=$request->user_id;
                $nuevoEmpleado->save();
                $this->empleados();
                return redirect()->route('empleados')->with('mensaje','Empleado Creado');
    }

    //Retornar vista crear empleados
    public function crearEmpleadoView(){
        $usuarios=user::all();                   
        return view('layouts.crudEmpleado.crearEmpleado',compact('usuarios'));
        //return(compact('usuarios'));
    }

    public function editarEmpleadoView($id){      
        $empleadoEditado=empleado::where('id',$id)->firstOrFail();
        $usuarios=user::all();                              
        return view('layouts.crudEmpleado.editarEmpleado',compact('empleadoEditado','usuarios'));
        
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
}
