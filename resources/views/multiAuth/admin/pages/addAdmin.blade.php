@extends('layout.admin')

@section('title', 'Add Admin')

@section('content')
  @include('multiAuth.admin.inc.sidebar')
  <!-- modals -->
  @include('multiAuth.admin.inc.modals.addNewRole')
  <div class="main-panel">
      @include('multiAuth.admin.inc.navbar')
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-8 bg-white p-3 border mb-3">
                    {!! Form::open(['id' => 'editForm', 'action' => ['ModelControllers\AdminCrudController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @csrf
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

                        <!--email-->
                        <div class="form-row">
                            <div class="col" style="padding-right:10px;">
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

                        <div class="form-row">
                            <!--job title-->
                            <div class="col" style="padding-right:10px;">
                              <label for="country" style="margin:0px;color:#7a7a7a;">Job Title</label>
                              <div class="input-group">
                                  <select id="job_title_select" name="job_title" class="form-control text-capitalize no-outline rounded-0 border" required>
                                    <option value="" selected hidden>Job Title</option>
                                    @foreach(App\Models\Other\Role::where('work_as','showroom staff')->where('title','!=', 'showroom manager')->get() as $job)
                                      <option value="{{$job->id}}" class="text-capitalize">{{$job->title}}</option>
                                    @endforeach
                                  </select>

                                  <div class="input-group-append">
                                    <button class="btn btn-primary no-outline rounded-0 pt-1 pb-1" type="button" data-toggle="modal" data-target="#newRoleModal"><span class="fa fa-plus mr-2"></span>New</button>
                                  </div>
                              </div>

                              @if ($errors->has('job_title'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('job_title') }}</strong>
                                  </span>
                              @endif
                            </div>

                            <!--salary-->
                            <div class="col" style="padding-left:10px;">
                                <div class="form-group">
                                  <label for="salary" style="margin:0px;color:#7a7a7a;">Salary</label>
                                  <input class="form-control no-outline rounded-0" type="text" value="" placeholder="Salary" id="preset_salary" name="preset_salary" readonly>
                                  @foreach(App\Models\Other\Role::where('work_as','showroom staff')->where('title','!=', 'showroom manager')->get() as $job)
                                    <input style="display:none;" class="form-control no-outline rounded-0" type="text" value="{{$job->getSalary()}}" placeholder="Salary" id="preset_salary{{$job->id}}" name="preset_salary" readonly>
                                  @endforeach
                                </div>
                            </div>
                        </div>

                        <!--profile pic-->
                        <input id="em_pro" name="propic" class="d-none" onchange="readURL(this, '#em_pro_prev')" type="file"/>

                        <div class="form-row">
                            <div class="col text-right">
                              {{Form::submit('Add Employee',['class' => 'rounded-0 no-outline btn btn-primary float-right'])}}
                            </div>
                        </div>
                    {!! Form::close() !!}
                  </div>
                  <div class="col-md-4">
                      <div class="card card-user">
                          <div class="card-image">
                          </div>
                          <div class="card-body">
                              <div class="author">
                                <img id="em_pro_prev" class="avatar border-gray" onclick="uploadImage('em_pro')" src="{{url('storage/images/default/default_profile_pic.png')}}" style="cursor:pointer;">
                                <h5 class="title text-secondary" style="letter-spacing:8px;">Click Me</h5>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
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
