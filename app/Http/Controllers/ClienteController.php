<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente as cliente;
use App\User as user;
use Carbon;

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
                'cliente.lugar_de_trabajo_id')
                /*->join('users','cliente.user_id','=','users.id')*/->get();
        return view('layouts.crudCliente.clientes',compact('clientes'));
        //return $clientes;
    }

    /*public function crearCliente(Request $request)
    {

            $clientes=cliente::select('cliente.id',
                'cliente.nombre_cliente',
                'cliente.apellido_cliente',
                'cliente.dui_cliente',
                'cliente.nit_cliente',
                'cliente.telefono_cliente',
                'cliente.lugar_de_trabajo_id')
                /*->join('users','cliente.user_id','=','users.id')->get();
                return view('layouts.crudCliente.crearClientes',compact('clientes'));
    }*/
}
