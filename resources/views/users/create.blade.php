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
              <li class="breadcrumb-item">Categorias</li>
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
                        Nuevo Usuario
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
                        <form method="POST" action="{{ route('usuarios.store') }}">
                            @csrf
    
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
    
                                
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>
    
                            <div class="form-group">
                                <label for="email" >{{ __('E-Mail Address') }}</label>
    
                               
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>
    
                            <div class="form-group ">
                                <label for="password">{{ __('Password') }}</label>
    
                                
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>
    
                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
    
                                
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                
                            </div>
    
                            <div class="form-group ">
                                
                                <button class="btn btn-success" type="submit"><i class="ion ion-archive"></i>&nbsp; Guardar</button>
                                <a href="{{route('usuarios.index')}}" class="btn btn-primary"><i class="ion ion-arrow-left-c"></i> Volver</a>
                            </div>
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