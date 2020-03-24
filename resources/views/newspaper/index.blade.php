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
            <div>
              @php
                $arrayRelevanciaStyle = array("1"=>'badge-primary',"2"=>'badge-warning',"3"=>'badge-danger');
                $arrayNoticiasStyle = array("1"=>'card-primary',"2"=>'card-warning',"3"=>'card-danger');
              @endphp
            @foreach($Noticias as $noticia)
            <div class="card card-outline {{$arrayNoticiasStyle[$noticia->relevancia->id]}}">
                <div class="card-header">
                    <h3 class="card-title">{{$noticia->titulo_noticia}}</h3>
                    <span class="ml-2 badge badge-warning">{{$noticia->categoria->nombre_categoria}}</span>
                    <span class="pl-2 badge {{$arrayRelevanciaStyle[$noticia->relevancia->id]}}">{{$noticia->relevancia->nombre_relevancia}}</span>
                    <div class="card-tools">
                      <!-- Buttons, labels, and many other things can be placed here! -->
                      <!-- Here is a label for example -->
                      <span class="pr-1">
                        @if(date("d-m-Y") === date("d-m-Y",strtotime($noticia->created_at)))
                            Hoy 
                        @elseif(date("d-m-Y",strtotime(date("d-m-Y")."- 1 days")) === date("d-m-Y",strtotime($noticia->created_at)))
                            Ayer
                        @else
                            {{date("d-m-Y",strtotime($noticia->created_at))}}
                        @endif
                         {{date("H:i:s",strtotime($noticia->created_at))}}
                        </span>
                    
                        <a href="{{url('post/'.$noticia->id)}}" class="btn text-decoration-none btn-flat bg-gradient-secondary"><span class="ion ion-eye"></span></a>  
                        <a href="{{url('post/'.$noticia->id.'/edit')}}" class="btn btn-flat text-decoration-none bg-gradient-primary"><span class="ion ion-edit"></span></a>
                        <boton-eliminar id="{{$noticia->id}}"/>
                        <!--<button class="btn btn-flat bg-gradient-danger" data-id="{{$noticia->id}}"><span class="ion ion-trash-a"></span></button>
                        -->
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <!-- /.card-body -->
            </div>
            @endforeach
          </div>
        </div>

    </div>
    </section>
@endsection
@section('scriptbody')
  <script src="{{asset('js/app.js')}}"></script>
@endsection