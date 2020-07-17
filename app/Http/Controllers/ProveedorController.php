<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor as proveedor;
use App\Pais as pais;

class ProveedorController extends Controller
{
    //Tabla Búsqueda Proveedores
    public function proveedores(){
        $proveedores=proveedor::select('proveedor.id',
                'proveedor.proveedor',
                'proveedor.registro_proveedor',
                'proveedor.correo_proveedor',
                'proveedor.direccion_proveedor',
                'proveedor.pais_id',
                'pais.nombre_pais')
                ->join('pais','proveedor.pais_id','=','pais.id')->get();
        return view('layouts.crudProveedores.proveedores',compact('proveedores'));
        //return $proveedores;
    }
    
    //Crear Un Proveedor
    public function crearProveedor(Request $request)
    {
                $nuevoProveedor = new proveedor;
                $nuevoProveedor->proveedor=$request->proveedor;
                $nuevoProveedor->registro_proveedor=$request->registro_proveedor;
                $nuevoProveedor->correo_proveedor=$request->correo_proveedor;
                $nuevoProveedor->direccion_proveedor=$request->direccion_proveedor;
                $nuevoProveedor->pais_id=$request->pais_id;
                $nuevoProveedor->save();
                $this->proveedores();
                return redirect()->route('proveedores')->with('mensaje','Proveedor creado');
    }

    public function crearProveedorView(){       
        $paises = pais::all();                   
        return view('layouts.crudProveedores.crearProveedor',compact('paises'));
        //return $lugares;
        
    }

    public function editarProveedor(Request $request, $id){                    
        //return $request->all();
        $proveedores=new proveedor;
        $proveedores::where('id',$id)->update(['proveedor'=>$request->proveedor,
                            'registro_proveedor'=>$request->registro_proveedor,
                            'correo_proveedor'=>$request->correo_proveedor,
                            'direccion_proveedor'=>$request->direccion_proveedor,
                            'pais_id'=>$request->pais_id]);
                
                               
        return redirect()->route('proveedores')->with('mensaje','Proveedor actualizado');   
    }

    public function editarProveedorView($id){       
        $paises = pais::all();
        $proveedores=proveedor::where('id',$id)->firstOrFail();                               
        return view('layouts.crudProveedores.editarProveedor',compact('proveedores','paises'));
        //return $paises;
        
    }

    //Eliminar Proveedor
    public function eliminarProveedorView($id){       
        $proveedorEliminado= proveedor::find($id);       
        $proveedorEliminado->delete();     
        return redirect()->route('proveedores')->with('mensaje','El proveedor ha sido eliminado');      
    }
}
