<!--Cart-->
<div class="hover-dropdown col p-0" style="background-color:rgba(179,179,179,0.22);cursor:pointer;">
  <div class="dropbtn no-outline p-0">
    <i class="fa fa-shopping-cart float-left mr-3 ml-2" style="cursor:pointer;font-size:30px;color:rgb(162,171,180);padding:5px;"></i>
    @guest
      <ul class="list-group list-group-flush p-0 m-0 inline-flex mt-3 text-left" style="font-size: 12px;">
        <li class="list-group-item border-top-0 m-0 p-0 font-weight-bold"style="background-color:transparent;">
          <a href="#" style="text-decoration:none;color:rgba(33,37,41,0.8);">0 Products</a>
        </li>
        <li class="list-group-item border-top-0 m-0 p-0 border-bottom-0 font-weight-bold" style="background-color:transparent;">
          <a href="#" style="text-decoration:none;color:rgba(33,37,41,0.8);">$ 0.00 USD</a>
        </li>
      </ul>
    @else
      <ul class="list-group list-group-flush p-0 m-0 inline-flex mt-3 text-left" style="font-size: 12px;">
        <li class="list-group-item border-top-0 m-0 p-0 font-weight-bold"style="background-color:transparent;">
          <a href="#" style="text-decoration:none;color:rgba(33,37,41,0.8);">{{Auth::user()->getTotalAmountProducts()}} Products</a>
        </li>
        <li class="list-group-item border-top-0 m-0 p-0 border-bottom-0 font-weight-bold" style="background-color:transparent;">
          <a href="#" style="text-decoration:none;color:rgba(33,37,41,0.8);">$ {{Auth::user()->getTotalCostPerCart()}} USD</a>
        </li>
      </ul>
    @endguest
  </div>

  <!--Cart dropdown-->
  <div class="hover-dropdown-content border p-0" style="right:0px;top:70px;width:350px; box-shadow: -3px 3px 12px #888888;">
    @guest
      <h5 class="border-bottom" style="font-family:'Times New Roman', Times, serif;margin:0px;padding:10px;background-color:#f5f5f5;">No Products</h5>
    @else
      @if(count(Auth::user()->getCartProducts()) <= 0)
        <h5 class="border-bottom" style="font-family:'Times New Roman', Times, serif;margin:0px;padding:10px;background-color:#f5f5f5;">No Products</h5>
      @else
        <div class="row m-0 border-bottom pb-0" style="font-family:'Times New Roman', Times, serif;margin:0px;padding:10px;background-color:#f5f5f5;">
          <div class="col-7">
            <h5>List of Products</h5>
          </div>
          <div class="col-5">
            {!!Form::open(['action' => ['ModelControllers\CartController@deleteAllfromCart', Auth::id()], 'method' => 'POST'])!!}
              {{Form::hidden('_method', 'DELETE')}}
              <a style="font-size:14px;"class="d-inline-flex float-right"onclick="this.parentNode.submit();" style="cursor:pointer;">
                <p>Clear Cart  <i class="fa fa-trash text-danger" style="font-size:20px;"></i></p>
              </a>
            {!!Form::close()!!}
          </div>
        </div>

        <!--Item List-->
        <div style="overflow-y: scroll; height:250px;">
          <ul class="list-group border-0">
            @foreach(Auth::user()->getCartProducts() as $product)
            <li class="list-group-item border border-left-0 border-right-0 p-2">
                <div class="row m-0">
                    <div class="col-1" style="padding:2px;">
                      <img src="{{url($product->getPart()->getImage())}}" style="width:100%;"/>
                    </div>
                    <div class="col-6" style="padding:2px;">
                        <p style="font-size:12px; font-family: 'Times New Roman', Times, serif;">{{$product->quantity.' X '.$product->getPart()->name}}</p>
                    </div>
                    <div class="col-5">
                        <div class="row">
                            <div style="font-size:14px; font-family:'Times New Roman', Times, serif;" class="col-12">{{$product->getTotalPartCost()}}</div>
                            <div style="font-size:14px; font-family:'Times New Roman', Times, serif;" class="col-8 text-danger">{{$product->getPart()->getDiscount()}}</div>
                            <div class="col-4">
                              {!!Form::open(['action' => ['ModelControllers\CartController@destroy', $product->id], 'method' => 'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                <a style="font-size:14px;" class="d-inline-flex"onclick="this.parentNode.submit();" style="cursor:pointer;">
                                  <i class="text-danger fa fa-trash float-right"></i>
                                </a>
                              {!!Form::close()!!}
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
          </ul>
        </div>
        <h6 class="p-1 border-top" style="font-family: 'Times New Roman', Times, serif; font-size:15px;padding:0px;margin-bottom:10px;color:rgba(33,37,41,0.8);">
          Total Cost : <span class="float-right mr-3" style="font-family: 'Times New Roman', Times, serif;">$ {{Auth::user()->getTotalCostPerCart()}} USD</span>
        </h6>
        <a href="#" data-toggle="modal" data-target="#PaymentModalCenter" class="btn btn-sm no-outline float-right btn-primary mb-2 mr-2 rounded-0">Go To Checkout</a>
      @endif
    @endguest
  </div>
</div>
