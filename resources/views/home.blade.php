@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$route ?? 'Dashboard'}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6 {{(collect(Auth::user()->role->json_role["permisos"]["noticias"]))->search("ver")>-1  ? '': 'd-none' }}">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$noticias}}</h3>

                <p>Noticias</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-paper"></i>
              </div>
              <a href="{{url('post')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 {{(collect(Auth::user()->role->json_role["permisos"]["encuestas"]))->search("ver")>-1  ? '': 'd-none' }}">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$encuestas}}</h3>

                <p>Encuestas</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{route('encuestas.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 {{(collect(Auth::user()->role->json_role["permisos"]["usuarios"]))->search("ver")>-1  ? '': 'd-none' }}">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$usuarios}}</h3>

                <p>Usuarios registrados</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url(route('usuarios.index'))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 {{(collect(Auth::user()->role->json_role["permisos"]["lectores"]))->search("ver")>-1  ? '': 'd-none' }}">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$vistas}}</h3>

                <p>Visitantes Hoy</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route("visitas.index")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
                <div class="card card-outline card-gradient-primary">
                    <div class="card-header border-0">
                      <h3 class="card-title">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        Visitantes
                      </h3>
                      <!-- card tools -->
                      <div class="card-tools">
                        <button type="button"
                                class="btn btn-primary btn-sm"
                                data-card-widget="collapse"
                                data-toggle="tooltip"
                                title="Collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <div class="card-body">
                      <div width="380px" class="align-center" style="max-height:650px;" id="grafica"></div>
                    </div>
                    <!-- /.card-body-->
                    
                  </div>

            </section>
        </div>
    </div>
    </section>
  </div>
@endsection
@section('scriptbody')
<script src="{{mix("js/app.js")}}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  var options = {
  series: [20,30,50],
  labels: ['Paraguay','Brasil','Argentina'],
  chart: {
    width: 380,
    type: 'pie'
  }
};
var chart = new ApexCharts(document.querySelector("#grafica"), options);
chart.render();
</script>
@endsection