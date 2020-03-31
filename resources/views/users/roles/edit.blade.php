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
                            Editar Roles de usuario
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
                        <form method="POST" action="{{url("roles/".$role->id)}}">
                          @method('PUT')
                          @csrf
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" name="nombre_role" value="{{$role->nombre_role}}" class="form-control">
                            </div>
                            <div class="row mt-3">
                              <h4 class="col-lg-12">Usuarios:</h4>
                              <div class="col-lg-3">
                                   <label>Crear: </label><input name="usuarios[]" {{(collect($role->json_role["permisos"]["usuarios"]))->search("crear")>-1  ? 'checked': '' }} value="crear" type="checkbox" />
                              </div>
                              <div class="col-lg-3">
                                   <label>Modificar :</label><input name="usuarios[]" {{(collect($role->json_role["permisos"]["usuarios"]))->search("modificar")>-1  ? 'checked': '' }} value="modificar"  type="checkbox" />
                               </div>
                               <div class="col-lg-3">
                                   <label>Ver :</label><input name="usuarios[]" {{(collect($role->json_role["permisos"]["usuarios"]))->search("ver")>-1  ? 'checked': '' }} value="ver"  type="checkbox" />
                               </div>
                               <div class="col-lg-3">
                                   <label>Eliminar :</label><input  name="usuarios[]" {{(collect($role->json_role["permisos"]["usuarios"]))->search("eliminar")>-1  ? 'checked': '' }} value="eliminar" type="checkbox" />
                               </div>
                           </div>
                           <div class="row mt-3">
                               <h4 class="col-lg-12">Noticias:</h4>
                               <div class="col-lg-3">
                                    <label>Crear: </label><input name="noticias[]" {{(collect($role->json_role["permisos"]["noticias"]))->search("crear")>-1  ? 'checked': '' }} value="crear"  type="checkbox" />
                               </div>
                               <div class="col-lg-3">
                                    <label>Modificar :</label><input name="noticias[]" {{(collect($role->json_role["permisos"]["noticias"]))->search("modificar")>-1  ? 'checked': '' }} value="modificar" type="checkbox" />
                                </div>
                                <div class="col-lg-3">
                                    <label>Ver :</label><input name="noticias[]" {{(collect($role->json_role["permisos"]["noticias"]))->search("ver")>-1  ? 'checked': '' }} value="ver" type="checkbox" />
                                </div>
                                <div class="col-lg-3">
                                    <label>Eliminar :</label><input name="noticias[]" {{(collect($role->json_role["permisos"]["noticias"]))->search("eliminar")>-1  ? 'checked': '' }} value="eliminar" type="checkbox" />
                                </div>
                            </div>
                            <div class="row mt-3">
                               <h4 class="col-lg-12">Roles de Usuario:</h4>
                               <div class="col-lg-3">
                                    <label>Crear: </label><input name="roles[]" value="crear" {{(collect($role->json_role["permisos"]["roles"]))->search("crear")>-1  ? 'checked': '' }} type="checkbox" />
                               </div>
                               <div class="col-lg-3">
                                    <label>Modificar :</label><input name="roles[]" value="modificar" {{(collect($role->json_role["permisos"]["roles"]))->search("modificar")>-1  ? 'checked': '' }} type="checkbox" />
                                </div>
                                <div class="col-lg-3">
                                    <label>Ver :</label><input name="roles[]" {{(collect($role->json_role["permisos"]["roles"]))->search("ver")>-1  ? 'checked': '' }} value="ver" type="checkbox" />
                                </div>
                                
                            </div>
                            <div class="row mt-3">
                               <h4 class="col-lg-12">Encuestas:</h4>
                               <div class="col-lg-3">
                                    <label>Crear: </label><input name="encuestas[]" {{(collect($role->json_role["permisos"]["encuestas"]))->search("crear")>-1 ? 'checked': '' }} value="crear" type="checkbox" />
                               </div>
                               <div class="col-lg-3">
                                    <label>Modificar :</label><input name="encuestas[]" {{(collect($role->json_role["permisos"]["encuestas"]))->search("modificar")>-1  ? 'checked': '' }} value="modificar" type="checkbox" />
                                </div>
                                <div class="col-lg-3">
                                    <label>Ver :</label><input name="encuestas[]" {{(collect($role->json_role["permisos"]["encuestas"]))->search("ver")>-1  ? 'checked': '' }} value="ver" type="checkbox" />
                                </div>
                                <div class="col-lg-3">
                                    <label>Eliminar :</label><input name="encuestas[]" {{(collect($role->json_role["permisos"]["encuestas"]))->search("eliminar")>-1  ? 'checked': '' }} value="eliminar" type="checkbox" />
                                </div>
                            </div>
                            <div class="row mt-3 mb-3">
                               <h4 class="col-lg-12">Lectores:</h4>
                                <div class="col-lg-3">
                                    <label>Ver :</label><input name="lectores" {{(collect($role->json_role["permisos"]["lectores"]))->search("ver")>-1  ? 'checked': '' }} value="ver" type="checkbox" />
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit"><i class="ion ion-archive"></i>&nbsp; Guardar Cambios</button>
                            <a href="{{route('roles.index')}}" class="btn btn-primary"><i class="ion ion-arrow-left-c"></i> Volver</a>
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