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
                      Nuevo caso de coronavirus
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
                              <option>Nacional</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-5">
                            <label for="nivelRelevancia">Nivel de relevancia:</label>
                            <select id="nivelRelevancia" class="form-control">
                              <option>Urgente</option>
                            </select>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="mb-3">
                      <textarea class="textarea" id="textarea" placeholder="Place some text here"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">Hola a todos</textarea>
                    </div>
                    <p class="text-sm mb-0">
                      <button class="btn btn-success">Guardar Cambios</button>
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
<script src="{{asset('js/summernote-bs4.min.js')}}"></script>
<script>
    $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
@endsection