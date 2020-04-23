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
            <a href="{{route("roles.create")}}" class="{{(collect(Auth::user()->role->json_role["permisos"]["roles"]))->search("crear")>-1  ? '': 'd-none' }} btn btn-success">Crear nuevo role <i class="ion ion-plus"></i></a>
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Permisos</th>
                        <th class="{{(collect(Auth::user()->role->json_role["permisos"]["roles"]))->search("modificar")>-1  ? '': 'd-none' }}">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                      <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->nombre_role}}</td>
                        <td>{{collect($role->json_role)}}</td>
                        <td><a href="{{route("roles.edit",$role->id)}}" class="{{(collect(Auth::user()->role->json_role["permisos"]["roles"]))->search("modificar")>-1  ? '': 'd-none' }} btn btn-success">Editar <i class="ion ion-edit"></i></a></td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
@section('scriptbody')
<script src="{{asset('js/app.js')}}"></script>

@endsection