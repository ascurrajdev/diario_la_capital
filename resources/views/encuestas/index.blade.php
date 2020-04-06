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
            <a href="{{url('encuestas/create')}}" class="btn bg-gradient-success mb-2"><span class="ion ion-plus"></span>&nbsp;Nueva Encuesta</a><br/>
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid">
                        @foreach ($encuestas as $encuesta)
                            <div class="text-decoration-none card shadow mt-2 text-dark">
                                <div class="card-header">
                                   <div class="card-title">{{substr($encuesta->contenido,0,40)."..."}}</div>
                                   <div class="card-tools"> 
                                        <a href="{{url("encuestas/".$encuesta->id)}}" class="btn btn-primary">Ver</a>
                                        <a href="{{url("encuestas/".$encuesta->id."/edit")}}"class="btn btn-success">Editar</a>
                                        <boton-eliminar class="{{(collect(Auth::user()->role->json_role["permisos"]["encuestas"]))->search("eliminar")>-1  ? '': 'd-none' }}" id="{{$encuesta->id}}"/>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
@section('scriptbody')
<script src="{{asset('js/app.js')}}"></script>
@endsection









