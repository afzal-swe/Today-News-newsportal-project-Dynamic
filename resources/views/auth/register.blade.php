

@extends('layouts.app')
@section('content')

<div class="hold-transition login-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Supper</b>Admin</a>
          </div>
          <div class="card-body">
            <p class="login-box-msg">Register a new Sub Admin</p>
      
            <form method="POST" action="{{ route('register') }}">
                @csrf

              <div class="input-group mb-3">
                <input type="text" id="name" name="name" class="form-control" placeholder="Full name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autocomplete="username">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required autocomplete="new-password" />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Retype password" required autocomplete="new-password" />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                    <label for="agreeTerms">
                     I agree to the <a href="#">terms</a>
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
      
            <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
          </div> 
          <!-- /.form-box -->
        </div><!-- /.card -->
      </div>
</div>

@endsection