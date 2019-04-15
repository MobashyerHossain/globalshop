<!-- You may also like -->
<div class="col-3" style="margin-left:10px;background-color:#ffffff;padding:0px 10px;">
    <h6 style="margin:10px 0px;">You May Like</h6>
    <ul class="list-group list-group-flush">
      @foreach($car->getModel()->getMaker()->getModels() as $carmodel)
          @foreach($carmodel->getCars() as $morecar)
            @if($morecar->id != $car->id)
            <li class="list-group-item"style="padding:0px 0px;">
              <div class="row" style="margin:5px 0px;">
                  <div class="col-3 m-0" style="padding:5px;">
                    <a class="nav nav-link m-0 p-0" href="{{ route('find.car.details', $morecar->id) }}">
                      <img src="{{ url($morecar->getImage())}}" class="border-0" style="width:100%;"><br>
                    </a>
                    @if(Auth::check())
                      <a href="{{route('find.carHandling.form', ['form_type' => 'carBooking', 'car_id' => $morecar->id])}}" style="line-height:8px;text-decoration:none;font-size:12px;" data-toggle="tooltip" data-placement="top" title="Book This Car" class="bg-primary text-white p-1 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">B</a>
                      <a href="{{route('find.carHandling.form', ['form_type' => 'carTesting', 'car_id' => $morecar->id])}}" style="line-height:8px;text-decoration:none;font-size:12px;" data-toggle="tooltip" data-placement="top" title="Take it for a Test Drive" class="bg-primary text-white p-1 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">T</a>
                      <a href="{{route('find.carHandling.form', ['form_type' => 'carLoaning', 'car_id' => $morecar->id])}}" style="line-height:8px;text-decoration:none;font-size:12px;" data-toggle="tooltip" data-placement="top" title="Apply for Car Loan" class="bg-primary text-white p-1 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">L</a>
                    @else
                      <button class="btn btn-link no-outline rounded-0 p-0 m-0" data-toggle="modal" data-target="#LoginModalCenter" type="button"><i class="fa fa-car"></i></button>
                    @endif
                  </div>
                  <div class="col m-0" style="padding:5px;">
                    <a class="nav nav-link m-0 p-0" href="{{ route('find.car.details', $morecar->id) }}">
                      <p class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$morecar->getShortedName(30)}}</p>
                      <p class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$morecar->getNormalPrice()}}</p>
                      <p class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$morecar->getTotalStock()}} Pieces Available</p>
                    </a>
                  </div>
              </div>
            </li>
            @endif
          @endforeach
      @endforeach
    </ul>
</div>
