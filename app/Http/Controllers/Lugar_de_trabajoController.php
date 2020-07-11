<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lugar_de_trabajo as lugar;

class Lugar_de_trabajoController extends Controller
{

    //Consulta
    public function leerLugarDeTrabajo(){       
        $lugares = lugar::all();                   
        return view('layouts.crudLugarDeTrabajo.empresas',compact('lugares'));
        //return $lugares;
        
    }

    //Retornar Formulario
    public function crearLugarDeTrabajoView(){                   
        return view('layouts.crudLugarDeTrabajo.crearLugarDeTrabajo');
        
    }

    //Crear Lugar De Trabajo
    public function crearLugarDeTrabajo(Request $request)
    {
                $nuevoLugar = new lugar;
                $nuevoLugar->nombre_empresa=$request->nombre_empresa;
                $nuevoLugar->jefe_cliente=$request->jefe_cliente;
                $nuevoLugar->telefono_empresa=$request->telefono_empresa;
                $nuevoLugar->cargo_cliente=$request->cargo_cliente;
                $nuevoLugar->save();
                $this->leerLugarDeTrabajo();
                return redirect()->route('empresas')->with('mensaje','Lugar de Trabajo creado');
    }


    //Retornar Form Editar
    public function editarLugarDeTrabajoView($id){
                $lugares=lugar::where('id',$id)->firstOrFail();                               
                return view('layouts.crudLugarDeTrabajo.editarLugarDeTrabajo',compact('lugares'));    
    }

    //Editar Lugar De Trabajo
    public function editarLugarDeTrabajo(Request $request, $id){                    
                $lugarEditado=new lugar;
                $lugarEditado::where('id',$id)->update(['nombre_empresa'=>$request->nombre_empresa,
                                'jefe_cliente'=>$request->jefe_cliente,
                                'telefono_empresa'=>$request->telefono_empresa,
                                'cargo_cliente'=>$request->cargo_cliente]);                                       
                return redirect()->route('empresas')->with('mensaje','Lugar de Trabajo actualizado');   
    }

    //Eliminar Lugar De Trabajo
    public function eliminarLugarDeTrabajoView($id){       

        $lugarEliminado= lugar::find($id);       
        $lugarEliminado->delete();     
           
        return redirect()->route('empresas')->with('mensaje','Lugar de Trabajo eliminado');
        
    }
}
