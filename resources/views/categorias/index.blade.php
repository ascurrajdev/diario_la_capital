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
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre Categoria</th>
                        <th>Color de la Categoria</th>
                        <th>Acciones</th>
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
                    <td class="form-group">
                        <label class="bg-danger color-palette pr-5">&nbsp;</label>
                        <select>
                            <option>Primario</option>
                            <option class="bg-success">Exitoso</option>    
                        </select>
                    </td>
                    <td>
                        <form>
                            <div class="form-group">
                                <button class="btn btn-success">Editar</button>
                                <button class="btn btn-danger">Eliminar</button>
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
@endsection