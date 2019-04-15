<div class="col-5 text-center border">
    <p class="float-left p-2">{{$car->getTotalViews()}} views</p>
    @if(Auth::check())
      @if(count($car->isAlreadyFavourited()) > 0)
        {!!Form::open(['action' => ['ModelControllers\MyFavouriteController@destroy', $car->isAlreadyFavourited()->id], 'method' => 'POST'])!!}
          {{Form::hidden('_method', 'DELETE')}}
          <a onclick="this.parentNode.submit();" style="cursor:pointer;">
            <i class="fa fa-heart" style="float:right;font-size:30px;z-index:1px;margin-top:10px;color:rgba(232,17,45,0.53);"></i>
          </a>
        {!!Form::close()!!}
      @else
        {!! Form::open(['action' => 'ModelControllers\MyFavouriteController@store', 'method' => 'POST', 'name' => 'statuspost']) !!}
            {{Form::hidden('product_type', $car->getType(), [])}}
            {{Form::hidden('product_id', $car->id, [])}}
            <a onclick="this.parentNode.submit();" style="cursor:pointer;">
              <i class="fa fa-heart-o" style="float:right;font-size:30px;z-index:1px;margin-top:10px;color:rgba(232,17,45,0.53);"></i>
            </a>
        {!! Form::close() !!}
      @endif
    @else
      <a onclick="" data-toggle="modal" data-target="#LoginModalCenter" style="cursor:pointer;">
        <i class="fa fa-heart-o" style="float:right;font-size:30px;z-index:1px;margin-top:10px;color:rgba(232,17,45,0.53);"></i>
      </a>
    @endif
    <a href="#" class="no-outline" style="text-decoration:none; padding-top:0px;" data-toggle="modal" data-target="#viewFullScreen">
      <img src="{{url($car->getImage())}}" style="width:100%;padding-bottom:5px; height:200px; object-fit: cover;">
      <i class="fa fa-search-plus"></i>View Full Screen
    </a>

    <!-- Fullscreen car image Modal -->
    <div class="modal fade" id="viewFullScreen" tabindex="-1" role="dialog" aria-labelledby="viewFullScreenTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content rounded-0 border-0">
          <div class="modal-body">
            <img src="{{url($car->getImage())}}" data-bs-hover-animate="pulse" style="width:100%; object-fit: contain;">
          </div>
        </div>
      </div>
    </div>

    <!-- Extra Car Image -->
    <div class="row" style="margin-right:5px;margin-left:-5px;position:absolute;bottom:5px;">
      @foreach($car->getExtraImage() as $extra)
        <!-- Button trigger modal -->
        <div class="col-4 text-left p-2" style="padding:0px;">
          <a href="" data-toggle="modal" data-target="#carfullview{{$extra->id}}">
            <img src="{{url($extra->getImage())}}" data-bs-hover-animate="pulse" style="width:100%; object-fit: contain;">
          </a>
        </div>

        <!-- Extra image Modal -->
        <div class="modal fade" id="carfullview{{$extra->id}}" tabindex="-1" role="dialog" aria-labelledby="carfullview{{$extra->id}}Title" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content rounded-0 border-0">
              <div class="modal-body">
                <img src="{{url($extra->getImage())}}" data-bs-hover-animate="pulse" style="width:100%; object-fit: contain;">
              </div>
            </div>
          </div>
        </div>
      @endforeach

      @for($i=0; $i<3-count($car->getExtraImage()); $i++)
        <!-- same image -->
        <div class="col-4 text-left p-3" style="padding:0px;">
          <img src="{{url($car->getImage())}}" data-bs-hover-animate="pulse" style="width:100%; object-fit: contain;">
        </div>
      @endfor
    </div>
</div>
