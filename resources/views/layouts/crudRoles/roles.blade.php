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
            
                    <div class="card-header">{{ __('Roles') }}
                        <a style="color: rgb(255, 255, 255);width: 100px;text-align: right;margin-left: 340px;" onClick="location.href='{{route('crearRolView')}}'" class="btn btn-primary">
                            {{ __('Agregar rol') }}
                        </a> 
                    </div>                                                           
                    <table class="table">
                    <thead  style="background-color: #1166bb;color: #ffff;" >
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">nombre</th>                        
                        
                        <th style="text-align:left;" scope="col">
                              
                        </th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($roles as $row)
                        <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{$row->name}}</td>                        
                        <td><button name="id" type="submit" value="{{$row->id}}" class="btn btn-primary" onClick="location.href='{{route('editarRolesView',['id'=>$row->id])}}'">Editar</button></td>    
                        <td><button name="id" type="submit" value="{{$row->id}}" class="btn btn-danger" onClick="location.href='{{route('eliminarRole',['id'=>$row->id])}}'" onClick="return confirm('¿Esta seguro de que desea desactivar este usuario?')">Eliminar</button></td> 
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