@extends('layout.consumer')

@section('title', $carModels[0]->getMaker()->name)

@section('content')
  @include('multiAuth.consumer.inc.navbar')
  <div class="content">
    <!-- Banner -->
    <div style="height:290px;box-shadow:0 2px 10px rgba(0, 0, 0, 0.2);" class="m-0 p-0 bg-white">
      <div class="row m-0 p-0">
        <div class="col p-0 m-0">
          <img class="m-0 p-0" src="{{url($carModels[0]->getMaker()->getImageById(1))}}" style="width:100%; height:290px; object-fit:cover;" alt="">
        </div>
        <div class="col">
          <img class="mt-3" src="{{url($carModels[0]->getMaker()->getLogo())}}" style="width:100%; height:250px; object-fit:contain;" alt="">
        </div>
        <div class="col p-0 m-0">
          <img class="m-0 p-0" src="{{url($carModels[0]->getMaker()->getImageById(2))}}" style="width:100%; height:290px; object-fit:cover;" alt="">
        </div>
      </div>
    </div>

    <div style="margin:10px 60px;">
      <div class="m-0 p-0">
        <!-- Car Models -->
        @foreach($carModels as $carModel)
          <div style="margin:50px 0px;">
              <!-- categories header -->
              <div class="row" style="padding:0px;margin-bottom:10px;margin-right:0px;margin-left:0px;">
                  <div class="col align-self-center" style="padding:0px;">
                      <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
                  </div>
                  <div class="col-6 align-self-center text-center" data-bs-hover-animate="pulse" style="padding:0px;">
                    <a href="{{ route('find.car.model', $carModel->id) }}" style="text-decoration:none;">
                      <h4 class="text-uppercase d-inline" style="margin:0px;color:rgba(33,37,41,0.8);">{{$carModel->name}}</h4>
                    </a>
                  </div>
                  <div class="col align-self-center" style="padding:0px;">
                      <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
                  </div>
              </div>

              <!-- Model show -->
              <div class="row" style="margin:0px;background-color:#ffffff;padding:0px;">
                  <!-- cars -->
                  <div class="col">
                      <div class="row">
                          @foreach($carModel->getCars() as $car)
                            <div class="col-3 border pl-0" style="padding:15px;height:200px;">
                              <div class="row m-0">
                                <div class="col">
                                  <a class="nav nav-link m-0 p-0" href="{{ route('find.car.details', $car->id) }}">
                                    <h5 class="text-capitalize" style="font-size:16px;font-family: 'Times New Roman', Times, serif;color:rgba(33,37,41,0.8);font-weight:normal;">{{$car->name}}</h5>
                                  </a>
                                </div>
                                <div class="col-3 text-center m-0 p-0">
                                  @if(Auth::check())
                                    <a href="{{route('find.carHandling.form', ['form_type' => 'carBooking', 'car_id' => $car->id])}}" style="line-height:15px;text-decoration:none;position:absolute;right:60px;top:-3px;" data-toggle="tooltip" data-placement="top" title="Book This Car" class="bg-primary text-white p-1 pt-0 pb-0 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">B</a>
                                    <a href="{{route('find.carHandling.form', ['form_type' => 'carTesting', 'car_id' => $car->id])}}" style="line-height:15px;text-decoration:none;position:absolute;right:30px;top:-3px;" data-toggle="tooltip" data-placement="top" title="Take it for a Test Drive" class="bg-primary text-white p-1 pt-0 pb-0 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">T</a>
                                    <a href="{{route('find.carHandling.form', ['form_type' => 'carLoaning', 'car_id' => $car->id])}}" style="line-height:15px;text-decoration:none;position:absolute;right:0px;top:-3px;" data-toggle="tooltip" data-placement="top" title="Apply for Car Loan" class="bg-primary text-white p-1 pt-0 pb-0 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">L</a>
                                  @else
                                    <button style="position:absolute;right:0px;top:-3px;"class="btn btn-link no-outline rounded-0 p-0 m-0" data-toggle="modal" data-target="#LoginModalCenter" type="button"><i class="fa fa-car"></i></button>
                                  @endif
                                </div>
                              </div>
                              <div class="row m-0">
                                <div class="col-6" style="height:70px;position:absolute;bottom:10px;left:px;">
                                  <h5 class="text-capitalize" style="font-size:16px;font-family: 'Times New Roman', Times, serif;color:rgba(33,37,41,0.8);font-weight:normal;"><span class="text-danger font-weight-bold">{{$car->getDiscount()}}</span></h5>
                                  <h6 class="m-0 text-secondary" style="font-size:15px;font-family: 'Times New Roman', Times, serif;">{{$car->getNormalPrice()}}</h6>
                                  <p class="text-secondary" style="font-family: 'Times New Roman', Times, serif;font-size:13px;">{{$car->getTotalStock()}} Pieces left</p>
                                </div>
                                <div class="col-6" style="height:90px;position:absolute;bottom:10px;right:0px;">
                                  <a class="nav nav-link m-0 p-0" href="{{ route('find.car.details', $car->id) }}">
                                    <img class="float-right m-0 p-0" src="{{url($car->getImage())}}" data-bs-hover-animate="pulse" style="height:90px;width:180px;object-fit:cover;">
                                  </a>
                                </div>
                              </div>
                            </div>
                          @endforeach
                          <!-- coming soon -->
                          <div class="col border text-truncate" style="padding:15px;position:relative;height:200px;">
                            <table style="height: 100%; width:100%">
                              <tbody>
                                <tr>
                                  <td class="align-middle">
                                    <h3 class="text-capitalize text-center" style="color:rgba(33,37,41,0.8);">More<br>Coming Soon</h3>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        @endforeach
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

  <script src="{{ asset('FrontEnd/Consumers/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('FrontEnd/Consumers/assets/js/Customizable-Carousel-swipe-enabled.js') }}"></script>
  <script src="{{ asset('FrontEnd/Consumers/assets/js/bs-animation.js') }}"></script>
@stop
