@extends('layout.consumer')

@section('title', $partSubCategories[0]->getCategory()->name)

@section('content')
  @include('multiAuth.consumer.inc.navbar')
  <div class="content">
    <!-- Banner -->
    <div style="height:290px;box-shadow:0 2px 10px rgba(0, 0, 0, 0.2);" class="row m-0 p-0 bg-white">
      <div class="col m-0 p-0">
        <img src="{{url($partSubCategories[0]->getCategory()->getImage())}}" style="width:100%;height:290px;object-fit:contain;" alt="">
      </div>
      <div class="col m-0 p-0">
        <table style="height: 100%; width:100%">
          <tbody>
            <tr>
              <td class="align-middle">
                <h1 class="text-capitalize text-center" style="color:rgba(33,37,41,0.8);">{{$partSubCategories[0]->getCategory()->name}}</h1>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div style="margin:10px 60px;">
      <div class="m-0 p-0">
        <!-- Car Models -->
        @foreach($partSubCategories as $partSubCategory)
        <div style="margin:50px 0px;">
            <!-- categories header -->
            <div class="row" style="padding:0px;margin-bottom:10px;margin-right:0px;margin-left:0px;">
                <div class="col align-self-center" style="padding:0px;">
                    <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
                </div>
                <div class="col-3 align-self-center text-center" data-bs-hover-animate="pulse" style="padding:0px;">
                  <a href="{{ route('find.part.subCategory', $partSubCategory->id) }}" style="text-decoration:none;">
                    <h4 class="text-uppercase d-inline" style="margin:0px;color:rgba(33,37,41,0.8);">{{$partSubCategory->name}}</h4>
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
                        @foreach($partSubCategory->getParts() as $part)
                          <div class="col-3 border" style="padding:15px;height:200px;">
                            <div class="row m-0">
                              <div class="col">
                                <a class="nav nav-link m-0 p-0" href="{{ route('find.part.details', $part->id) }}">
                                  <h5 class="text-capitalize" style="font-size:16px;font-family: 'Times New Roman', Times, serif;color:rgba(33,37,41,0.8);font-weight:normal;">{{$part->name}}</h5>
                                </a>
                              </div>
                              <div class="col-3 text-center m-0 p-0">
                                @if(Auth::check())
                                  {!! Form::open(['action' => 'ModelControllers\CartController@store', 'method' => 'POST']) !!}
                                      {{Form::hidden('consumer_id', Auth::id(), [])}}
                                      {{Form::hidden('part_id', $part->id, [])}}
                                      {{Form::number('quantity', 1, ['min' => 1, 'max' => $part->getTotalStock(), 'style' => 'width:40px;height:20px;position:absolute;right:20px;top:0px;'])}}
                                      <button style="position:absolute;right:0px;top:-3px;"class="btn btn-link no-outline rounded-0 p-0 m-0" type="submit"><i class="fa fa-shopping-cart"></i></button>
                                  {!! Form::close() !!}
                                @else
                                  <button style="position:absolute;right:0px;top:-3px;"class="btn btn-link no-outline rounded-0 p-0 m-0" data-toggle="modal" data-target="#LoginModalCenter" type="button"><i class="fa fa-shopping-cart"></i></button>
                                @endif
                              </div>
                            </div>
                            <div class="row m-0">
                              <div class="col-6" style="height:70px;position:absolute;bottom:10px;left:10px;">
                                <h5 class="text-capitalize" style="font-size:16px;font-family: 'Times New Roman', Times, serif;color:rgba(33,37,41,0.8);font-weight:normal;"><span class="text-danger font-weight-bold">{{$part->getDiscount()}}</span></h5>
                                <h6 class="m-0 text-secondary" style="font-family: 'Times New Roman', Times, serif;">{{$part->getNormalPrice()}}</h6>
                                <p class="text-secondary" style="font-size:13px;">{{$part->getTotalStock()}} Pieces Available</p>
                              </div>
                              <div class="col-6" style="height:100px;position:absolute;bottom:10px;right:0px;">
                                <a class="nav nav-link m-0 p-0" href="{{ route('find.part.details', $part->id) }}">
                                  <img class="float-right m-0 p-0" src="{{url($part->getImage())}}" data-bs-hover-animate="pulse" style="height:100px; object-fit:contain;">
                                </a>
                              </div>
                            </div>
                          </div>
                        @endforeach
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
