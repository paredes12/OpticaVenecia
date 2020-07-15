@extends('layouts.panel')

@section('contenido')

<div class="container" >
    <div class="row justify-content-center" style="margin-left: 150px;width:1100px">
        <div class="col-md-8">
            <div class="card">
            @if(session('mensaje'))
                <div class="alert alert-success" style="margin-left: width:100%;">
                    {{session('mensaje')}}
                </div>
            @endif
            <div class="card-header">{{ __('Paises') }}
                        <a style="color: rgb(255, 255, 255);width: 100px;text-align: center;margin-left: 400px;" onClick="location.href='{{route('crearPaisView')}}'" class="btn btn-primary">
                            {{ __('Añadir') }}
                        </a> 
                    </div>
                              
                    <table class="table">
                    <thead  style="background-color: #1166bb;color: #ffff;" >
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nombre</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($paises as $row)
                            <tr>
                            <th scope="row">{{$row->id}}</th>
                            <td>{{$row->nombre_pais}}</td>
                            @can('editar pais')
                            <td><button name="id" style="margin-left:270px" type="submit" value="{{$row->id}}" onClick="location.href='{{route('editarPaisView',['id'=>$row->id])}}'" class="btn btn-primary" >Editar</button></td>    
                            @endcan
                            <!--@can('eliminar pais')
                            <td><button name="id" type="submit" value="{{$row->id}}" class="btn btn-danger" onClick="location.href='{{route('eliminarPaisView',['id'=>$row->id])}}'" onClick="return confirm('¿Esta seguro de que desea eliminar este país?')">Eliminar</button></td> 
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