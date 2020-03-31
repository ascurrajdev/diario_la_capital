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
            <a href="{{url('categoria/create')}}" class="{{(collect(Auth::user()->role->json_role["permisos"]["noticias"]))->search("crear")>-1  ? '': 'd-none' }} btn bg-gradient-success mb-2"><span class="ion ion-plus"></span>&nbsp;Nueva Categoria</a><br/>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre Categoria</th>
                        <th>Color de la Categoria</th>
                        <th class="{{(collect(Auth::user()->role->json_role["permisos"]["noticias"]))->search("modificar")>-1  ? '': 'd-none' }}">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $contador = 1;
                    @endphp
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{$contador++}}</td>
                    <td>{{$categoria->nombre_categoria}}</td>
                    <td>
                        <label id="previewColor" class="{{$categoria->color->style_color}} color-palette pr-5">&nbsp;</label>
                        <label>{{$categoria->color->nombre_color}}</label>
                    </td>
                    <td>
                        <form>
                            <div class="form-group">
                                <a href="{{url('categoria/'.$categoria->id.'/edit')}}" class="{{(collect(Auth::user()->role->json_role["permisos"]["noticias"]))->search("modificar")>-1  ? '': 'd-none' }} btn btn-success">Editar</a>
                                <!--<button class="btn btn-danger">Eliminar</button>-->
                            </div>
                        </form>
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
<script>
    /*let arrayColores = {1:"bg-primary", 2:"bg-secondary", 3:"bg-warning", 4:"bg-success", 5:"bg-danger", 6:"bg-info"}; 
    $('#previewColor').removeClass();
    $('#previewColor').addClass(`${arrayColores[($('#paletaOpcion').val())]} pr-5`);
    $('#paletaOpcion').change(function(e){
        $('#previewColor').removeClass();
        $('#previewColor').addClass(`${arrayColores[(e.target.value)]} pr-5`);
    });*/
</script>
@endsection