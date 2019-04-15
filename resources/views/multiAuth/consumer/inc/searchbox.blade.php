<?php
  $carmakers = App\Models\Product\CarMaker::inRandomOrder()->get();
  $partcategories = App\Models\Product\PartCategory::inRandomOrder()->get();
  $partmanufacturers = App\Models\Product\PartManufacturer::inRandomOrder()->get();
?>
<!--Search Engine-->
<div class="col-5">
    <div class="input-group border-top-0 border-right-0 border-left-0 border-bottom" style="margin-top:15px;">
      <div class="input-group-prepend">
        <!--Search Button-->
        <button class="btn bg-white rounded-0 no-outline">
          <span class="fa fa-search" style="opacity:.6;"></span>
        </button>
      </div>
      <input id="siteSearchInput" class="form-control no-outline border-0 p-1 pl-3 pr-3" style="font-size:13px;" type="text" placeholder="Search by Car, Maker, Model, Part, Category, Sub Category, or Manufacturer...">
    </div>
    <!--Search Items-->
    <div id="search_box" class="rounded-0 p-0 collapse bg-white border" id="searchBoxcollapse" style="box-shadow:0 2px 10px rgba(0, 0, 0, 0.5);position:absolute;top:75px;right:0px;width:644px;">
        <div id="searchlist" style="width:642px;">
            <ul class="nav nav-pills nav-fill rounded-0 mt-0 border-bottom" style="box-shadow:0 2px 10px rgba(0, 0, 0, 0.2);">
                <li class="nav-item rounded-0"><a role="tab" data-toggle="pill" href="#searchBoxTab-1" class="active nav-link rounded-0 p-1 m-0" style="text-decoration:none;">Car</a></li>
                <li class="nav-item rounded-0"><a role="tab" data-toggle="pill" href="#searchBoxTab-2" class="nav-link rounded-0 p-1 m-0" style="text-decoration:none;">Maker</a></li>
                <li class="nav-item rounded-0"><a role="tab" data-toggle="pill" href="#searchBoxTab-3" class="nav-link rounded-0 p-1 m-0" style="text-decoration:none;">Model</a></li>
                <li class="nav-item rounded-0"><a role="tab" data-toggle="pill" href="#searchBoxTab-4" class="nav-link rounded-0 p-1 m-0" style="text-decoration:none;">Part</a></li>
                <li class="nav-item rounded-0"><a role="tab" data-toggle="pill" href="#searchBoxTab-5" class="nav-link rounded-0 p-1 m-0" style="text-decoration:none;">Category</a></li>
                <li class="nav-item rounded-0"><a role="tab" data-toggle="pill" href="#searchBoxTab-6" class="nav-link rounded-0 p-1 m-0" style="text-decoration:none;">Sub Category</a></li>
                <li class="nav-item rounded-0"><a role="tab" data-toggle="pill" href="#searchBoxTab-7" class="nav-link rounded-0 p-1 m-0" style="text-decoration:none;">Manufacturer</a></li>
            </ul>
            <div class="tab-content rounded-0 p-2"  style="overflow-y: scroll; height:450px;">
                <div role="tabpanel" class="tab-pane rounded-0 active" id="searchBoxTab-1">
                  @foreach($carmakers as $carmaker)
                    @foreach($carmaker->getModels() as $carmodel)
                      @foreach($carmodel->getCars() as $car)
                        <div id="slist" class="row m-0 p-2 pl-0 pr-0 mt-1 mb-1 border rounded-0 bg-light">
                          <div class="col-2 p-0">
                            <a class="text-dark" href="{{ route('find.car.details', $car->id)}}" style="text-decoration:none;">
                            <img class="m-0 p-0"src="{{url($car->getImage())}}" alt="" style="width:100%; object-fit:contain;">
                            </a>
                          </div>
                          <div class="col-6">
                            <a class="text-dark" href="{{ route('find.car.details', $car->id)}}" style="text-decoration:none;">
                            <p class="m-0 p-0"style="font-size:15px;font-family:'Times New Roman', Times, serif;">{{$car->name}}</p>
                            <p class="m-0 p-0"style="font-size:12px;font-family:'Times New Roman', Times, serif;">{{$car->getNormalPrice()}}</p>
                            <p class="m-0 p-0"style="font-size:12px;font-family:'Times New Roman', Times, serif;">{{$car->getTotalStock()}} Units Left</p>
                            </a>
                          </div>
                          <div class="col-2">
                            <a class="text-dark" href="{{ route('find.car.details', $car->id)}}" style="text-decoration:none;">
                            <p class="text-danger" style="font-size:20px;font-family:'Times New Roman', Times, serif;">{{$car->getDiscount()}}</p>
                            </a>
                          </div>
                          <div class="col p-0">
                            @if(Auth::check())
                            <table class="m-0 p-0 float-right">
                              <tr class="m-0 p-0">
                                <td class="m-0 p-0">
                                  <a href="{{route('find.carHandling.form', ['form_type' => 'carBooking', 'car_id' => $car->id])}}" style="width:50px;font-size:10px;line-height:8px;text-decoration:none;" data-toggle="tooltip" data-placement="top" title="Book This Car" class="bg-primary text-white p-1 pt-0 pb-0 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">Book</a>
                                </td>
                              </tr>
                              <tr class="m-0 p-0">
                                <td class="m-0 p-0">
                                  <a href="{{route('find.carHandling.form', ['form_type' => 'carTesting', 'car_id' => $car->id])}}" style="width:50px;font-size:10px;line-height:8px;text-decoration:none;" data-toggle="tooltip" data-placement="top" title="Take it for a Test Drive" class="bg-primary text-white p-1 pt-0 pb-0 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">Test</a>
                                </td>
                              </tr>
                              <tr class="m-0 p-0">
                                <td class="m-0 p-0">
                                  <a href="{{route('find.carHandling.form', ['form_type' => 'carLoaning', 'car_id' => $car->id])}}" style="width:50px;font-size:10px;line-height:8px;text-decoration:none;" data-toggle="tooltip" data-placement="top" title="Apply for Car Loan" class="bg-primary text-white p-1 pt-0 pb-0 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">Loan</a>
                                </td>
                              </tr>
                            </table>
                            @else
                              <button style="position:absolute;right:0px;top:-3px;"class="btn btn-link no-outline rounded-0 p-0 m-0" data-toggle="modal" data-target="#LoginModalCenter" type="button"><i class="fa fa-car"></i></button>
                            @endif
                          </div>
                        </div>
                      @endforeach
                    @endforeach
                  @endforeach
                </div>
                <div role="tabpanel" class="tab-pane rounded-0" id="searchBoxTab-2">
                  @foreach($carmakers as $carmaker)
                    <a id="slist" class="text-dark" href="{{ route('find.car.maker', $carmaker->id)}}" style="text-decoration:none;">
                      <div class="row m-0 p-2 pl-0 pr-0 mt-1 mb-1 border rounded-0 bg-light">
                        <div class="col-2 p-0">
                          <img class="m-0 p-0"src="{{url($carmaker->getLogo())}}" alt="" style="width:100%; object-fit:contain;">
                        </div>
                        <div class="col">
                          <p class="m-0 p-0"style="font-size:18px;font-family:'Times New Roman', Times, serif;">{{$carmaker->name}}</p>
                          <p class="m-0 p-0"style="font-size:12px;font-family:'Times New Roman', Times, serif;">{{$carmaker->details}}</p>
                        </div>
                      </div>
                    </a>
                  @endforeach
                </div>
                <div role="tabpanel" class="tab-pane rounded-0" id="searchBoxTab-3">
                  @foreach($carmakers as $carmaker)
                    @foreach($carmaker->getModels() as $carmodel)
                      <a id="slist" class="text-dark" href="{{ route('find.car.model', $carmodel->id)}}" style="text-decoration:none;">
                        <div class="row m-0 p-2 pl-0 pr-0 mt-1 mb-1 border rounded-0 bg-light">
                          <div class="col-2 p-0">
                            <img class="m-0 p-0"src="{{url($carmodel->getImage())}}" alt="" style="width:100%; height:70px; object-fit:contain;">
                          </div>
                          <div class="col">
                            <p class="m-0 p-0"style="font-size:15px;font-family:'Times New Roman', Times, serif;">{{$carmodel->name}}</p>
                            <p class="m-0 p-0"style="font-size:12px;font-family:'Times New Roman', Times, serif;">{{$carmodel->details}}</p>
                          </div>
                        </div>
                      </a>
                    @endforeach
                  @endforeach
                </div>
                <div role="tabpanel" class="tab-pane rounded-0" id="searchBoxTab-4">
                  @foreach($partcategories as $partcategory)
                    @foreach($partcategory->getSubCategories() as $partsubcategory)
                      @foreach($partsubcategory->getParts() as $part)
                        <div id="slist" class="row m-0 p-2 pl-0 pr-0 mt-1 mb-1 border rounded-0 bg-light">
                          <div class="col-2 p-0">
                            <a class="text-dark" href="{{ route('find.part.details', $part->id)}}" style="text-decoration:none;">
                              <img class="m-0 p-0"src="{{url($part->getImage())}}" alt="" style="width:100%; height:70px; object-fit:contain;">
                            </a>
                          </div>
                          <div class="col-6">
                            <a class="text-dark" href="{{ route('find.part.details', $part->id)}}" style="text-decoration:none;">
                              <p class="m-0 p-0"style="font-size:15px;font-family:'Times New Roman', Times, serif;">{{$part->name}}</p>
                              <p class="m-0 p-0"style="font-size:12px;font-family:'Times New Roman', Times, serif;">{{$part->getNormalPrice()}}</p>
                              <p class="m-0 p-0"style="font-size:12px;font-family:'Times New Roman', Times, serif;">{{$part->getTotalStock()}} Pieces Left</p>
                            </a>
                          </div>
                          <div class="col-2">
                            <a class="text-dark" href="{{ route('find.part.details', $part->id)}}" style="text-decoration:none;">
                              <p class="text-danger" style="font-size:20px;font-family:'Times New Roman', Times, serif;">{{$part->getDiscount()}}</p>
                            </a>
                          </div>
                          <div class="col">
                            @if(Auth::check())
                              {!! Form::open(['action' => 'ModelControllers\CartController@store', 'method' => 'POST']) !!}
                                  {{Form::hidden('consumer_id', Auth::id(), [])}}
                                  {{Form::hidden('part_id', $part->id, [])}}
                                  {{Form::number('quantity', 1, ['min' => 1, 'max' => $part->getTotalStock(), 'style' => 'width:40px;height:20px;'])}}
                                  <button style="" class="float-right btn btn-link no-outline rounded-0 p-0 m-0" type="submit"><i class="fa fa-shopping-cart"></i></button>
                              {!! Form::close() !!}
                            @else
                              <button style="" class="float-right btn btn-link no-outline rounded-0 p-0 m-0" data-toggle="modal" data-target="#LoginModalCenter" type="button"><i class="fa fa-shopping-cart"></i></button>
                            @endif
                          </div>
                        </div>
                      @endforeach
                    @endforeach
                  @endforeach
                </div>
                <div role="tabpanel" class="tab-pane rounded-0" id="searchBoxTab-5">
                  @foreach($partcategories as $partcategory)
                    <a id="slist" class="text-dark" href="{{ route('find.part.category', $partcategory->id)}}" style="text-decoration:none;">
                      <div class="row m-0 p-2 pl-0 pr-0 mt-1 mb-1 border rounded-0 bg-light">
                        <div class="col-2 p-0">
                          <img class="m-0 p-0"src="{{url($partcategory->getImage())}}" alt="" style="width:100%; height:80px;object-fit:contain;">
                        </div>
                        <div class="col">
                          <p class="m-0 p-0"style="font-size:18px;font-family:'Times New Roman', Times, serif;">{{$partcategory->name}}</p>
                          <p class="m-0 p-0"style="font-size:12px;font-family:'Times New Roman', Times, serif;">{{substr($partcategory->details, 0, 200)}}...</p>
                        </div>
                      </div>
                    </a>
                  @endforeach
                </div>
                <div role="tabpanel" class="tab-pane rounded-0" id="searchBoxTab-6">
                  @foreach($partcategories as $partcategory)
                    @foreach($partcategory->getSubCategories() as $partsubcategory)
                      <a id="slist" class="text-dark" href="{{ route('find.part.subCategory', $partsubcategory->id)}}" style="text-decoration:none;">
                        <div class="row m-0 p-2 pl-0 pr-0 mt-1 mb-1 border rounded-0 bg-light">
                          <div class="col-2 p-0">
                            <img class="m-0 p-0"src="{{url($partsubcategory->getImage())}}" alt="" style="width:100%; height:80px;object-fit:contain;">
                          </div>
                          <div class="col">
                            <p class="m-0 p-0"style="font-size:18px;font-family:'Times New Roman', Times, serif;">{{$partsubcategory->name}}</p>
                            <p class="m-0 p-0"style="font-size:12px;font-family:'Times New Roman', Times, serif;">{{substr($partsubcategory->details, 0, 200)}}...</p>
                          </div>
                        </div>
                      </a>
                    @endforeach
                  @endforeach
                </div>
                <div role="tabpanel" class="tab-pane rounded-0" id="searchBoxTab-7">
                  @foreach($partmanufacturers as $partmanufacturer)
                    <a id="slist" class="text-dark" href="{{ route('find.part.manufacturer', $partmanufacturer->id)}}" style="text-decoration:none;">
                      <div class="row m-0 p-2 pl-0 pr-0 mt-1 mb-1 border rounded-0 bg-light">
                        <div class="col-2 p-0">
                          <img class="m-0 p-0"src="{{url($partmanufacturer->getLogo())}}" alt="" style="width:100%; height:80px;object-fit:contain;">
                        </div>
                        <div class="col">
                          <p class="m-0 p-0"style="font-size:18px;font-family:'Times New Roman', Times, serif;">{{$partmanufacturer->name}}</p>
                          <p class="m-0 p-0"style="font-size:12px;font-family:'Times New Roman', Times, serif;">{{substr($partmanufacturer->details, 0, 200)}}...</p>
                        </div>
                      </div>
                    </a>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
