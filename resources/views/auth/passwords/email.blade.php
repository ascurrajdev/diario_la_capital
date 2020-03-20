@extends('layouts.app')

@section('content')
<div class="hold-transition login-page" style="background-color:white;">
    <div class="login-box">
        <div class="login-logo">
            <img  width="50%" src="{{asset('storage/img/logo.png')}}" />
         </div>
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body shadow-lg login-card-body">
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
              <div class="input-group mb-3">
                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
      
            <p class="mt-3 mb-1">
              <a href="{{url('')}}">Login</a>
            </p>
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
</div>

@endsection
