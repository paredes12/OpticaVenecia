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
                <div class="card-header">{{ __('Crear rol') }}</div>

                <div class="card-body">
                    <form method="POST"  action="{{ route('crearRole') }}">
                        @csrf
                        @if(session('mensaje'))
                          <div class="alert alert-success">
                            {{session('mensaje')}}
                          </div>
                        @endif
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                                                                                         
                        <div class="form-group row">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>
                          <div class="col-md-6">                             
                          <div class="form-group">                              
                            <select multiple class="form-control" name="permission_id[]" id="exampleFormControlSelect2">  
                                @foreach($permissions as $row)
                                  <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                              </select>
                              <div>
                              <a href="{{ route('adminPermisos') }}">Administrar permisos</a>
                            </div>
                          </div>
                          </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a style="color:#ffff;" onclick="goBack()" class="btn btn-danger">
                                    {{ __('Cancelar') }}
                                </a>
                                <script>
                                function goBack() {
                                  window.history.back();
                                }
                                </script>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>                                
                            </div>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection