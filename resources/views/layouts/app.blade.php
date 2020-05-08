<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}" />
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    @yield('styles')
  </head>
<body class="hold-transition sidebar-mini">
      <div class="wrapper" id="app">
        @guest
        @else

                        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                            <!-- Left navbar links -->
                            <ul class="navbar-nav">
                              <li class="nav-item">
                                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                              </li>

                            </ul>

                            <!-- SEARCH FORM -->


                            <!-- Right navbar links -->
                            <ul class="navbar-nav ml-auto">
                              <!-- Messages Dropdown Menu -->

                              <!-- Notifications Dropdown Menu -->
                              
                              <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                            </ul>
                          </nav>
                          <!-- /.navbar -->

                          <!-- Main Sidebar Container -->
                          <aside class="main-sidebar sidebar-dark-primary elevation-4">
                            <!-- Brand Logo -->
                            <a href="{{route("Dashboard")}}" class="brand-link">
                              <img src="{{asset('storage/img/admin.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                                   style="opacity: .8">
                              <span class="brand-text font-weight-light">Admin</span>
                            </a>

                            <!-- Sidebar -->
                            <div class="sidebar">
                              <!-- Sidebar user panel (optional) -->
                              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                <div class="image">
                                  <img src="{{asset('storage/img/user1.jpg')}}" class="img-circle elevation-2" alt="User Image">
                                </div>
                                <div class="info">
                                  <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                                </div>
                              </div>

                              <!-- Sidebar Menu -->
                              <nav class="mt-2">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                  <!-- Add icons to the links using the .nav-icon class
                                       with font-awesome or any other icon font library -->
                                  <li class="nav-item ">
                                    <a href="{{url('/home')}}" class="nav-link">
                                      <i class="nav-icon fas fa-tachometer-alt"></i>
                                      <p>
                                        Dashboard
                                      </p>
                                    </a>
                                  </li>
                                  <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link {{(collect(Auth::user()->role->json_role['permisos']['noticias']))->search('ver')>-1  ? '': 'd-none' }}">
                                      <i class="nav-icon ion ion-ios-paper"></i>
                                      <p>
                                         Noticias
                                         <i class="right fas fa-angle-left"></i>
                                      </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                      <li class="nav-item">
                                        <a class="nav-link" href="{{url("categoria")}}">
                                          <i class="ion nav-icon ion-ios-list"></i>
                                          Categorias</a></li>
                                      <li class="nav-item">
                                        <a class="nav-link" href="{{url("post")}}">
                                          <i class="ion nav-icon ion-ios-list"></i>
                                          Todas las noticias</a></li>
                                    </ul>
                                  </li>
                                  <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link {{(collect(Auth::user()->role->json_role["permisos"]["usuarios"]))->search("ver")>-1  ? '': 'd-none' }}">
                                      <i class="nav-icon ion ion-person"></i>
                                      <p>
                                         Usuarios
                                         <i class="right fas fa-angle-left"></i>
                                      </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                      <li class="nav-item">
                                        <a class="nav-link {{(collect(Auth::user()->role->json_role["permisos"]["roles"]))->search("ver")>-1  ? '': 'd-none' }}" href="{{url("roles")}}">
                                          <i class="ion nav-icon ion-ios-list"></i>
                                          Permisos</a></li>
                                      <li class="nav-item">
                                        <a class="nav-link" href="{{url("usuarios")}}">
                                          <i class="ion nav-icon ion-person-stalker"></i>
                                          Todos los usuarios</a></li>
                                    </ul>
                                  </li>
                                  <li class="nav-item">
                                    <a href="{{route("encuestas.index")}}" class="nav-link">
                                      <i class="ion nav-icon ion-stats-bars"></i>
                                      Encuestas
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a href="{{route("visitas.index")}}" class="nav-link">
                                      <i class="ion nav-icon ion-pie-graph"></i>
                                      Estadisticas Generales
                                    </a>
                                  </li>
                                </ul>
                              </nav>
                              <!-- /.sidebar-menu -->
                            </div>
                            <!-- /.sidebar -->
                          </aside>

        @endguest

            @yield('content')
            <footer class="main-footer">
              <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0
              </div>
              <strong>Copyright &copy; 2020 Dev.Jose Ascura</strong> All rights
              reserved.
            </footer>
          </div>
    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/adminlte.min.js')}}"></script>
    @yield('scriptbody')
</body>
</html>
