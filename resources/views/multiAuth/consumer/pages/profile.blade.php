@extends('layout.consumer')

@section('title', Auth::user()->getFullName())

@section('content')
  @include('multiAuth.consumer.inc.navbar')
  <div class="content">
    <div class="text-secondary" style="margin:10px 60px;color:rgba(33,37,41,0.8);">
      <!-- breadcrumbs -->
      <nav aria-label="breadcrumb" style="margin-left:-10px; margin-bottom:0px;">
        <ol class="breadcrumb" style="background-color:transparent;">
          <li class="breadcrumb-item active">
            Profile
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            {{Auth::user()->getFullName()}}
          </li>
        </ol>
      </nav>

      <!-- part image and detail -->
      <div class="row mt-0" style="margin:10px 0px;">
          <div class="col" style="margin-right:10px;background-color:rgba(255,255,255,0);">
              <div class="row" style="background-color:#ffffff;">
                <div class="border col-4 text-center" style="padding:30px 15px;">
                  {!! Form::open(['action' => 'ModelControllers\ImageController@storeProfilePicture', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    {{Form::hidden('user_type', 'consumer')}}
                    {{Form::file('profile_pic', ['id' => 'pro', 'style' => 'display:none;', 'onchange' => 'form.submit()'])}}
                  {!! Form::close() !!}
                  <img class="rounded-circle img-fluid ml-md-3" onclick="proPic()" src="{{url(Auth::user()->getProfilePic())}}" style="cursor:pointer;width:130px;height:130px;object-fit:cover;">
                  <h5 style="letter-spacing:15px;margin:20px 0px;">{{Auth::user()->getFullName()}}</h5>
                </div>
                <div class="border col" style="padding:15px 15px;">
                    @include('multiAuth.consumer.inc.profileInfoForm')
                    @include('multiAuth.consumer.inc.profileEditForm')
                </div>
              </div>

              <!-- my favourites -->
              <div id="my_favourite_items" class="mb-0" style="margin:30px -10px;">
                  <!-- separetor -->
                  <div class="row" style="padding:0px;margin-bottom:10px;margin-right:0px;margin-left:0px;">
                      <div class="col-4 align-self-center" style="padding:0px;">
                          <h4 class="text-uppercase d-inline" style="margin:0px;color:rgba(33,37,41,0.8);">My Favourites</h4>
                      </div>
                      <div class="col align-self-center" style="padding:0px;">
                          <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
                      </div>
                  </div>

                  <!-- Items -->
                  <div class="row mt-0 mb-0 bg-white" style="margin-left:-5px;margin-right:-5px;">
                      @if(count(Auth::user()->getMyFavourites()) <= 0)
                        <div class="col border pl-0" style="padding:15px;height:180px;">
                          <table style="height: 100%; width:100%">
                            <tbody>
                              <tr>
                                <td class="align-middle">
                                  <h4 class="text-capitalize text-center" style="color:rgba(33,37,41,0.8);">No Favourite Items</h4>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      @else
                        @foreach(Auth::user()->getMyFavourites() as $favourite)
                          <div class="col-4 border pl-0" style="padding:15px;height:180px;">
                            <div class="row m-0">
                              <div class="col">
                                @if($favourite->getProduct()->getType() == 'car')
                                  <a class="nav nav-link m-0 p-0" href="{{ route('find.car.details', $favourite->getProduct()->id) }}">
                                @else
                                  <a class="nav nav-link m-0 p-0" href="{{ route('find.part.details', $favourite->getProduct()->id) }}">
                                @endif
                                  <h5 class="text-capitalize" style="font-size:16px;font-family: 'Times New Roman', Times, serif;color:rgba(33,37,41,0.8);font-weight:normal;">{{$favourite->getProduct()->name}}</h5>
                                </a>
                              </div>
                              <div class="col-3 text-center m-0 p-0">
                                {!!Form::open(['action' => ['ModelControllers\MyFavouriteController@destroyFromProfile', $favourite->id], 'method' => 'POST'])!!}
                                  {{Form::hidden('_method', 'DELETE')}}
                                  <a onclick="this.parentNode.submit();" style="cursor:pointer;">
                                    <i class="fa fa-heart" style="float:right;font-size:25px;z-index:1px;margin-top:0px;color:rgba(232,17,45,0.53);"></i>
                                  </a>
                                {!!Form::close()!!}
                              </div>
                            </div>
                            <div class="row m-0">
                              <div class="col-6" style="height:70px;position:absolute;bottom:10px;left:0px;">
                                <h5 class="text-capitalize" style="font-size:16px;font-family: 'Times New Roman', Times, serif;color:rgba(33,37,41,0.8);font-weight:normal;"><span class="text-danger font-weight-bold">{{$favourite->getProduct()->getDiscount()}}</span></h5>
                                <h6 class="m-0 text-secondary" style="font-size:15px;font-family: 'Times New Roman', Times, serif;">{{$favourite->getProduct()->getNormalPrice()}}</h6>
                                <p class="text-secondary" style="font-family: 'Times New Roman', Times, serif;font-size:13px;">{{$favourite->getProduct()->getTotalStock()}} Pieces Left</p>
                              </div>
                              <div class="col-6" style="height:90px;position:absolute;bottom:10px;right:0px;">
                                @if($favourite->getProduct()->getType() == 'car')
                                  <a class="nav nav-link m-0 p-0" href="{{ route('find.car.details', $favourite->getProduct()->id) }}">
                                @else
                                  <a class="nav nav-link m-0 p-0" href="{{ route('find.part.details', $favourite->getProduct()->id) }}">
                                @endif
                                  <img class="m-0 p-0" src="{{url($favourite->getProduct()->getImage())}}" data-bs-hover-animate="pulse" style="height:90px;width:100%;object-fit:contain;">
                                </a>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      @endif
                  </div>
              </div>
          </div>

          <!-- Recommendation -->
          @include('multiAuth.consumer.inc.profileProductRecommendation')
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
    //error while updating info
    $( document ).ready(function() {
      if({{count($errors) > 0}}){
        document.getElementById("infoForm").style.display = "none";
        document.getElementById("editForm").style.display = "block";
      }
    });
  </script>

  <script>
    //scroll to my favourites
    $( document ).ready(function() {
      if("{{Session::has('show_favourites')}}"){
        $('html, body').animate({
            scrollTop: $('#my_favourite_items').offset().top - 70
        }, 'slow');
      }
    });
  </script>

  <script src="{{ asset('FrontEnd/Consumers/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('FrontEnd/Consumers/assets/js/Customizable-Carousel-swipe-enabled.js') }}"></script>
  <script src="{{ asset('FrontEnd/Consumers/assets/js/bs-animation.js') }}"></script>
@stop
