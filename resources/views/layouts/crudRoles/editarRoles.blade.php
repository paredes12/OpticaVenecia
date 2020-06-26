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
                <form method="POST"  action="{{route('editarRol',['id'=>$rol->id])}}">
                    <div class="card-header">{{ __('Editar rol') }}</div>
                        <div class="card-body">                    
                            @csrf
                            @if(session('mensaje'))
                            <div class="alert alert-success">
                                {{session('mensaje')}}
                        </div>
                            @endif
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="name" style="width:50%;" type="text" value="{{$rol->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('permiso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <a type="submit"  href="">
                                        {{ __('Agregar permisos') }}
                                </a>  
                            </div>
                            
                        </div>

                        <div class="form-group row">
                        <table class="table" style="width:50%;margin-left:185px;">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">name</th>
                                    <th scope="col"></th>                                
                                </tr>
                            </thead>
                                <tbody>
                                    <tr>
                                    <!--<th scope="row">1</th>-->
                                    @foreach($permisos as $row)
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->name}}</td>
                                        <td><button name="id" type="submit" value="{{$row->id}}" class="btn btn-danger" onClick="location.href='{{route('desactivarUsuario',['id'=>$row->id])}}'" onClick="return confirm('¿Esta seguro de que desea desactivar este usuario?')">Eliminar</button></td>
                                    @endforeach
                                    </tr>                                    
                                </tbody>
                            </table>
                        </div>                                                                                           
                        <!--<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a style="color:#ffff;" onclick="goBack()" class="btn btn-danger">
                                    {{ __('Cancelar') }}
                                </a>
                                <script>
                                    function goBack() {
                                    window.history.back();
                                    }
                                </script>                                                              
                        </div>-->                    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
