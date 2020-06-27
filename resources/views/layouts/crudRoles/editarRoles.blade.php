@extends('layouts.panel')

@section('contenido')
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
                                <a type="submit"  href="#agregarPermiso" data-toggle="modal">
                                        {{ __('Agregar permisos') }}
                                </a>  
                            </div>                            
                                <div class="modal fade" id="agregarPermiso">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Agregar permisos</h4>
                                                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                                            
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">   
                                                                        
                                                    <select multiple class="form-control" name="permission_id[]" id="exampleFormControlSelect2">
                                                    
                                                    @foreach($allPermission as $row)
                                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                                    </select>   
                                                                                                                                            
                                                </div>                                                                                        
                                            </div>
                                            <div class="modal-footer">
                                                <a  data-dismiss="modal" class="btn btn-danger" style="color:#ffff;">
                                                    {{ __('Cancelar') }}
                                                </a> 
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Agregar') }}
                                                </button> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        @if(!($permisos=='[]'))
                        <div class="form-group row">
                        
                            <table class="table table-bordered" style="width:50%;margin-left:125px;">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">name</th>
                                        <th scope="col"></th>                                
                                    </tr>
                                </thead>
                                    <tbody>
                                    
                                        <!--<th scope="row">1</th>-->
                                        @foreach($permisos as $row)
                                        <tr>
                                            <td>{{$row->id}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>
                                                <a style="color:#ffff;" name="id" value="{{$row->id}}" class="btn btn-danger" onClick="location.href='{{route('eliminarPermiso',['role_id'=>$rol->id,'permission_id'=>$row->id])}}'" onClick="return confirm('¿Esta seguro de que desea desactivar este usuario?')">
                                                Eliminar
                                                </a>
                                            </td>
                                        </tr> 
                                        @endforeach
                                                                                                            
                                    </tbody>
                            </table>                                                      
                        </div>
                        @endif                                                                                           
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4" style="margin-left:350px;">
                                <a style="color:#ffff;" href="{{route('adminRoles')}}" class="btn btn-danger">
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
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
