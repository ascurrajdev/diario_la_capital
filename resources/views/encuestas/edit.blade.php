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
          <h1 class="m-0 text-dark">Noticias</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Noticias</li>
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
                <div class="card card-outline card-info">
                  <div class="card-header">
                    <h3 class="card-title">
                        Encuesta Nº {{$encuesta->id}}
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
                    <!-- /. tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body pad">
                    <form method="POST" action="{{url("encuestas/".$encuesta->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Contenido: </label>
                        <textarea class="form-control" name="contenido">{{$encuesta->contenido}}</textarea>
                    </div>   
                    <p class="text-sm mb-0">
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </p>
                </form>
                  </div>
              </div>
              <!-- /.col-->
            </div>
        </div>
    </div>
  </section>
</div>
@endsection

@section('scriptbody')

@endsection