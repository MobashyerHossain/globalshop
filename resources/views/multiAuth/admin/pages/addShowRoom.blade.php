@extends('layout.admin')

@section('title', 'Add ShowRoom')

@section('content')
  @include('multiAuth.admin.inc.sidebar')
  <!-- modals -->
  @include('multiAuth.admin.inc.modals.addNewRole')
  <div class="main-panel">
      @include('multiAuth.admin.inc.navbar')
      <div class="content">
          <div class="container-fluid">
            {!! Form::open(['action' => ['ModelControllers\ShowRoomController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
              <div class="row">
                  <div class="col-12 bg-white p-3 border mb-2">
                      @csrf
                      <h3 class="mt-0 text-secondary">Showroom Information</h3>
                      <div class="form-row">
                          <!--last_name-->
                          <div class="col" style="padding-right:10px;">
                              <div class="form-group">
                                <label for="sr_name" style="margin:0px;color:#7a7a7a;">Name</label>
                                <input class="text-capitalize form-control{{ $errors->has('sr_name') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('sr_name') }}" placeholder="Name" id="sr_name" name="sr_name" required>

                                @if ($errors->has('sr_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sr_name') }}</strong>
                                    </span>
                                @endif
                              </div>
                          </div>

                          <!--Image-->
                          <div class="col-2" style="padding-left:10px;">
                              <div class="form-group">
                                <label for="logo" style="margin:0px;color:#7a7a7a;"></label>
                                <button style="font-size:17px;" class="btn btn-primary no-outline rounded-0 pt-1 pb-1 w-100" onclick="uploadImage('logo')" type="button">Logo</button>
                                <input id="logo" name="propic" class="d-none" onchange="readURL(this, '#logo_prev')" type="file"/>
                                <img id="logo_prev" src="" style="object-fit:contain;width:100%;">
                              </div>
                          </div>
                      </div>

                      <div class="form-row">
                          <!--email-->
                          <div class="col" style="padding-right:10px;">
                              <div class="form-group">
                                <label for="sr_email" style="margin:0px;color:#7a7a7a;">Email</label>
                                <input class="form-control{{ $errors->has('sr_email') ? ' is-invalid' : '' }} no-outline rounded-0" type="email" value="{{ old('sr_email') }}" placeholder="Email" id="sr_email" name="sr_email" required>

                                @if ($errors->has('sr_email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sr_email') }}</strong>
                                    </span>
                                @endif
                              </div>
                          </div>

                          <!--website-->
                          <div class="col-9" style="padding-left:10px;">
                              <div class="form-group">
                                <label for="website" style="margin:0px;color:#7a7a7a;">Website</label>
                                <input class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('website') }}" placeholder="Website" id="website" name="website">

                                @if ($errors->has('website'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                              </div>
                          </div>
                      </div>

                      <!--local_address-->
                      <div class="form-row">
                          <div class="col">
                              <div class="form-group">
                                <label for="sr_local_address" style="margin:0px;color:#7a7a7a;">Local Adrress</label>
                                <input class="form-control{{ $errors->has('sr_local_address') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('sr_local_address') }}" placeholder="Local Address" id="sr_local_address" name="sr_local_address" required>

                                @if ($errors->has('sr_local_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sr_local_address') }}</strong>
                                    </span>
                                @endif
                              </div>
                          </div>
                      </div>
                      <div class="form-row">
                          <!--phone_number-->
                          <div class="col" style="padding-right:10px;">
                              <div class="form-group">
                                <label for="sr_phone_number" style="margin:0px;color:#7a7a7a;">Phone Number</label>
                                <input class="form-control{{ $errors->has('sr_phone_number') ? ' is-invalid' : '' }} no-outline rounded-0" type="tel" value="{{ old('sr_phone_number') }}" placeholder="Phone Number" id="sr_phone_number" name="sr_phone_number" required>

                                @if ($errors->has('sr_phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sr_phone_number') }}</strong>
                                    </span>
                                @endif
                              </div>
                          </div>

                          <!--postal_code-->
                          <div class="col" style="padding-left:10px;">
                              <div class="form-group">
                                <label for="sr_postal_code" style="margin:0px;color:#7a7a7a;">Postal Code</label>
                                <input class="form-control{{ $errors->has('sr_postal_code') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('sr_postal_code') }}" placeholder="Postal Code" id="sr_postal_code" name="sr_postal_code" required onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">

                                @if ($errors->has('sr_postal_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sr_postal_code') }}</strong>
                                    </span>
                                @endif
                              </div>
                          </div>
                      </div>
                      <div class="form-row">
                          <!--city-->
                          <div class="col" style="padding-right:10px;">
                              <div class="form-group">
                                <label for="sr_city" style="margin:0px;color:#7a7a7a;">City</label>
                                <input class="form-control{{ $errors->has('sr_city') ? ' is-invalid' : '' }} text-capitalize no-outline rounded-0" type="text" value="{{ old('sr_city') }}" placeholder="City" id="sr_city" name="sr_city" required>

                                @if ($errors->has('sr_city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sr_city') }}</strong>
                                    </span>
                                @endif
                              </div>
                          </div>

                          <!--country-->
                          <div class="col" style="padding-left:10px;">
                              <div class="form-group">
                                <label for="sr_country" style="margin:0px;color:#7a7a7a;">Country</label>
                                <input class="form-control{{ $errors->has('sr_country') ? ' is-invalid' : '' }} text-capitalize no-outline rounded-0" type="text" value="{{ old('sr_country') }}" placeholder="Country" id="sr_country" name="sr_country" required>

                                @if ($errors->has('sr_country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sr_country') }}</strong>
                                    </span>
                                @endif
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-12 bg-white p-3 border">
                      @csrf
                      <h3 class="mt-0 text-secondary">Showroom Manager Information</h3>
                      <div class="form-row">
                          <!--first_name-->
                          <div class="col" style="padding-right:10px;">
                              <div class="form-group">
                                <label for="first_name" style="margin:0px;color:#7a7a7a;">First Name</label>
                                <input class="text-capitalize form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('first_name') }}" placeholder="First Name" id="first_name" name="first_name" required>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                              </div>
                          </div>

                          <!--last_name-->
                          <div class="col" style="padding-left:10px;">
                              <div class="form-group">
                                <label for="last_name" style="margin:0px;color:#7a7a7a;">Last Name</label>
                                <input class="text-capitalize form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('last_name') }}" placeholder="Last Name" id="last_name" name="last_name" required>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                              </div>
                          </div>
                      </div>

                      <div class="form-row">
                          <!--email-->
                          <div class="col" style="padding-right:20px;">
                              <div class="form-group">
                                <label for="email" style="margin:0px;color:#7a7a7a;">Email</label>
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} no-outline rounded-0" type="email" value="{{ old('email') }}" placeholder="Email" id="email" name="email" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                              </div>
                          </div>

                          <!--Image-->
                          <div class="col-2">
                              <div class="form-group">
                                <label for="email" style="margin:0px;color:#7a7a7a;"></label>
                                <button style="font-size:17px;" class="btn btn-primary no-outline rounded-0 pt-1 pb-1 w-100" onclick="uploadImage('em_pro')" type="button">Profile Pic</button>
                                <input id="em_pro" name="propic" class="d-none" onchange="readURL(this, '#em_pro_prev')" type="file"/>
                                <img id="em_pro_prev" class="avatar border-gray" src="" style="object-fit:contain;width:100%;">
                              </div>
                          </div>
                      </div>

                      <!--local_address-->
                      <div class="form-row">
                          <div class="col">
                              <div class="form-group">
                                <label for="local_address" style="margin:0px;color:#7a7a7a;">Local Adrress</label>
                                <input class="form-control{{ $errors->has('local_address') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('local_address') }}" placeholder="Local Address" id="local_address" name="local_address" required>

                                @if ($errors->has('local_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('local_address') }}</strong>
                                    </span>
                                @endif
                              </div>
                          </div>
                      </div>
                      <div class="form-row">
                          <!--phone_number-->
                          <div class="col" style="padding-right:10px;">
                              <div class="form-group">
                                <label for="phone_number" style="margin:0px;color:#7a7a7a;">Phone Number</label>
                                <input class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }} no-outline rounded-0" type="tel" value="{{ old('phone_number') }}" placeholder="Phone Number" id="phone_number" name="phone_number" required>

                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                              </div>
                          </div>

                          <!--postal_code-->
                          <div class="col" style="padding-left:10px;">
                              <div class="form-group">
                                <label for="postal_code" style="margin:0px;color:#7a7a7a;">Postal Code</label>
                                <input class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('postal_code') }}" placeholder="Postal Code" id="postal_code" name="postal_code" required onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">

                                @if ($errors->has('postal_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </span>
                                @endif
                              </div>
                          </div>
                      </div>
                      <div class="form-row">
                          <!--city-->
                          <div class="col" style="padding-right:10px;">
                              <div class="form-group">
                                <label for="city" style="margin:0px;color:#7a7a7a;">City</label>
                                <input class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }} text-capitalize no-outline rounded-0" type="text" value="{{ old('city') }}" placeholder="City" id="city" name="city" required>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                              </div>
                          </div>

                          <!--country-->
                          <div class="col" style="padding-left:10px;">
                              <div class="form-group">
                                <label for="country" style="margin:0px;color:#7a7a7a;">Country</label>
                                <input class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }} text-capitalize no-outline rounded-0" type="text" value="{{ old('country') }}" placeholder="Country" id="country" name="country" required>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                              </div>
                          </div>
                      </div>
                      <input type="hidden" value="showroom manager" id="job_title" name="job_title">
                  </div>
              </div>
              <div class="row">
                <div class="col-md-3 col-12 ml-auto mr-auto">
                  {{Form::submit('Add ShowRoom',['class' => 'w-100 mb-2 mt-3 bg-white rounded-0 no-outline btn btn-primary'])}}
                </div>
              </div>
            {!! Form::close() !!}
          </div>
      </div>
      @include('multiAuth.admin.inc.footer')
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
  @include('multiAuth.admin.js.adminJS')
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
