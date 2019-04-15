@extends('layout.consumer')

@section('title', $car->name)

@section('content')
  @include('multiAuth.consumer.inc.navbar')
  <div class="content">
    <div class="text-secondary" style="margin:10px 60px;color:rgba(33,37,41,0.8);">
      <!-- breadcrumbs -->
      <nav aria-label="breadcrumb" style="margin-left:-10px; margin-bottom:0px;">
        <ol class="breadcrumb" style="background-color:transparent;">
          <li class="breadcrumb-item">
            <a style="text-decoration: none;" href="{{route('find.car.maker', $car->getModel()->getMaker()->id)}}">{{$car->getModel()->getMaker()->name}}</a>
          </li>
          <li class="breadcrumb-item">
            <a style="text-decoration: none;" href="{{ route('find.car.model', $car->getModel()->id) }}">{{$car->getModel()->name}}</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            {{$car->name}}
          </li>
        </ol>
      </nav>

      <!-- car image and detail -->
      <div class="row mt-0" style="margin:10px 0px;">
          <div class="col" style="margin-right:10px;background-color:rgba(255,255,255,0);">
              <div class="row" style="margin-bottom:20px; height:400px; background-color:#ffffff;">
                  <!-- car image -->
                  @include('multiAuth.consumer.inc.carDetailImageSection')

                  <!-- car summary -->
                  <div class="col border" style="padding:15px;font-family: 'Times New Roman', Times, serif;">
                      <div class="row m-0 p-0">
                        <div class="col p-0">
                          <h4 class="float-left text-capitalize">{{$car->name}} {{$car->getModel()->name}}</h4>
                        </div>
                        <div class="col-3 p-0">
                          <h1 class="float-right text-danger">{{$car->getDiscount()}}</h1>
                        </div>
                      </div>
                      <div class="table-responsive" style="margin-top:40px;">
                          <table class="table table-sm">
                              <tbody>
                                  <tr class="border-top-0">
                                      <td class="border-top-0" style="width:30%; font-family: 'Times New Roman', Times, serif;">Selling Price</td>
                                      <td class="border-top-0" style="font-family: 'Times New Roman', Times, serif;">: {{$car->getNormalPrice()}}</td>
                                  </tr>
                                  <tr class="border-top-0">
                                      <td class="border-top-0" style="width:30%; font-family: 'Times New Roman', Times, serif;">Discounted Price</td>
                                      <td class="border-top-0" style="font-family: 'Times New Roman', Times, serif;">: {{$car->getDiscountedPrice()}}</td>
                                  </tr>
                                  <tr class="border-top-0">
                                      <td class="border-top-0" style="width:30%; font-family: 'Times New Roman', Times, serif;">Piece Available</td>
                                      <td class="border-top-0" style="font-family: 'Times New Roman', Times, serif;">: {{$car->getTotalStock()}}</td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                      <div class="row m-0" style="position:absolute; bottom:20px; width:100%;">
                        @if(Auth::check())
                          <div class="col">
                            <a href="{{route('find.carHandling.form', ['form_type' => 'carBooking', 'car_id' => $car->id])}}" style="text-decoration:none;font-size:15px;" data-toggle="tooltip" data-placement="top" title="Book This Car" class="bg-primary text-white p-1 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">Book Car</a>
                          </div>
                          <div class="col">
                            <a href="{{route('find.carHandling.form', ['form_type' => 'carTesting', 'car_id' => $car->id])}}" style="text-decoration:none;font-size:15px;" data-toggle="tooltip" data-placement="top" title="Take it for a Test Drive" class="bg-primary text-white p-1 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">Test Drive</a>
                          </div>
                          <div class="col">
                            <a href="{{route('find.carHandling.form', ['form_type' => 'carLoaning', 'car_id' => $car->id])}}" style="text-decoration:none;font-size:15px;" data-toggle="tooltip" data-placement="top" title="Apply for Car Loan" class="bg-primary text-white p-1 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">Apply for Loan</a>
                          </div>
                        @else
                          <div class="col">
                            <a href="" style="text-decoration:none;font-size:15px;" data-toggle="modal" data-target="#LoginModalCenter" class="bg-primary text-white p-1 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">Book Car</a>
                          </div>
                          <div class="col">
                            <a href="" style="text-decoration:none;font-size:15px;" data-toggle="modal" data-target="#LoginModalCenter" class="bg-primary text-white p-1 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">Test Drive</a>
                          </div>
                          <div class="col">
                            <a href="" style="text-decoration:none;font-size:15px;" data-toggle="modal" data-target="#LoginModalCenter" class="bg-primary text-white p-1 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">Apply for Loan</a>
                          </div>
                        @endif
                      </div>
                  </div>
              </div>

              <!-- car detail pane -->
              <div id="Tab_Pane" class="row border" style="margin-top:20px;background-color:#ffffff;">
                  <div class="col">
                      <div>
                          <ul class="nav nav-pills border-bottom" style="margin-top:10px;">
                              <li class="nav-item">
                                <a class="nav-link border rounded-0 border-bottom-0 active" role="tab" data-toggle="pill" href="#tab-1" style="padding:5px;">Car Details</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link border rounded-0 border-bottom-0" role="tab" data-toggle="pill" href="#tab-2" style="padding:5px;">Maker Details</a>
                              </li>
                              @if(Auth::check())
                              <li class="nav-item">
                                <a class="nav-link border rounded-0 border-bottom-0" role="tab" data-toggle="pill" href="#tab-3" style="padding:5px;">Book This Car</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link border rounded-0 border-bottom-0" role="tab" data-toggle="pill" href="#tab-4" style="padding:5px;">Take a Test Drive</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link border rounded-0 border-bottom-0" role="tab" data-toggle="pill" href="#tab-5" style="padding:5px;">Apply for a Loan</a>
                              </li>
                              @endif
                          </ul>
                          <div class="tab-content">
                              <div class="tab-pane fade show active" role="tabpanel" id="tab-1">
                                  <div class="table-responsive" style="margin-top:20px;margin-bottom:10px;">
                                      <p class="text-justify">{{$car->getModel()->details}}.</p>
                                      @if(count($car->getDetails()) > 0)
                                        <table class="table table-sm">
                                            <tbody>
                                              @foreach($car->getDetails() as $cardetail)
                                                <tr>
                                                    <td class="border-top-0" style="width:30%;">{{$cardetail->detail_criteria}}</td>
                                                    <td class="border-top-0 text-center" style="width:10%;">:</td>
                                                    <td class="border-top-0">{{$cardetail->detail}}</td>
                                                </tr>
                                              @endforeach
                                            </tbody>
                                        </table>
                                      @endif
                                  </div>
                              </div>
                              <div class="tab-pane fade" role="tabpanel" id="tab-2">
                                  <div class="row">
                                      <div class="col-8">
                                          <div class="table-responsive" style="margin-top:20px;margin-bottom:10px;">
                                              <p class="text-justify">{{$car->getModel()->getMaker()->details}}</p>
                                          </div>
                                      </div>
                                      <div class="col" style="padding:10px;">
                                        <img src="{{url($car->getModel()->getMaker()->getLogo())}}" style="width:100%;">
                                      </div>
                                  </div>
                              </div>
                              @if(Auth::check())
                              <!-- Booking tab -->
                              <div class="tab-pane fade mt-3" role="tabpanel" id="tab-3">
                                @if(count($car->getBookingInfo()) > 0)
                                  <div style="margin:80px 0px;">
                                    <h3 class="text-center text-capitalize">you have already booked a unit of this car</h3>
                                    <p class="text-center">You have {{$car->getBookingInfo()->getTimeRemainingToClaim()}} to claim it</p>
                                  </div>
                                @else
                                  @include('multiAuth.consumer.inc.carBookingForm')
                                @endif
                              </div>
                              <!-- Testing tab -->
                              <div class="tab-pane fade mt-3" role="tabpanel" id="tab-4">
                                @if(count($car->getTestDrivingInfo()) > 0)
                                  <div style="margin:80px 0px;">
                                    <h3 class="text-center text-capitalize">you have already reserved a unit of this car for test drive</h3>
                                    <p class="text-center">You reserved it for {{$car->getTestDrivingInfo()->date_of_drive}} from {{$car->getTestDrivingInfo()->drive_from}} PM to {{$car->getTestDrivingInfo()->drive_to}} PM</p>
                                  </div>
                                @else
                                  @include('multiAuth.consumer.inc.carTestDrivingForm')
                                @endif
                              </div>
                              <!-- Loaning tab -->
                              <div class="tab-pane fade mt-3" role="tabpanel" id="tab-5">
                                @if(count($car->getLoanInfo()) > 0)
                                  <div style="margin:80px 0px;">
                                    <h3 class="text-center text-capitalize">you have already applied for a loan</h3>
                                  </div>
                                @else
                                  @include('multiAuth.consumer.inc.carLoanForm')
                                @endif
                              </div>
                              @endif
                          </div>
                      </div>
                  </div>
              </div>
              @include('multiAuth.consumer.inc.recommendedItems')
          </div>
          @include('multiAuth.consumer.inc.carDetailsSidebar')
      </div>
    </div>
  </div>

