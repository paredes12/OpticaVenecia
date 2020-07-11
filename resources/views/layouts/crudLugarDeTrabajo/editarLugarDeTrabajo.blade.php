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
            <form method="POST"  action="{{route('editarLugarDeTrabajo',['id'=>$lugares->id])}}">
                <div class="card-header">{{ __('Editar Lugar de Trabajo') }}</div>

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
                                <input id="name" type="text" value="{{$lugares->nombre_empresa}}" class="form-control @error('name') is-invalid @enderror" name="nombre_empresa" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Jefe') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{$lugares->jefe_cliente}}" class="form-control @error('name') is-invalid @enderror" name="jefe_cliente" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>


                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{$lugares->telefono_empresa}}" class="form-control @error('name') is-invalid @enderror" name="telefono_empresa" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                        

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{$lugares->cargo_cliente}}" class="form-control @error('name') is-invalid @enderror" name="cargo_cliente" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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