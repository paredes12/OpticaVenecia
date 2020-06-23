@extends('layouts.panel')

@section('contenido')


    <div class="container">
        <div class="row ">            
        <form class="form-horizontal" style="margin-left: 150px;width:600px" action="" method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Registro de usuario</legend>
    </div>

    <div class="control-group">
      <!-- Username -->
      <label class="control-label" for="username">Usuario</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="" class="input-xlarge form-control">        
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge form-control">        
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Contraseña</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge form-control">
        <p class="help-block">La contraseña debe tener al menos x caracteres</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label" for="password_confirm">Contraseña (Confirmación)</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge form-control">
        <p class="help-block">Porfavor confirme la contraseña</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Registrar</button>
      </div>
    </div>
  </fieldset>
</form>
        </div>
    </div>
    


@endsection