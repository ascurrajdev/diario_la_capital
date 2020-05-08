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
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid">
                        @foreach ($lectores as $lector)
                            <div class="text-decoration-none card shadow mt-2 text-dark">
                                <div class="card-header">
                                   <div class="card-title">
                                    {{$lector->nombre_completo}}
                                  </div>
                                </div>
                                <div class="card-body">
                                  <div class="text-body">
                                    {{$lector->correo}}
                                  </div>
                                </div>
                                <div class="card-footer">
                                  {{$lector->cedula}}
                                </div>
                            </div>
                        @endforeach
                        {{$lectores->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection









