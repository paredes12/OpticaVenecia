@extends('layouts.panel')

@section('contenido')
@if(session('mensaje'))
      <div class="alert alert-success" style="width:100%;">
        {{session('mensaje')}}
      </div>
    @endif
<div class="container" >
    <div class="row justify-content-center" style="margin-left: 150px;width:900px">
        <div class="col-md-8">
            <div class="card">
            
                <div class="card-header">{{ __('Empleados') }}
                        <a style="color: rgb(255, 255, 255);width: 100px;text-align: center;margin-left: 350px;" onClick="location.href='{{route('crearEmpleadoView')}}'" class="btn btn-primary">
                            {{ __('Añadir') }}
                        </a>
                </div>                
                    <table class="table">
                    <thead  style="background-color: #1166bb;color: #ffff;" >
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Salario</th>                        
                        <th scope="col">Usuario</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($empleados as $row)
                            <tr>
                            <th scope="row">{{$row->id}}</th>
                            <td>{{$row->nombre_empleado}}</td>
                            <td>{{$row->apellido_empleado}}</td>
                            <td>{{$row->salario_base}}</td>
                            <td>{{$row->name}}</td>
                            @can('editar empleado')
                            <td><button name="id" type="submit" value="{{$row->id}}" class="btn btn-primary" onClick="location.href='{{route('editarEmpleadoView',['id'=>$row->id])}}'">Editar</button></td>    
                            @endcan
                            <!--@can('eliminar empleado')
                            <td><button name="id" type="submit" value="{{$row->id}}" class="btn btn-danger" onClick="location.href='{{route('eliminarEmpleadoView',['id'=>$row->id])}}'" onClick="return confirm('¿Esta seguro de que desea desactivar este usuario?')">Eliminar</button></td> 
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