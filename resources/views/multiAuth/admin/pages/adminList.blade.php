@extends('layout.admin')

@section('title', 'Admin List')

@section('content')
  @include('multiAuth.admin.inc.sidebar')
  <div class="main-panel">
      @include('multiAuth.admin.inc.navbar')
      <div class="content">
        <div class="row">
          @foreach(Auth::user()->getAdminList() as $admin)
            @if($admin->id != Auth::id())
              <div class="col-md-4">
                  <div class="card card-user">
                      <div class="card-image">
                          <img src="{{ url($admin->getProfilePic()) }}" style="width:100%;object-fit:contain;">
                      </div>
                      <div class="card-body">
                          <div class="author">
                            <img class="avatar border-gray" src="{{ url($admin->getProfilePic()) }}">
                            <h5 class="title text-secondary" style="letter-spacing:5px;">{{ $admin->getFullName() }}</h5>
                            @if(Auth::user()->getRole()->title == 'super admin')
                              <h5>
                                <a href="{{route('adminCruds.edit', ['id' => $admin->id])}}"><span class="mr-1 fa fa-edit text-primary" class="no-outline"></span></a>
                                <a href="" data-toggle="modal" data-target="#removeEmployeeModal{{$admin->id}}" class="no-outline"><span class="ml-1 fa fa-trash text-danger"></span></a>

                                <div class="modal fade" id="removeEmployeeModal{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="removeEmployeeModalLabel{{$admin->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-body">
                                        <p>Are you sure you wish to Fire</p>
                                        <p class="text-capitalize">{{$admin->getRole()->title}} {{$admin->getFullName()}}</p>
                                        <p>as an Admin?</p>
                                      </div>
                                      <div class="modal-footer">
                                        {!!Form::open(['action' => ['ModelControllers\AdminCrudController@destroy', $admin->id], 'method' => 'POST'])!!}
                                          {{Form::hidden('_method', 'DELETE')}}
                                          <a onclick="this.parentNode.submit();" class="btn btn-danger rounded-0" style="color:#7f7f7f;">Fire</a>
                                        {!!Form::close()!!}
                                        <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Don't Fire</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </h5>
                            @endif
                          </div>
                          <hr>
                          <div class="">
                            <table class="text-secondary">
                              <tr>
                                <td>Job</td>
                                <td>:</td>
                                <td class="col-7 text-right text-capitalize">{{$admin->getRole()->title}}</td>
                              </tr>
                              <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td class="col-7 text-right">{{$admin->email}}</td>
                              </tr>
                              <tr>
                                <td>Phone</td>
                                <td>:</td>
                                <td class="col-7 text-right">{{$admin->getPhoneNumber()->number}}</td>
                              </tr>
                            </table>
                          </div>
                      </div>
                  </div>
              </div>
            @endif
          @endforeach
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
