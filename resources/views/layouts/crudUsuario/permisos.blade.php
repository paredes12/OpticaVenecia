@extends('layouts.panel')

@section('contenido')
<div class="container" >
    <div class="row justify-content-center" style="margin-left: 150px;width:900px">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear usuario') }}</div>
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($users as $row)
                        <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
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