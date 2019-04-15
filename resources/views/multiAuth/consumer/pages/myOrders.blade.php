@extends('layout.consumer')

@section('title', Auth::user()->getFullName())

@section('content')
  @include('multiAuth.consumer.inc.navbar')
  <div class="content">
    <div class="text-secondary mt-5" style="margin:10px 60px;color:rgba(33,37,41,0.8);">
      <!-- part image and detail -->
      <div class="row mt-0" style="margin:10px 0px;">
          <div class="col" style="margin-right:10px;background-color:rgba(255,255,255,0);">
            <div class="row m-0 p-3" style="background-color:#ffffff;">
              <h6 class="mt-1 mb-3">All of your past Orders has been listed here Sorted by date</h6>
              <div id="accordion" style="width:100%;">
                <?php $i=0; ?>
                @foreach(Auth::user()->getInvoices() as $invoice)
                <?php $i++; ?>
                  <div class="card rounded-0 mb-2">
                    <div class="card-header p-1 pl-3" id="heading{{$invoice->id}}">
                      <h5 class="m-0 p-0">
                        <button class="p-0 m-0 btn btn-link collapsed" style="text-decoration:none;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;" data-toggle="collapse" data-target="#collapse{{$invoice->id}}" aria-expanded="true" aria-controls="collapse{{$invoice->id}}">
                            Purchased on <span class="font-weight-bold">{{Carbon\Carbon::parse($invoice->created_at)->toDateString()}}</span> at <span class="font-weight-bold">{{Carbon\Carbon::parse($invoice->created_at)->toTimeString()}}</span>
                        </button>
                      </h5>
                    </div>
                    @if($i == 1)
                    <div id="collapse{{$invoice->id}}" class="collapse show" aria-labelledby="heading{{$invoice->id}}" data-parent="#accordion">
                    @else
                    <div id="collapse{{$invoice->id}}" class="collapse" aria-labelledby="heading{{$invoice->id}}" data-parent="#accordion">
                    @endif
                      <div class="card-body p-0 m-0">
                        <table class="ml-auto mr-auto mt-3 mb-3" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;border-collapse:collapse;width:98%">
                          <tr>
                            <td style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-weight:bold;width:350px;border: 1px solid #c6c6c6;padding: 8px;">Items</td>
                            <td style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-weight:bold;width:100px;border: 1px solid #c6c6c6;padding: 8px;text-align:center;">Quantity</td>
                            <td style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-weight:bold;width:160px;border: 1px solid #c6c6c6;padding: 8px;">Price Per Piece</td>
                            <td style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-weight:bold;width:160px;border: 1px solid #c6c6c6;padding: 8px;">Cost</td>
                          </tr>

                          @foreach($invoice->getCartItems() as $cart)
                            <tr>
                              <td style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;width:350px;border: 1px solid #c6c6c6;padding: 8px;">
                                <a href="{{route('find.part.details', $cart->getPart()->id)}}" style="text-decoration:none;color:#969696;">
                                  <img src="{{url($cart->getPart()->getImage())}}" class="mr-2" style="width:10%;" alt=""><span style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;">{{$cart->getPart()->name}}</span>
                                </a>
                              </td>
                              <td style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;width:100px;border: 1px solid #c6c6c6;padding: 8px;text-align:center;">{{$cart->quantity}}</td>
                              <td style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;width:160px;border: 1px solid #c6c6c6;padding: 8px;">{{$cart->getPart()->getDiscountedPrice()}}</td>
                              <td style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;width:160px;border: 1px solid #c6c6c6;padding: 8px;">{{$cart->getTotalPartCost()}}</td>
                            </tr>
                          @endforeach

                          <tr>
                            <td style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-weight:bold;width:350px;border:1px solid #c6c6c6;border-right:0px;padding: 8px;">Total</td>
                            <td style="font-weight:bold;width:100px;border-bottom:1px solid #c6c6c6;padding: 8px;"></td>
                            <td style="font-weight:bold;width:160px;border-bottom:1px solid #c6c6c6;padding: 8px;"></td>
                            <td style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-weight:bold;width:160px;border:1px solid #c6c6c6;border-left:0px;padding: 8px;">$ {{$invoice->total_amount}} USD</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                @endforeach
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
