@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0 text-dark">{{$url}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$url}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <a href="{{url('usuarios/create')}}" class=" {{(collect(Auth::user()->role->json_role["permisos"]["usuarios"]))->search("crear")>-1  ? '': 'd-none' }} btn bg-gradient-success mb-2"><span class="ion ion-person-add"></span>&nbsp;Nuevo Usuario</a><br/>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre Usuario</th>
                        <th>Email Usuario</th>
                        <th>Contraseña</th>
                        <th>Role</th>
                        <th class="{{(collect(Auth::user()->role->json_role["permisos"]["noticias"]))->search("ver")>-1  ? '': 'd-none' }}">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $contador = 1;
                    @endphp
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{$contador++}}</td>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->password}}</td>
                            <td>{{$usuario->role->nombre_role}}</td>
                            <td>
                                <a href="{{route('usuarios.edit', $usuario->id)}}" class="{{(collect(Auth::user()->role->json_role["permisos"]["noticias"]))->search("modificar")>-1  ? '': 'd-none' }} btn btn-success"><span class="ion ion-edit"></span>&nbsp;Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
        </div>
    </div>
    </section>
@endsection
@section('scriptbody')
<script src="{{asset('js/app.js')}}"></script>

@endsection