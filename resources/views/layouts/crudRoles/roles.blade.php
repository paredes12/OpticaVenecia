@extends('layouts.panel')

@section('contenido')

<div class="container" >
    <div class="row justify-content-center" style="margin-left: 150px;width:900px">
        <div class="col-md-8">
            <div class="card">
            
            <div class="card-header">{{ __('Roles') }}
                    
                </div>                                 
                    <table class="table">
                    <thead  style="background-color: #1166bb;color: #ffff;" >
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">nombre</th>                        
                        <th scope="col"></th>
                        <th style="text-align:left;" scope="col">
                            <div  class="col-md-6 offset-md-4">
                                <a style="color:#ffff;" onClick="location.href='{{route('crearRolView')}}'" class="btn btn-primary">
                                    {{ __('+') }}
                                </a>        
                            </div>  
                        </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($roles as $row)
                        <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{$row->name}}</td>                        
                        <td><button name="id" type="submit" value="{{$row->id}}" class="btn btn-primary" onClick="location.href='{{route('editarRolesView',['id'=>$row->id])}}'">Editar</button></td>    
                        <td><button name="id" type="submit" value="{{$row->id}}" class="btn btn-danger" onClick="location.href='{{route('eliminarRole',['id'=>$row->id])}}'" onClick="return confirm('¿Esta seguro de que desea desactivar este usuario?')">Desactivar</button></td> 
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