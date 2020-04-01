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
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="row">
                                                <div class="col-lg-12 float-left">{{substr($encuesta->contenido,0,40)."..."}}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-lg-12 float-right h-100 w-100">
                                                    <button class="btn float-right mr-1 btn-danger">Eliminar</button>
                                                    <button class="btn float-right mr-1 btn-success">Editar</button>
                                                    <button class="btn float-right mr-1 btn-primary">Ver</button>
                                                </div>
                                            </div>
                                        </div>
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









