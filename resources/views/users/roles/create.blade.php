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
          <h1 class="m-0 text-dark">Roles de Usuarios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Roles de Usuarios</li>
              <li class="breadcrumb-item active">{{$url}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
           <form method="POST" action="{{url("roles")}}">
                @csrf
               <div class="form-group">
                    <label class="form-control-label">Nombre Role:</label>
                    <input type="text" name="nombre_role" placeholder="Introduzca el nombre del role" class="form-control" />
               </div>
                <div class="row mt-3">
                   <h4 class="col-lg-12">Usuarios:</h4>
                   <div class="col-lg-3">
                        <label>Crear: </label><input name="usuarios[]" value="crear" type="checkbox" />
                   </div>
                   <div class="col-lg-3">
                        <label>Modificar :</label><input name="usuarios[]" value="modificar"  type="checkbox" />
                    </div>
                    <div class="col-lg-3">
                        <label>Ver :</label><input name="usuarios[]" value="ver"  type="checkbox" />
                    </div>
                    <div class="col-lg-3">
                        <label>Eliminar :</label><input  name="usuarios[]" value="eliminar" type="checkbox" />
                    </div>
                </div>
                <div class="row mt-3">
                    <h4 class="col-lg-12">Noticias:</h4>
                    <div class="col-lg-3">
                         <label>Crear: </label><input name="noticias[]" value="crear"  type="checkbox" />
                    </div>
                    <div class="col-lg-3">
                         <label>Modificar :</label><input name="noticias[]" value="modificar" type="checkbox" />
                     </div>
                     <div class="col-lg-3">
                         <label>Ver :</label><input name="noticias[]" value="ver" type="checkbox" />
                     </div>
                     <div class="col-lg-3">
                         <label>Eliminar :</label><input name="noticias[]" value="eliminar" type="checkbox" />
                     </div>
                 </div>
                 <div class="row mt-3">
                    <h4 class="col-lg-12">Roles de Usuario:</h4>
                    <div class="col-lg-3">
                         <label>Crear: </label><input name="roles[]" value="crear"  type="checkbox" />
                    </div>
                    <div class="col-lg-3">
                         <label>Modificar :</label><input name="roles[]" value="modificar" type="checkbox" />
                     </div>
                     <div class="col-lg-3">
                         <label>Ver :</label><input name="roles[]" value="ver" type="checkbox" />
                     </div>
                     
                 </div>
                 <div class="row mt-3">
                    <h4 class="col-lg-12">Encuestas:</h4>
                    <div class="col-lg-3">
                         <label>Crear: </label><input name="encuestas[]" value="crear" type="checkbox" />
                    </div>
                    <div class="col-lg-3">
                         <label>Modificar :</label><input name="encuestas[]" value="modificar" type="checkbox" />
                     </div>
                     <div class="col-lg-3">
                         <label>Ver :</label><input name="encuestas[]" value="ver" type="checkbox" />
                     </div>
                     <div class="col-lg-3">
                         <label>Eliminar :</label><input name="encuestas[]" value="eliminar" type="checkbox" />
                     </div>
                 </div>
                 <div class="row mt-3 mb-3">
                    <h4 class="col-lg-12">Lectores:</h4>
                     <div class="col-lg-3">
                         <label>Ver :</label><input name="lectores" value="ver" type="checkbox" />
                     </div>
                 </div>
                 <button type="submit" class="btn btn-success">Guardar</button>
                 <button class="btn btn-primary">Volver</button>
            </form>
        </div>
  </section>
</div>

@endsection

@section('scriptbody')

@endsection