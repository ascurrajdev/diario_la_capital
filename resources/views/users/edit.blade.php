@extends('layouts.app')


@section('styles')
<link rel="stylesheet" href="{{asset('css/summernote-bs4.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0 text-dark">Usuarios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Usuarios</li>
              <li class="breadcrumb-item active">{{$url}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            Editar Usuario
                          </h3>
                          <!-- tools box -->
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                              <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                              <i class="fas fa-times"></i></button>
                          </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" value="{{$usuario->name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" value="{{$usuario->email}}" class="form-control"/>
                            </div>
                            <button class="btn btn-success" type="submit"><i class="ion ion-archive"></i>&nbsp; Guardar Cambios</button>
                            <a href="{{route('usuarios.index')}}" class="btn btn-primary"><i class="ion ion-arrow-left-c"></i> Volver</a>
                        </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
  </section>
</div>

@endsection

@section('scriptbody')

@endsection