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
            <a href="{{url('post/create')}}" class="btn bg-gradient-success mb-2"><span class="ion ion-plus"></span>&nbsp;Nueva noticia</a><br/>
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title">Nuevo caso de coronavirus</h3>
                    <span class="ml-2 badge badge-warning">Nacional</span>
                    <span class="pl-2 badge badge-danger">Urgente</span>
                    <div class="card-tools">
                      <!-- Buttons, labels, and many other things can be placed here! -->
                      <!-- Here is a label for example -->
                      <span class="pr-1">
                        @if(date("d-m-Y") === "18-03-2020")
                            Hoy 
                        @elseif(date("d-m-Y",strtotime(date("d-m-Y")."- 1 days")) === "18-03-2020")
                            Ayer
                        @else
                            {{date("d-m-Y")}}
                        @endif
                         {{date("H:m:s")}}
                        </span>
                    
                        <a href="{{url('post/1')}}" class="btn text-decoration-none btn-flat bg-gradient-secondary"><span class="ion ion-eye"></span></a>  
                        <a href="{{url('post/1/edit')}}" class="btn btn-flat text-decoration-none bg-gradient-primary"><span class="ion ion-edit"></span></a>
                      <button class="btn btn-flat bg-gradient-danger"><span class="ion ion-trash-a"></span></button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <!-- /.card-body -->
            </div>
            
        </div>

    </div>
    </section>
@endsection