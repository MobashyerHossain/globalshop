@extends('layout.consumer')

@section('title', 'Home')

@section('content')
  @include('multiAuth.consumer.inc.navbar')
  <div class="content">
    <!-- Carousal Banner -->
    @include('multiAuth.consumer.inc.carousal_banner')

    <div style="margin:30px 60px;">
        <!-- Individual Car makers -->
        <div class="m-0 p-0">
          <!-- Seperator -->
          <div class="row mt-4 mb-0 p-0 m-0">
              <div class="col align-self-center" style="padding:0px;">
                  <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
              </div>
              <div class="col-3 align-self-center text-center" style="padding:0px;">
                  <h2 class="text-uppercase d-inline" style="margin:0px;color:rgba(33,37,41,0.8);">Cars</h2>
              </div>
              <div class="col align-self-center" style="padding:0px;">
                  <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
              </div>
          </div>

          <!-- Car Makers -->
          @foreach($carmakers as $carmaker)
          <div style="margin:30px 0px;">
              <!-- categories header -->
              <div class="row" style="padding:0px;margin-bottom:10px;margin-right:0px;margin-left:0px;">
                  <div class="col-3 align-self-center" style="padding:0px;">
                      <h4 class="text-uppercase d-inline" style="margin:0px;color:rgba(33,37,41,0.8);">{{$carmaker->name}}</h4>
                  </div>
                  <div class="col align-self-center" style="padding:0px;">
                      <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
                  </div>
              </div>

              <!-- category show -->
              <div class="row" style="margin:0px;background-color:#ffffff;padding:0px;">
                  <!-- category image -->
                    <div class="col-2" style="">
                      <a href="{{route('find.car.maker', $carmaker->id)}}">
                        <img class="m-0 p-0" src="{{url($carmaker->getLogo())}}" style="width:100%; height:100%; object-fit:contain;" alt="">
                      </a>
                    </div>

                  <!-- sub categories -->
                  <div class="col">
                      <div class="row">
                          @foreach($carmaker->getModels() as $carmodel)
                            <div class="col-3 border" style="padding:15px;position:relative;height:200px;">
                              <a class="nav nav-link m-0 p-0" href="{{ route('find.car.model', $carmodel->id) }}">
                                <h5 class="text-capitalize" style="font-size:16px;color:rgba(33,37,41,0.8);font-weight:normal;">{{$carmodel->name}}</h5>
                                <img class="float-right" src="{{url($carmodel->getImage())}}" data-bs-hover-animate="pulse" style="position:absolute;bottom:10px;right:10px;height:100px;">
                              </a>
                            </div>
                          @endforeach
                          <!-- coming soon -->
                          <div class="col border text-truncate" style="padding:15px;position:relative;height:200px;">
                            <table style="height:100%; width:100%">
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

        <!-- Individual Part Categories -->
        <div class="m-0 p-0">
          <!-- Seperator -->
          <div class="row mt-4 mb-0 p-0 m-0">
              <div class="col align-self-center" style="padding:0px;">
                  <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
              </div>
              <div class="col-3 align-self-center text-center" style="padding:0px;">
                  <h2 class="text-uppercase d-inline" style="margin:0px;color:rgba(33,37,41,0.8);">Spare Parts</h2>
              </div>
              <div class="col align-self-center" style="padding:0px;">
                  <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
              </div>
          </div>

          <!-- Part Categories -->
          @foreach($partcategories as $partcategory)
          <div style="margin:30px 0px;">
              <!-- categories header -->
              <div class="row" style="padding:0px;margin-bottom:10px;margin-right:0px;margin-left:0px;">
                  <div class="col-3 align-self-center" style="padding:0px;">
                      <h4 class="text-uppercase d-inline" style="margin:0px;color:rgba(33,37,41,0.8);">{{$partcategory->name}}</h4>
                  </div>
                  <div class="col align-self-center" style="padding:0px;">
                      <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
                  </div>
              </div>

              <!-- category show -->
              <div class="row" style="margin:0px;background-color:#ffffff;padding:0px;">
                  <!-- category image -->
                  <div class="col-2">
                      <a href="{{route('find.part.category', $partcategory->id)}}">
                        <img class="m-0 p-0" src="{{url($partcategory->getImage())}}" style="width:100%; height:100%; object-fit:contain;" alt="">
                      </a>
                  </div>

                  <!-- sub categories -->
                  <div class="col">
                      <div class="row">
                          @foreach($partcategory->getSubCategories() as $partsubcategory)
                          <div class="col border-left" style="padding:15px;position:relative;height:200px;">
                            <a class="nav nav-link m-0 p-0" href="{{ route('find.part.subCategory', $partsubcategory->id) }}">
                              <h5 class="text-capitalize" style="color:rgba(33,37,41,0.8);font-weight:normal;">{{$partsubcategory->name}}</h5>
                              <img class="float-right m-2 text-bottom" src="{{url($partsubcategory->getImage())}}" data-bs-hover-animate="pulse" style="position:absolute;bottom:10px;right:10px;height:100px;">
                            </a>
                          </div>
                          @endforeach
                          <!-- coming soon -->
                          <div class="col border-left" style="padding:15px;position:relative;height:200px;">
                            <table style="height: 100%; width:100%">
                              <tbody>
                                <tr>
                                  <td class="align-middle">
                                    <h4 class="text-capitalize text-center" style="color:rgba(33,37,41,0.8);">More<br>Coming Soon</h4>
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
        <div class="" style="margin: 0px 15px;">
          @include('multiAuth.consumer.inc.recommendedItems')
        </div>

        <!-- My recent viewed Items-->
        @if(Auth::check())
          @if(count(Auth::user()->getMyRecentViewedItems()) > 0)
            <div style="margin:30px 0px;" class="mb-0">
                <div class="row" style="padding:0px;margin-bottom:10px;margin-right:0px;margin-left:0px;">
                    <div class="col-4 align-self-center" style="padding:0px;">
                        <h4 class="text-uppercase d-inline" style="margin:0px;color:rgba(33,37,41,0.8);">my recently viewed items</h4>
                    </div>
                    <div class="col align-self-center" style="padding:0px;">
                        <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
                    </div>
                </div>
                <div class="row" style="background-color:#ffffff;margin:0px;">
                  @foreach(Auth::user()->getMyRecentViewedItems() as $RecentView)
                    <div class="col-2 border rounded-0" style="padding:10px;margin:0px;background-color:transparent;cursor:pointer;">
                      @if($RecentView->getProduct()->getType() == 'car')
                        <a class="" href="{{ route('find.car.details', $RecentView->getProduct()->id) }}" style="text-decoration:none;">
                      @else
                        <a class="" href="{{ route('find.part.details', $RecentView->getProduct()->id) }}" style="text-decoration:none;">
                      @endif
                          <img src="{{url($RecentView->getProduct()->getImage())}}" style="height:120px; width:100%; object-fit:contain;">
                        </a>
                    </div>
                  @endforeach
                </div>
            </div>
          @endif
        @endif

        <!-- Car maker logo and Part manufacturers logo-->
        <div class="row mt-4 mb-0" style="margin:0px;">
            <!-- Car maker logo -->
            <div class="col" style="padding:0px;margin-right:10px;">
                <div style="margin:5px 0px;">
                    <!-- header-->
                    <div class="row" style="padding:0px;margin-bottom:10px;margin-right:0px;margin-left:0px;">
                        <div class="col align-self-center" style="padding:0px;">
                            <h4 class="text-uppercase d-inline" style="margin:0px;color:rgba(33,37,41,0.8);">find car by makers</h4>
                        </div>
                        <div class="col align-self-center" style="padding:0px;">
                            <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
                        </div>
                    </div>

                    <!-- content-->
                    <div class="row" style="background-color:transparent;margin:0px;">
                        @foreach($carmakers as $carmaker)
                          <div class="col-2" style="margin:0px;background-color:transparent;cursor:pointer;padding:10px;">
                            <a href="{{route('find.car.maker', $carmaker->id)}}">
                              <img class="justify-content-center" src="{{url($carmaker->getLogo())}}" data-bs-hover-animate="pulse" style="width:100%;height:100%;object-fit:contain;">
                            </a>
                          </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Part manufacturers logo-->
            <div class="col" style="margin-left:10px;padding:0px;">
                <div style="margin:5px 0px;">
                    <div class="row" style="padding:0px;margin-bottom:10px;margin-right:0px;margin-left:0px;">
                        <div class="col-8 align-self-center" style="padding:0px;">
                            <h4 class="text-uppercase d-inline" style="margin:0px;color:rgba(33,37,41,0.8);">find part by manufacturers</h4>
                        </div>
                        <div class="col align-self-center" style="padding:0px;">
                            <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
                        </div>
                    </div>
                    <div class="row" style="background-color:transparent;margin:0px;">
                        @foreach($partmanufacturers as $partmanufacturer)
                          <div class="col-2" style="margin:0px;background-color:transparent;cursor:pointer;padding:10px;">
                            <a href="{{ route('find.part.manufacturer', $partmanufacturer->id)}}">
                              <img class="justify-content-center" src="{{url($partmanufacturer->getLogo())}}" data-bs-hover-animate="pulse" style="width:100%;height:100%;object-fit:contain;">
                            </a>
                          </div>
                        @endforeach
                    </div>
                </div>
            </div>
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
