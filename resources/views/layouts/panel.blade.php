@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="position:relative; top:0; left:0;">
      <div class="sidebar-sticky pt-3" style="margin-top: 40px;border-right: 3px solid #ddd; ">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
              <span data-feather="home"></span>
              Inicio <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <svg xmlns="http://www.w3.org/2000/svg" style="margin-left:17px" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
              <a href="#clienteSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" >Clientes</a>
                    
                    <ul class="collapse list-unstyled" id="clienteSubMenu">
                        <li>
                            <a href="{{route('clientes')}}" style="margin-left: 60px;">Buscar</a>
                        </li>
                        <li>
                            <a href="{{route('crearClienteView')}}" style="margin-left: 60px;">Crear</a>
                        </li>                      
                    </ul>
            </a>
          </li>
          <li class="nav-item">
            <svg xmlns="http://www.w3.org/2000/svg" style="margin-left:17px" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
              <a href="#proveedoresSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" >Proveedores</a>     
                    <ul class="collapse list-unstyled" id="proveedoresSubMenu">
                        <li>
                            <a href="{{route('proveedores')}}" style="margin-left: 60px;">Buscar</a>
                        </li>
                        <li>
                            <a href="{{route('crearProveedorView')}}" style="margin-left: 60px;">Crear</a>
                        </li>                      
                    </ul>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
              <span data-feather="users"></span>
              Articulos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
              <span data-feather="bar-chart-2"></span>
              Orden de compra
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
              <span data-feather="layers"></span>
              Venta
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 64 64" aria-labelledby="title"
              aria-describedby="desc" role="img" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>Glasses</title>
                <desc>A line styled icon from Orion Icon Library.</desc>
                <path data-name="layer2"
                d="M4.4 33.4L4 34S2.6 52 16 52s12-16 12-16m31.7-2.6l.4.6s1.4 18-12 18-12-16-12-16"
                fill="none" stroke="#202020" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2"></path>
                <path data-name="layer1" d="M26.1 18c0-4.7-3.1-7.6-6.6-5s-13 17.2-15 20.4M38.1 18c0-4.7 3.1-7.6 6.6-5s13 17.3 15 20.4"
                fill="none" stroke="#202020" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2"></path>
                <path data-name="layer1" d="M62 34.5S48 26 36 36h-8C16.1 26 2.1 34.5 2.1 34.5"
                fill="none" stroke="#202020" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2"></path>
            </svg>
              <span data-feather="layers"></span>
              Constancia visual
            </a>
          </li>
          <li class="nav-item">
          <svg style="margin-left:17px;" width="18" height="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" aria-labelledby="title"
            aria-describedby="desc" role="img" xmlns:xlink="http://www.w3.org/1999/xlink">    
            <ellipse data-name="layer2"
            cx="44" cy="7.1" rx="18" ry="5.1" fill="none" stroke="#202020" stroke-miterlimit="10"
            stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></ellipse>
            <path data-name="layer2" d="M26 14.9c0 2.8 8.1 5.1 18 5.1s18-2.3 18-5.1m-36 8c0 2.8 8.1 5.1 18 5.1s18-2.3 18-5.1m-36 8c0 2.8 8.1 5.1 18 5.1s18-2.3 18-5.1M38 43.7c1.9.2 3.9.3 6 .3 9.9 0 18-2.3 18-5.1m-36-2.8V7.5"
            fill="none" stroke="#202020" stroke-miterlimit="10" stroke-width="2" stroke-linejoin="round"
            stroke-linecap="round"></path>
            <path data-name="layer2" d="M62 7.1v39.8c0 2.8-8.1 5.1-18 5.1-2.1 0-4.1-.1-6-.3"
            fill="none" stroke="#202020" stroke-miterlimit="10" stroke-width="2" stroke-linejoin="round"
            stroke-linecap="round"></path>
            <ellipse data-name="layer1" cx="20" cy="40.9" rx="18" ry="5.1"
            fill="none" stroke="#202020" stroke-miterlimit="10" stroke-width="2" stroke-linejoin="round"
            stroke-linecap="round"></ellipse>
            <path data-name="layer1" d="M2 48.9c0 2.8 8 5.1 18 5.1s18-2.3 18-5.1"
            fill="none" stroke="#202020" stroke-miterlimit="10" stroke-width="2" stroke-linejoin="round"
            stroke-linecap="round"></path>
            <path data-name="layer1" d="M38 40.9v16c0 2.8-8.1 5.1-18 5.1S2 59.7 2 56.9V41.3"
            fill="none" stroke="#202020" stroke-miterlimit="10" stroke-width="2" stroke-linejoin="round"
            stroke-linecap="round"></path>
          </svg>
                    <a href="#planillaSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="margin-left: 2px;">Pago</a>
                    
                    <ul class="collapse list-unstyled" id="planillaSubMenu">
                        <li>
                            <a href="{{route('empleados')}}" style="margin-left: 60px;">Empleados</a>
                        </li>
                        <li>
                            <a href="{{route('planilla')}}" style="margin-left: 60px;">Planilla</a>
                        </li>
                        <li>
                            <a href="#" style="margin-left: 60px;">Comision</a>
                        </li>                        
                    </ul>
                </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
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
