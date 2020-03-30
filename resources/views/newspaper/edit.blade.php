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
                <form method="POST" action="{{url('post/'.$noticia->id)}}">
                  @method('PUT')
                  @csrf
                <div class="card card-outline card-info">
                  <div class="card-header">
                    
                    <input type="text" class="card-title" name="tituloNoticia" value="{{$noticia->titulo_noticia}}">
                      
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
                          <div class="form-group col-lg-5">
                            <label for="tipoNoticia">Categoria de la noticia:</label>
                            <select id="tipoNoticia" name="categoriaNoticia" class="form-control">
                              @foreach($categorias as $categoria)
                                @if($categoria->id === $noticia->categoria->id)
                                  <option value="{{$categoria->id}}" selected="selected">{{$categoria->nombre_categoria}}</option>
                                @else
                                  <option value="{{$categoria->id}}">{{$categoria->nombre_categoria}}</option>
                                @endif
                              @endforeach
                            </select>
                          </div>

                          <div class="form-group col-lg-5">
                            <label for="nivelRelevancia">Nivel de relevancia:</label>
                            <select id="nivelRelevancia" name="nivelRelevancia" class="form-control">
                              @foreach($relevancias as $relevancia)
                                @if($relevancia->id === $noticia->relevancia->id)
                                  <option value="{{$relevancia->id}}" selected="selected">{{$relevancia->nombre_relevancia}}</option>
                                @else
                                  <option value="{{$relevancia->id}}">{{$relevancia->nombre_relevancia}}</option>
                                @endif
                              @endforeach
                            </select>
                          </div>
                        </div>
                      
                    </div>
                    <div class="mb-3">
                      <textarea name="contenidoNoticia" class="textarea" id="textarea" placeholder="Place some text here"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$noticia->contenido_noticia}}</textarea>
                    </div>
                    <p class="text-sm mb-0">
                      <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </p>
                  </form>
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