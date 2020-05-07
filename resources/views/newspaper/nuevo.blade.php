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
        <form method="POST" action="{{url('post')}}" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-outline card-info">
                  <div class="card-header">
                    <h3 class="card-title">
                      Nueva noticia
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
                     
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label for="titulo">Titulo de la noticia</label>
                                <input type="text" name="titulo" class="form-control" placeholder="Introduzca un titulo" required="true"/>
                            </div>
                          <div class="form-group col-lg-5">
                            <label for="tipoNoticia">Categoria de la noticia:</label>
                            <select id="tipoNoticia" name="categoria" required="true" class="form-control">
                              @foreach ($categorias as $categoria)
                                <option value="{{$categoria['id']}}">{{$categoria['nombre_categoria']}}</option>
                              @endforeach
                            </select>
                          </div>

                          <div class="form-group col-lg-5">
                            <label for="nivelRelevancia">Nivel de relevancia:</label>
                            <select id="nivelRelevancia" name="relevancia" required="true" class="form-control">
                              @foreach ($relevancias as $relevancia)
                                <option value="{{$relevancia['id']}}">{{$relevancia['nombre_relevancia']}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      
                    </div>
                    <div class="mb-3">
                      <label for="textarea1">Introduccion de la noticia:</label>
                    <textarea name="introduccion" required="true" class="textarea" id="textarea1" placeholder="Place some text here"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">Hola a todos</textarea>
                  </div>
                    <div class="mb-3">
                      <label for="archivo">Material de la noticia (Imagenes)</label><br/>
                      <input type="file" id="archivo" name="materiales[]" accept="image/*" multiple/>
                    </div>
                    <div class="mb-3">
                        <label for="textarea">Contenido:</label>
                      <textarea name="contenido" required="true" class="textarea" id="textarea" placeholder="Place some text here"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">Hola a todos</textarea>
                    </div>
                    <p class="text-sm mb-0">
                      <button type="submit" class="btn btn-success">
                        <i class="ion ion-archive"></i>&nbsp;  
                        Guardar</button>
                    </p>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
        </div>

        </div>
    </form>
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