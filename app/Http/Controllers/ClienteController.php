<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente as cliente;
use App\User as user;
use Carbon;
use App\Lugar_de_trabajo as lugar;

class ClienteController extends Controller
{
    //Función leer empleado
    public function clientes(){
        $clientes=cliente::select('cliente.id',
                'cliente.nombre_cliente',
                'cliente.apellido_cliente',
                'cliente.dui_cliente',
                'cliente.nit_cliente',
                'cliente.telefono_cliente',
                'cliente.lugar_de_trabajo_id',
                'lugar_de_trabajo.nombre_empresa')
                ->join('lugar_de_trabajo','cliente.lugar_de_trabajo_id','=','lugar_de_trabajo.id')->get();
        return view('layouts.crudCliente.clientes',compact('clientes'));
        //return $clientes;
    }

    public function crearCliente(Request $request)
    {
            /*$clientes=cliente::select('cliente.id',
                'cliente.nombre_cliente',
                'cliente.apellido_cliente',
                'cliente.dui_cliente',
                'cliente.nit_cliente',
                'cliente.telefono_cliente',
                'cliente.lugar_de_trabajo_id')->get();*/
                $nuevoCliente = new cliente;
                $nuevoCliente->nombre_cliente=$request->nombre_cliente;
                $nuevoCliente->apellido_cliente=$request->apellido_cliente;
                $nuevoCliente->dui_cliente=$request->dui_cliente;
                $nuevoCliente->nit_cliente=$request->nit_cliente;
                $nuevoCliente->telefono_cliente=$request->telefono_cliente;
                $nuevoCliente->lugar_de_trabajo_id=$request->lugar_de_trabajo_id;
                $nuevoCliente->save();
                $this->clientes();
                return redirect()->route('clientes')->with('mensaje','Cliente creado');
    }

    public function crearClienteView(){       
        $lugares = lugar::all();                   
        return view('layouts.crudCliente.crearCliente',compact('lugares'));
        //return $lugares;
        
    }

    public function editarCliente(Request $request, $id){                    
        //return $request->all();
        $clientes=new cliente;
        $clientes::where('id',$id)->update(['nombre_cliente'=>$request->nombre_cliente,
                            'apellido_cliente'=>$request->apellido_cliente,
                            'dui_cliente'=>$request->dui_cliente,
                            'nit_cliente'=>$request->nit_cliente,
                            'telefono_cliente'=>$request->telefono_cliente,
                            'lugar_de_trabajo_id'=>$request->lugar_de_trabajo_id]);
                
                               
        return redirect()->route('clientes')->with('mensaje','Cliente actualizado');   
    }

    public function editarClienteView($id){       

        $clientes=cliente::where('id',$id)->firstOrFail();                               
        return view('layouts.crudCliente.editarCliente',compact('clientes'));
        //return $usuariosTomados;
        
    }

    /*public function eliminarClienteView($id){       

        $clientes=cliente::where('id',$id)->firstOrFail();                               
        return view('layouts.crudCliente.editarCliente',compact('clientes'));
        //return $usuariosTomados;
        
    }*/

}
