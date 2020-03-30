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
            <a href="{{route("roles.create")}}" class="btn btn-success">Crear nuevo role</a>
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre Role</th>
                        <th>Permisos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Administrador</td>
                        <td>["usuarios":{
                                "crear", "modificar", "eliminar", "ver"
                            }]</td>
                        <td><button class="btn btn-success">Editar</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
@section('scriptbody')
<script src="{{asset('js/app.js')}}"></script>

@endsection