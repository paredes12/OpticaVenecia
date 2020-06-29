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
            <form method="POST"  action="{{route('editarEmpleado',['id'=>$empleado->id])}}">
                <div class="card-header">{{ __('Editar empleado') }}</div>

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
                                <input id="name" type="text" value="{{$empleado->nombre_empleado}}" class="form-control @error('name') is-invalid @enderror" name="nombre_empleado" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{$empleado->apellido_empleado}}" class="form-control @error('name') is-invalid @enderror" name="apellido_empleado" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Salario base') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{$empleado->salario_base}}" class="form-control @error('name') is-invalid @enderror" name="salario_base" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                  
                                           
                        <div class="form-group row">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Usuarios') }}</label>
                          <div class="col-md-6">                             
                          <div class="form-group">                              
                              <select class="form-control" name="user_id" id="exampleFormControlSelect2">
                                @foreach($usuarios as $row)
                                  @if($empleado->user_id==$row->id)
                                  <option selected value="{{$row->id}}">{{$row->name}}</option>
                                  @else
                                  <option value="{{$row->id}}">{{$row->name}}</option>
                                  @endif                                  
                                @endforeach
                              </select>
                              <div>                              
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
