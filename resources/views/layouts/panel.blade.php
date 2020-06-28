@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="position:relative; top:0; left:0;">
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
                    <a href="#planillaSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="margin-left: 17px;">Pago</a>
                    <ul class="collapse list-unstyled" id="planillaSubMenu">
                        <li>
                            <a href="#" style="margin-left: 60px;">Planilla</a>
                        </li>
                        <li>
                            <a href="#" style="margin-left: 60px;">Comision</a>
                        </li>                        
                    </ul>
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
    <div>
      <main role="main" >
        @yield('contenido')
      </main>
    </div>  
  </div>
</div>
@endsection
