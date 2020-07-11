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
            <div class="card-header">{{ __('Empresas') }}
                        <a style="color: rgb(255, 255, 255);width: 100px;text-align: center;margin-left: 600px;" onClick="location.href='{{route('crearLugarDeTrabajoView')}}'" class="btn btn-primary">
                            {{ __('Añadir') }}
                        </a> 
                    </div>
                              
                    <table class="table">
                    <thead  style="background-color: #1166bb;color: #ffff;" >
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Jefe</th>
                        <th scope="col">Teléfono</th>                        
                        <th scope="col">Cargo</th>
                        <th></th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($lugares as $row)
                            <tr>
                            <th scope="row">{{$row->id}}</th>
                            <td>{{$row->nombre_empresa}}</td>
                            <td>{{$row->jefe_cliente}}</td>
                            <td>{{$row->telefono_empresa}}</td>
                            <td>{{$row->cargo_cliente}}</td>
                            @can('editar cliente')
                            <td><button name="id" type="submit" value="{{$row->id}}" onClick="location.href='{{route('editarLugarDeTrabajoView',['id'=>$row->id])}}'" class="btn btn-primary" >Editar</button></td>    
                            @endcan
                            @can('eliminar cliente')
                            <td><button name="id" type="submit" value="{{$row->id}}" class="btn btn-danger" onClick="location.href='{{route('eliminarLugarDeTrabajoView',['id'=>$row->id])}}'" onClick="return confirm('¿Esta seguro de que desea eliminar este cliente?')">Eliminar</button></td> 
                            @endcan
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