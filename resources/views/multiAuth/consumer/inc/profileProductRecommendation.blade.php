<!-- Recommendation -->
<div class="col-3" style="margin-left:10px;background-color:#ffffff;padding:0px 10px;">
  <h6 style="margin:10px 0px;">Recommendations</h6>
  <ul class="list-group list-group-flush">
    @foreach((new App\Models\MultiAuth\Consumer())->getRecommendation() as $recommendedProduct)
      @if($recommendedProduct->getType() == 'car')
        <li class="list-group-item"style="padding:0px 0px;">
          <div class="row" style="margin:5px 0px;">
              <div class="col-3 m-0" style="padding:5px;">
                <a class="nav nav-link m-0 p-0" href="{{ route('find.car.details', $recommendedProduct->id) }}">
                  <img src="{{ url($recommendedProduct->getImage())}}" class="border-0" style="width:100%;"><br>
                </a>
                <a href="{{route('find.carHandling.form', ['form_type' => 'carBooking', 'car_id' => $recommendedProduct->id])}}" style="line-height:8px;text-decoration:none;font-size:12px;" data-toggle="tooltip" data-placement="top" title="Book This Car" class="bg-primary text-white p-1 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">B</a>
                <a href="{{route('find.carHandling.form', ['form_type' => 'carTesting', 'car_id' => $recommendedProduct->id])}}" style="line-height:8px;text-decoration:none;font-size:12px;" data-toggle="tooltip" data-placement="top" title="Take it for a Test Drive" class="bg-primary text-white p-1 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">T</a>
                <a href="{{route('find.carHandling.form', ['form_type' => 'carLoaning', 'car_id' => $recommendedProduct->id])}}" style="line-height:8px;text-decoration:none;font-size:12px;" data-toggle="tooltip" data-placement="top" title="Apply for Car Loan" class="bg-primary text-white p-1 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">L</a>
              </div>
              <div class="col m-0" style="padding:5px;">
                <a class="nav nav-link m-0 p-0" href="{{ route('find.car.details', $recommendedProduct->id) }}">
                  <p class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$recommendedProduct->getShortedName(30)}}</p>
                  <p class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$recommendedProduct->getNormalPrice()}}</p>
                  <p class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$recommendedProduct->getTotalStock()}} Pieces Available</p>
                </a>
              </div>
          </div>
        </li>
      @else
        <li class="list-group-item"style="padding:0px 0px;">
          <div class="row" style="margin:5px 0px;">
              <div class="col-3" style="padding:5px;">
                <a class="nav nav-link m-0 p-0" href="{{ route('find.part.details', $recommendedProduct->id) }}">
                  <img src="{{ url($recommendedProduct->getImage())}}" class="border-0" style="width:100%;">
                </a>
              </div>
              <div class="col" style="padding:5px;">
                <a class="nav nav-link m-0 p-0" href="{{ route('find.part.details', $recommendedProduct->id) }}">
                  <p class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$recommendedProduct->getShortedName(20)}}</p>
                  <p class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$recommendedProduct->getNormalPrice()}}</p>
                  <p class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$recommendedProduct->getTotalStock()}} Pieces Left</p>
                </a>
              </div>
              <div class="col-2">
                {!! Form::open(['action' => 'ModelControllers\CartController@store', 'method' => 'POST']) !!}
                    {{Form::hidden('consumer_id', Auth::id(), [])}}
                    {{Form::hidden('part_id', $recommendedProduct->id, [])}}
                    {{Form::number('quantity', 1, ['min' => 1, 'max' => $recommendedProduct->getTotalStock(), 'style' => 'width:40px;height:20px;position:absolute;right:20px;top:3px;'])}}
                    <button style="position:absolute; right:0px;"class="btn btn-link no-outline rounded-0 p-0 m-0" type="submit"><i class="fa fa-shopping-cart"></i></button>
                {!! Form::close() !!}
              </div>
          </div>
        </li>
      @endif
    @endforeach
  </ul>
</div>
