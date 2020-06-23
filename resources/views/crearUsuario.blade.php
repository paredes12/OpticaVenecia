@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Inicio <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Clientes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Proveedores
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Articulos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Orden de compra
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Venta
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Constancia visual
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Planilla
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Cuadro de envio
            </a>
          </li>
        </ul>

        
      </div>
    </nav> 
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row ">            
        <form class="form-horizontal" style="margin-left: 250px;" action="" method="POST">
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
        <button class="btn btn-success">Register</button>
      </div>
    </div>
  </fieldset>
</form>
        </div>
    </div>
    </main>   
  </div>  
</div>


@endsection