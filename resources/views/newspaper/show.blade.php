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
                      {{$noticia->titulo_noticia}}
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
                    <div class="mb-2">
                      <form>
                        <div class="row">
                          <div class="form-group col-lg-5">
                            <label for="tipoNoticia">Categoria de la noticia:</label>
                            <select id="tipoNoticia" class="form-control">
                              <option>{{$noticia->categoria->nombre_categoria}}</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-5">
                            <label for="nivelRelevancia">Nivel de relevancia:</label>
                            <select id="nivelRelevancia" class="form-control">
                              <option>{{$noticia->relevancia->nombre_relevancia}}</option>
                            </select>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="mb-3">
                      <div class="form-group">
                          <label>Contenido:</label>
                          <div>{!!trans($noticia->contenido_noticia)!!}</div>
                      </div>
                    </div>
                    <p class="text-sm mb-0">
                      <a href="{{url('post')}}" class="btn btn-success"><i class="ion ion-arrow-left-c"></i> Volver</a>
                    </p>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
        </div>

    </div>
  </section>
@endsection

@section('scriptbody')
@endsection