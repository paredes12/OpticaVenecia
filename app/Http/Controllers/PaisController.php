<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais as pais;

class PaisController extends Controller
{
    //Consulta
    public function paises(){       
        $paises = pais::all();                   
        return view('layouts.crudPais.paises',compact('paises'));
        //return $paises;
        
    }

    //Retornar Formulario
    public function crearPaisView(){                   
        return view('layouts.crudPais.crearPais');
        
    }

    //Crear pais De Trabajo
    public function crearPais(Request $request)
    {
                $nuevopais = new pais;
                $nuevopais->nombre_pais=$request->nombre_pais;
                $nuevopais->save();
                $this->paises();
                return redirect()->route('paises')->with('mensaje','País Creado');
    }


    //Retornar Form Editar
    public function editarPaisView($id){
                $paises=pais::where('id',$id)->firstOrFail();                               
                return view('layouts.crudPais.editarPais',compact('paises'));    
    }

    //Editar pais De Trabajo
    public function editarpais(Request $request, $id){                    
                $paisEditado=new pais;
                $paisEditado::where('id',$id)->update(['nombre_pais'=>$request->nombre_pais]);                                       
                return redirect()->route('paises')->with('mensaje','País Actualizado');   
    }

    //Eliminar pais De Trabajo
    public function eliminarpaisView($id){       

        $paisEliminado= pais::find($id);       
        $paisEliminado->delete();     
           
        return redirect()->route('empresas')->with('mensaje','pais eliminado');
        
    }
}
