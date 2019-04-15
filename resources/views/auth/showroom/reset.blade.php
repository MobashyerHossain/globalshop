@extends('layout.admin')

@section('title', 'Change Password')

@section('content')
  @include('multiAuth.showroomstaff.inc.sidebar')
  <div class="main-panel">
      @include('multiAuth.showroomstaff.inc.navbar')
      <div class="container mt-5 mb-5">
          <div class="row justify-content-center">
              <div class="col-md-8">
                  <div class="card rounded-0">
                      <div class="card-header">{{ __('Reset Password') }}</div>

                      <div class="card-body">
                          <form method="POST" action="{{ route('showroomstaff.password.request') }}" aria-label="{{ __('Reset Password') }}">
                              @csrf

                              <input type="hidden" name="token" value="{{ $token }}">

                              <div class="form-group row">
                                  <div class="col-md-10 offset-md-1">
                                      <input id="email" type="email" placeholder="E-Mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} rounded-0" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                      @if ($errors->has('email'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <div class="col-md-10 offset-md-1">
                                      <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} rounded-0" name="password" required>

                                      @if ($errors->has('password'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <div class="col-md-10 offset-md-1">
                                      <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control rounded-0" name="password_confirmation" required>
                                  </div>
                              </div>

                              <div class="form-group row mb-0">
                                  <div class="col-md-4 offset-md-4">
                                      <button type="submit" class="btn btn-primary rounded-0 w-100">
                                          {{ __('Reset Password') }}
                                      </button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      @include('multiAuth.showroomstaff.inc.footer')
  </div>
@endsection

@section('style')
  <!-- CSS Files -->
  <style>
    .no-outline {
      box-shadow:none !important;
      outline:none;
    }
  </style>
  <link href="{{ asset('assets/css/light-bootstrap-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
@stop

@section('script')
  @include('multiAuth.showroomstaff.js.showroomJS')
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="{{ asset('assets/js/plugins/bootstrap-switch.js') }}"></script>
  <!--  Chartist Plugin  -->
  <script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
  <script src="{{ asset('assets/js/light-bootstrap-dashboard.js?v=2.0.1') }}" type="text/javascript"></script>
@stop
