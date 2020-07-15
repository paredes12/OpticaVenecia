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
                <div class="card-header">{{ __('Proveedores') }}</div>  
                              
                    <table class="table">
                    <thead  style="background-color: #1166bb;color: #ffff;" >
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">Proveedor</th>
                        <th scope="col">Registro</th>
                        <th scope="col">Correo</th>                        
                        <th scope="col">Dirección</th>
                        <th scope="col">Pais</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($proveedores as $row)
                            <tr>
                            <th scope="row">{{$row->id}}</th>
                            <td>{{$row->proveedor}}</td>
                            <td>{{$row->registro_proveedor}}</td>
                            <td>{{$row->correo_proveedor}}</td>
                            <td>{{$row->direccion_proveedor}}</td>
                            <td>{{$row->nombre_pais}}</td>
                            @can('editar proveedor')
                            <td><button name="id" type="submit" value="{{$row->id}}" onClick="location.href='{{route('editarProveedorView',['id'=>$row->id])}}'" class="btn btn-primary" >Editar</button></td>    
                            @endcan
                            <!--@can('eliminar proveedor')
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