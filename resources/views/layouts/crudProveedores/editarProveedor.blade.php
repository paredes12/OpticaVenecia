@extends('layouts.panel')

@section('contenido')

@if(session('mensaje'))
      <div class="alert alert-success" style="width:100%;">
        {{session('mensaje')}}
      </div>
    @endif
<div class="container" >
    <div class="row justify-content-center" style="margin-left: 150px;width:900px">
        <div class="col-md-10">
            <div class="card">
            <form method="POST"  action="{{route('editarProveedor',['id'=>$proveedores->id])}}">
                <div class="card-header">{{ __('Editar Proveedor') }}</div>

                  <div class="card-body">                    
                        @csrf
                        @if(session('mensaje'))
                          <div class="alert alert-success">
                            {{session('mensaje')}}
                          </div>
                        @endif
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Proveedor') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{$proveedores->proveedor}}" class="form-control @error('name') is-invalid @enderror" name="proveedor" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Registro') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{$proveedores->registro_proveedor}}" class="form-control @error('name') is-invalid @enderror" name="registro_proveedor" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{$proveedores->correo_proveedor}}" class="form-control @error('name') is-invalid @enderror" name="correo_proveedor" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{$proveedores->direccion_proveedor}}" class="form-control @error('name') is-invalid @enderror" name="direccion_proveedor" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Paises') }}</label>

                            <div class="col-md-6">                             
                            <div class="form-group">                              
                              <select class="form-control" name="pais_id" id="exampleFormControlSelect2">
                                @foreach($paises as $row)
                                  <option value="{{$row->id}}">{{$row->nombre_pais}}</option>
                                @endforeach
                              </select>
                              <div>
                              <a href="{{ route('paises') }}">Añadir Un País</a>
                            </div>
                              <div>
                            </div>                
                                           
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a style="color:#ffff;" onclick="goBack()" class="btn btn-danger">
                                    {{ __('Cancelar') }}
                                </a>
                                <script>
                                function goBack() {
                                  window.history.back();
                                }
                                </script>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>                                
                            </div>  
                        </div>
                    
                </div>
            </form>
            </div>


        </div>
    </div>
</div>

@endsection