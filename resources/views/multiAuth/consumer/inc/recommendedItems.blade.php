<!-- Recommended Items-->
<div class="mb-0" style="margin:30px -10px;">
    <div class="row" style="padding:0px;margin-bottom:10px;margin-right:0px;margin-left:0px;">
        <div class="col-5 align-self-center" style="padding:0px;">
            <h4 class="text-uppercase d-inline" style="margin:0px;color:rgba(33,37,41,0.8);">Recommended for me</h4>
        </div>
        <div class="col align-self-center" style="padding:0px;">
            <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
        </div>
    </div>
    <div class="row mt-0 mb-0 bg-white" style="margin-left:-5px;margin-right:-5px;">
        @foreach((new App\Models\MultiAuth\Consumer())->getRecommendation() as $recommended)
          <div class="col-3 border pl-0" style="padding:15px;height:200px;">
            <div class="row m-0">
              <div class="col">
                @if($recommended->getType() == 'car')
                  <a class="nav nav-link m-0 p-0" href="{{ route('find.car.details', $recommended->id) }}">
                @else
                  <a class="nav nav-link m-0 p-0" href="{{ route('find.part.details', $recommended->id) }}">
                @endif
                  <h5 class="text-capitalize" style="font-size:16px;font-family: 'Times New Roman', Times, serif;color:rgba(33,37,41,0.8);font-weight:normal;">{{$recommended->name}}</h5>
                </a>
              </div>
              <div class="col-3 text-center m-0 p-0">
                @if($recommended->getType() == 'car')
                  @if(Auth::check())
                    <a href="{{route('find.carHandling.form', ['form_type' => 'carBooking', 'car_id' => $recommended->id])}}" style="line-height:10px;font-size:10px;text-decoration:none;position:absolute;right:40px;top:-3px;" data-toggle="tooltip" data-placement="top" title="Book This Car" class="bg-primary text-white p-1 pt-0 pb-0 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">B</a>
                    <a href="{{route('find.carHandling.form', ['form_type' => 'carTesting', 'car_id' => $recommended->id])}}" style="line-height:10px;font-size:10px;text-decoration:none;position:absolute;right:20px;top:-3px;" data-toggle="tooltip" data-placement="top" title="Take it for a Test Drive" class="bg-primary text-white p-1 pt-0 pb-0 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">T</a>
                    <a href="{{route('find.carHandling.form', ['form_type' => 'carLoaning', 'car_id' => $recommended->id])}}" style="line-height:10px;font-size:10px;text-decoration:none;position:absolute;right:0px;top:-3px;" data-toggle="tooltip" data-placement="top" title="Apply for Car Loan" class="bg-primary text-white p-1 pt-0 pb-0 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">L</a>
                  @else
                    <button style="position:absolute;right:0px;top:-3px;"class="btn btn-link no-outline rounded-0 p-0 m-0" data-toggle="modal" data-target="#LoginModalCenter" type="button"><i class="fa fa-car"></i></button>
                  @endif
                @else
                  @if(Auth::check())
                    {!! Form::open(['action' => 'ModelControllers\CartController@store', 'method' => 'POST']) !!}
                        {{Form::hidden('consumer_id', Auth::id(), [])}}
                        {{Form::hidden('part_id', $recommended->id, [])}}
                        {{Form::number('quantity', 1, ['min' => 1, 'max' => $recommended->getTotalStock(), 'style' => 'width:40px;height:20px;position:absolute;right:20px;top:0px;'])}}
                        <button style="position:absolute;right:0px;top:-3px;" class="btn btn-link no-outline rounded-0 p-0 m-0" type="submit"><i class="fa fa-shopping-cart"></i></button>
                    {!! Form::close() !!}
                  @else
                    <button style="position:absolute;right:0px;top:-3px;" class="btn btn-link no-outline rounded-0 p-0 m-0" data-toggle="modal" data-target="#LoginModalCenter" type="button"><i class="fa fa-shopping-cart"></i></button>
                  @endif
                @endif
              </div>
            </div>
            <div class="row m-0">
              <div class="col-6" style="height:70px;position:absolute;bottom:10px;left:0px;">
                <h5 class="text-capitalize" style="font-size:16px;font-family: 'Times New Roman', Times, serif;color:rgba(33,37,41,0.8);font-weight:normal;"><span class="text-danger font-weight-bold">{{$recommended->getDiscount()}}</span></h5>
                <h6 class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$recommended->getNormalPrice()}}</h6>
                <p class="text-secondary" style="font-family: 'Times New Roman', Times, serif;font-size:13px;">{{$recommended->getTotalStock()}} Pieces Left</p>
              </div>
              <div class="col-6" style="height:90px;position:absolute;bottom:10px;right:0px;">
                @if($recommended->getType() == 'car')
                  <a class="nav nav-link m-0 p-0" href="{{ route('find.car.details', $recommended->id) }}">
                @else
                  <a class="nav nav-link m-0 p-0" href="{{ route('find.part.details', $recommended->id) }}">
                @endif
                  <img class="float-right m-0 p-0" src="{{url($recommended->getImage())}}" data-bs-hover-animate="pulse" style="height:90px;width:100%;object-fit:contain;">
                </a>
              </div>
            </div>
          </div>
        @endforeach
    </div>
</div>
