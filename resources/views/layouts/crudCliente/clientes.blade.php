@extends('layouts.panel')

@section('contenido')

<div class="container" >
    <div class="row justify-content-center" style="margin-left: 150px;width:1300px">
        <div class="col-md-8">
            <div class="card">
            @if(session('mensaje'))
                <div class="alert alert-success" style="margin-left: width:100%;">
                    {{session('mensaje')}}
                </div>
            @endif
                <div class="card-header">{{ __('Clientes') }}</div>  
                              
                    <table class="table">
                    <thead  style="background-color: #1166bb;color: #ffff;" >
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">DUI</th>                        
                        <th scope="col">NIT</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Lugar de Trabajo</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($clientes as $row)
                            <tr>
                            <th scope="row">{{$row->id}}</th>
                            <td>{{$row->nombre_cliente}}</td>
                            <td>{{$row->apellido_cliente}}</td>
                            <td>{{$row->dui_cliente}}</td>
                            <td>{{$row->nit_cliente}}</td>
                            <td>{{$row->telefono_cliente}}</td>
                            <td>{{$row->nombre_empresa}}</td>
                            @can('editar cliente')
                            <td><button name="id" type="submit" value="{{$row->id}}" onClick="location.href='{{route('editarClienteView',['id'=>$row->id])}}'" class="btn btn-primary" >Editar</button></td>    
                            @endcan
                            <!--@can('eliminar cliente')
                            <td><button name="id" type="submit" value="{{$row->id}}" class="btn btn-danger" onClick="location.href='{{route('eliminarClienteView',['id'=>$row->id])}}'" onClick="return confirm('¿Esta seguro de que desea eliminar este cliente?')">Eliminar</button></td> 
                            @endcan-->
                        </tr>
                        @endforeach      
                        
                    </tbody>
                    </table>
               
                </div>
            
            </div>
        </div>
    </div>
</div>
@endsection