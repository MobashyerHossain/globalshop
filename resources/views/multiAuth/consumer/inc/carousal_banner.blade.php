<div id="banner_carousel" class="carousel slide" data-ride="carousel" data-interval="3000">
    <div class="carousel-inner" role="listbox" style="background-image:url('{{$banner_car->getModel()->getImage()}}');background-repeat:no-repeat;background-size:cover;height:500px;background-position:top;">
      <div class="row m-0 p-0">
        <div class="col-3 d-none d-md-block m-0 p-0" style="position: relative;">
          <!-- category col -->
          <div class="p-3 w-75" style="position: absolute; top: 30%;background-color:rgba(0,0,0,0.24);">
              <div class="row" style="padding:0px;margin-bottom:0px;">
                  <div class="col-12">
                    <span class="fa fa-list d-inline-flex mr-2 text-light" style="font-size:20px;"></span>
                    <h6 class="text-light d-inline-flex m-0" style="font-size:20px;line-height:15px;color:rgba(33,37,41,0.8);">Categories</h6>
                  </div>
              </div>

              <div class="row">
                  <div class="col-12 text-light">
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item p-0 m-0 pl-3 bg-transparent">
                            <span class="d-inline-flex text-light"><i class="fa fa-caret-right" style="margin-right:15px;"></i></span>
                            <a class="d-inline-flex nav-link text-light" href="#" style="padding:8px 0px;color:rgba(33,37,41,0.8);font-size:16px;" data-toggle="collapse" data-target="#carmakercollapse" aria-expanded="false" aria-controls="carmakercollapse">Cars</a>
                          </li>
                          @foreach($partcategories as $partcategory)
                            <li class="list-group-item p-0 m-0 pl-3 bg-transparent">
                              <span class="d-inline-flex text-light"><i class="fa fa-caret-right" style="margin-right:15px;"></i></span>
                              <a class="d-inline-flex nav-link text-light" href="#" style="padding:8px 0px;color:rgba(33,37,41,0.8);font-size:16px;" data-toggle="collapse" data-target="#part{{$partcategory->id}}collapse" aria-expanded="false" aria-controls="part{{$partcategory->id}}collapse">{{$partcategory->name}}</a>
                            </li>
                          @endforeach
                      </ul>
                  </div>
              </div>
          </div>
        </div>

        <div class="col-md-6 col-12">
          <div class="carousel-item active">
              <div class="jumbotron" style="background-color:transparent;padding-top:40px;">
                  <h1 class="text-center text-capitalize" style="color:rgb(255,255,255);">Want a test Drive</h1>
                  <p class="text-center">
                    @if(Auth::check())
                      <a class="btn btn-primary rounded-0 border-0 no-outline" role="button" href="{{route('find.carHandling.form', ['form_type' => 'carTesting', 'car_id' => $banner_car->id])}}" style="background-color:#1ca8d5;">Reserve Now</a>
                    @else
                      <a class="btn btn-primary rounded-0 border-0 no-outline" role="button" href="" data-toggle="modal" data-target="#LoginModalCenter" style="background-color:#1ca8d5;">Reserve Now</a>
                    @endif
                    <span class="d-flex justify-content-center text-justify" style="color:rgb(255,255,255);font-size:20px;">The new Lamborghini Centenario</span>
                  </p>
              </div>
          </div>
          <div class="carousel-item">
              <div class="jumbotron" style="background-color:transparent;padding-top:40px;">
                  <h1 class="text-center text-capitalize" style="color:rgb(255,255,255);">Want to Buy This Car</h1>
                  <p class="text-center">
                    @if(Auth::check())
                      <a class="btn btn-primary rounded-0 border-0 no-outline" role="button" href="{{route('find.carHandling.form', ['form_type' => 'carBooking', 'car_id' => $banner_car->id])}}" style="background-color:#1ca8d5;">Book It Now</a>
                    @else
                      <a class="btn btn-primary rounded-0 border-0 no-outline" role="button" href="" data-toggle="modal" data-target="#LoginModalCenter" style="background-color:#1ca8d5;">Book It Now</a>
                    @endif
                    <span class="d-flex justify-content-center text-justify" style="color:rgb(255,255,255);font-size:20px;">If not, there are 100's of mode cars to choose from</span>
                  </p>
              </div>
          </div>
          <div class="carousel-item">
              <div class="jumbotron" style="background-color:transparent;padding-top:40px;">
                  <h1 class="text-center text-capitalize" style="color:rgb(255,255,255);">Short of funds</h1>
                  <p class="text-center">
                    @if(Auth::check())
                      <a class="btn btn-primary rounded-0 border-0 no-outline" role="button" href="{{route('find.carHandling.form', ['form_type' => 'carLoaning', 'car_id' => $banner_car->id])}}" style="background-color:#1ca8d5;">Apply for Loan</a>
                    @else
                      <a class="btn btn-primary rounded-0 border-0 no-outline" role="button" href="" data-toggle="modal" data-target="#LoginModalCenter" style="background-color:#1ca8d5;">Apply for Loan</a>
                    @endif
                    <span class="d-flex justify-content-center text-justify" style="color:rgb(255,255,255);font-size:15px;">Is the shortage of capital keeping you from buying Your Dream Car?</span>
                    <span class="d-flex justify-content-center text-justify" style="color:rgb(255,255,255);font-size:15px;">No need to worry we provide the perfect car loan facility</span>
                  </p>
              </div>
          </div>
        </div>

        <div class="col-3 d-none d-md-block">
        <!-- subcategory col -->
          <!-- car makers col -->
          <div class="p-3 w-75 collapse multi-collapse" id="carmakercollapse" style="position: absolute;top:30%;right:0px;background-color:rgba(0,0,0,0.24);">
              <div class="row" style="padding:0px;margin-bottom:0px;">
                  <div class="col-12">
                    <span class="fa fa-list d-inline-flex mr-2 text-light" style="font-size:20px;"></span>
                    <h6 class="text-light d-inline-flex m-0" style="font-size:20px;line-height:15px;color:rgba(33,37,41,0.8);">Car Makers</h6>
                  </div>
              </div>

              <div class="row">
                  <div class="col-12 text-light">
                    <div id="accordion">
                      <ul class="list-group list-group-flush">
                          @foreach($carmakers as $carmaker)
                            <li class="list-group-item p-0 m-0 pl-3 bg-transparent">
                              <span class="d-inline-flex text-light"><i class="fa fa-caret-right" style="margin-right:15px;"></i></span>
                              <a class="d-inline-flex nav-link text-light" href="#" style="padding:8px 0px;color:rgba(33,37,41,0.8);font-size:16px;" data-toggle="collapse" data-target="#collapse{{$carmaker->id}}" aria-expanded="true" aria-controls="collapse{{$carmaker->id}}">{{$carmaker->name}}</a>

                              <div id="collapse{{$carmaker->id}}" class="collapse" aria-labelledby="heading{{$carmaker->id}}" data-parent="#accordion">
                                <ul class="list-group list-group-flush">
                                    @foreach($carmaker->getModels() as $carmodel)
                                      <li class="list-group-item p-0 m-0 pl-3 bg-transparent">
                                        <span class="d-inline-flex text-light"><i class="fa fa-caret-right" style="margin-right:15px;"></i></span>
                                        <a class="d-inline-flex nav-link text-light" href="{{ route('find.car.model',$carmodel->id) }}" style="padding:8px 0px;color:rgba(33,37,41,0.8);font-size:12px;">{{$carmodel->getShortedName(20)}}</a>
                                      </li>
                                    @endforeach
                                </ul>
                              </div>
                            </li>
                          @endforeach
                      </ul>
                    </div>
                  </div>
              </div>
          </div>
          <!-- part subcategory col -->
          @foreach($partcategories as $partcategory)
          <div class="p-3 w-75 collapse multi-collapse" id="part{{$partcategory->id}}collapse" style="position: absolute;top:50%;right:0px;background-color:rgba(0,0,0,0.24);">
              <div class="row" style="padding:0px;margin-bottom:0px;">
                  <div class="col-12">
                    <span class="fa fa-list d-inline-flex mr-2 text-light" style="font-size:20px;"></span>
                    <h6 class="text-light d-inline-flex m-0" style="font-size:20px;line-height:15px;color:rgba(33,37,41,0.8);">{{$partcategory->name}}</h6>
                  </div>
              </div>

              <div class="row">
                  <div class="col-12 text-light">
                      <ul class="list-group list-group-flush">
                          @foreach($partcategory->getSubCategories() as $partsubcategory)
                            <li class="list-group-item p-0 m-0 pl-3 bg-transparent">
                              <span class="d-inline-flex text-light"><i class="fa fa-caret-right" style="margin-right:15px;"></i></span>
                              <a class="d-inline-flex nav-link text-light" href="{{ route('find.part.subCategory', $partsubcategory->id) }}" style="padding:8px 0px;color:rgba(33,37,41,0.8);font-size:16px;">{{$partsubcategory->name}}</a>
                            </li>
                          @endforeach
                      </ul>
                  </div>
              </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div>
      <a style="width:0px;" href="#banner_carousel" class="carousel-control-prev" role="button" data-slide="prev">
      </a>
      <a style="width:0px;" href="#banner_carousel" class="carousel-control-next"role="button" data-slide="next">
      </a>
    </div>
</div>
