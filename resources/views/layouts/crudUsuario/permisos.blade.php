@extends('layouts.panel')

@section('contenido')
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
                        <td><button name="id" type="submit" value="{{$row->id}}" class="btn btn-primary" onClick="location.href='{{route('editarUsuarioView',['id'=>$row->id])}}'">Editar</button></td>    
                        <td><button name="id" type="submit" value="{{$row->id}}" class="btn btn-danger">Eliminar</button></td> 
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