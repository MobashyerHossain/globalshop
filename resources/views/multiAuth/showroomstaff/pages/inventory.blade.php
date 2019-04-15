@extends('layout.showroom')

@section('title', 'Inventory')

@section('content')
  @include('multiAuth.showroomstaff.inc.sidebar')
  <div class="main-panel">
      @include('multiAuth.showroomstaff.inc.navbar')
      <div class="content">
        <div class="row m-0">
          <div class="col-12">
            <ul class="nav nav-tabs mb-4 border-bottom bg-white">
                <li class="nav-item m-0" style="width:50%;">
                  <a class="border-0 text-center font-weight-bold rounded-0 nav-link active" role="tab" data-toggle="tab" href="#car_inventory">Cars</a>
                </li>
                <li class="nav-item m-0" style="width:50%;">
                  <a class="border-0 text-center font-weight-bold rounded-0 nav-link" role="tab" data-toggle="tab" href="#part_inventory">Parts</a>
                </li>
            </ul>
          </div>

          <div class="col-12">
            <!-- Tab Contents -->
            <div class="tab-content">
                <div class="tab-pane active" role="tabpanel" id="car_inventory">
                    @include('multiAuth.showroomstaff.inc.carTableGroup')
                </div>
                <div class="tab-pane" role="tabpanel" id="part_inventory">
                    @include('multiAuth.showroomstaff.inc.partTableGroup')
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