@endsection

@section('style')
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/Customizable-Carousel-swipe-enabled.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/fonts/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/fonts/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/fonts/typicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/Customizable-Carousel-swipe-enabled.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/Pretty-Footer.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/Footer-Basic.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/Footer-Dark.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/Navigation-Clean.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/Navigation-with-Search.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/styles.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
@stop

@section('script')
  @include('multiAuth.consumer.js.consumerJS')
  <script>
      $( document ).ready(function() {
          var pathname = window.location.pathname;

          if(pathname.indexOf("carBooking") != -1){
              $('a[href="#tab-3"]').click();
              $('html, body').animate({
                  scrollTop: $('#Tab_Pane').offset().top - 70
              }, 'slow');
          }
          else if(pathname.indexOf("carTesting") != -1){
              $('a[href="#tab-4"]').click();
              $('html, body').animate({
                  scrollTop: $('#Tab_Pane').offset().top - 70
              }, 'slow');
          }
          else if(pathname.indexOf("carLoaning") != -1){
              $('a[href="#tab-5"]').click();
              $('html, body').animate({
                  scrollTop: $('#Tab_Pane').offset().top - 70
              }, 'slow');
          }
          else{

          }
      });
  </script>

  <script src="{{ asset('FrontEnd/Consumers/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('FrontEnd/Consumers/assets/js/Customizable-Carousel-swipe-enabled.js') }}"></script>
  <script src="{{ asset('FrontEnd/Consumers/assets/js/bs-animation.js') }}"></script>
@stop
