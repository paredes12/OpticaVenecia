<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais as pais;
use App\Proveedor as proveedor;
use Illuminate\Support\Str;

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

    //Crear pais
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

    //Eliminar país
    public function eliminarpaisView($id){       
        $validar=pais::select('proveedor.proveedor')
        ->join('proveedor','pais.id','=','proveedor.pais_id')
        ->where('pais.id',$id)->get();
        //return $validar;
        if($validar->isEmpty()){
            $paisEliminado= pais::find($id);       
            $paisEliminado->delete();     
               
            return redirect()->route('paises')->with('mensaje','El país ha sido eliminado');
        }
        else{
            return redirect()->route('paises')->with('mensaje','El país no puede eliminarse porque está en uso.');
        }
        
        
        
    }
}
