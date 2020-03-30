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
          <h1 class="m-0 text-dark">Categorias</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Categorias</li>
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
                        Editar Categoria
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
                        <form action="{{url(route('categoria.update',$categoria->id))}}" method="POST">
                            @method('PUT')
                            @csrf
                          <div class="form-group">
                              <label for="">Nombre Categoria:</label>
                              <input type="text" name="nombreCategoria" value="{{$categoria->nombre_categoria}}" class="form-control" placeholder="Introduzca el nombre de la categoria">
                          </div>
                          <div class="form-group">
                              <label>Color Identificador: <span id="colorPreview" class="pr-5 bg-primary">&nbsp;</span></label>
                              <select class="form-control" name="colorCategoria" id="colorSelector">
                                        @foreach ($colores as $color)
                                            @if($color->id === $categoria->color->id)
                                                <option value="{{$color->id}}" selected="selected" data-color="{{$color->style_color}}">{{$color->nombre_color}}</option>
                                            @else
                                                <option value="{{$color->id}}" data-color="{{$color->style_color}}">{{$color->nombre_color}}</option>
                                            @endif
                                        @endforeach                          
                              </select>
                          </div>
                          <button class="btn btn-success" type="submit"><i class="ion ion-archive"></i>&nbsp; Guardar Cambios</button>
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
<script>
  $('#colorPreview').removeClass();
  $('#colorPreview').addClass(` pr-5 ${$('#colorSelector :selected').data('color')}`);
  $('#colorSelector').change(()=>{
    $('#colorPreview').removeClass();
    $('#colorPreview').addClass(` pr-5 ${$('#colorSelector :selected').data('color')}`);
  });
</script>
@endsection