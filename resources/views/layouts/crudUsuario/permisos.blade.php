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
            
                <div class="card-header">{{ __('Usuarios') }}</div>                
                    <table class="table">
                    <thead  style="background-color: #1166bb;color: #ffff;" >
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">nombre</th>
                        <th scope="col">correo</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($users as $row)
                        <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        @can('editar usuario')
                        <td><button name="id" type="submit" value="{{$row->id}}" class="btn btn-primary" onClick="location.href='{{route('editarUsuarioView',['id'=>$row->id])}}'">Editar</button></td>    
                        @endcan
                        @can('eliminar usuario')
                        <td><button name="id" type="submit" value="{{$row->id}}" class="btn btn-danger" onClick="location.href='{{route('desactivarUsuario',['id'=>$row->id])}}'" onClick="return confirm('¿Esta seguro de que desea desactivar este usuario?')">Desactivar</button></td> 
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