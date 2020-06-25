@extends('layouts.panel')

@section('contenido')


<div class="container" >
    <div class="row justify-content-center" style="margin-left: 150px;width:900px">
        <div class="col-md-8">
            <div class="card">
            <form method="POST"  action="{{route('editarUsuario',['id'=>$usuario->id])}}">
                <div class="card-header">{{ __('Editar usuario') }}</div>

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
                                <input id="name" type="text" value="{{$usuario->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" value="{{$usuario->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
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
                              <select class="form-control" name="role_id" id="exampleFormControlSelect2">
                                @foreach($roles as $row)
                                  <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                              </select>
                              <div>
                              <a href="{{ route('adminRoles') }}">Administrar rol</a>
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
