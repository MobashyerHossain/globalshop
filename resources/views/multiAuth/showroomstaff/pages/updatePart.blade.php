@extends('layout.showroom')

@section('title', 'Update Products')

@section('content')
  @include('multiAuth.showroomstaff.inc.sidebar')
  <div class="main-panel">
      @include('multiAuth.showroomstaff.inc.navbar')

      <div class="content">
        <div class="container border-0">
          <div class="ml-2 mr-2 p-3 mt-0 bg-white">
            <form class="product-option" id="part-entry" method="POST" action="{{ route('parts.update', ['id' => $part->id]) }}" enctype='multipart/form-data'>
                @csrf
                {{Form::hidden('_method', 'PUT')}}
                <div class="form-row">
                    <!-- Name -->
                    <div class="col-12 col-md-6" style="padding:10px;">
                      <label for="part_name" style="margin:0px;font-size:12px;">Part Name</label>
                      <input id="part_name" name="part_name" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('part_name') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{$part->name}}" placeholder="Part Name" required>

                      @if ($errors->has('part_name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('part_name') }}</strong>
                          </span>
                      @endif
                    </div>

                    <!-- stock -->
                    <div class="col-12 col-md-6" style="padding:10px;">
                      <label for="part_stock" style="margin:0px;font-size:12px;">Part Stock</label>
                      <div class="input-group">
                          <input id="part_stock" name="part_stock" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('part_stock') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{$part->getOurStock()}}" placeholder="Part Stock" required onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">
                          <div class="input-group-append" style="border: 1px solid #a5a5a5;">
                            <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">Pieces</span>
                          </div>
                      </div>

                      @if ($errors->has('part_stock'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('part_stock') }}</strong>
                          </span>
                      @endif
                    </div>

                    <!-- buying Price -->
                    <div class="col-12 col-md-6" style="padding:10px;">
                        <label for="buying_price" style="margin:0px;font-size:12px;">Buying Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend" style="border: 1px solid #a5a5a5;">
                              <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">$</span>
                            </div>
                            <input id="buying_price" name="buying_price" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('buying_price') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{$part->buying_price}}" placeholder="Buying Price" required onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">
                            <div class="input-group-append" style="border: 1px solid #a5a5a5;">
                              <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">.00</span>
                            </div>
                        </div>

                        @if ($errors->has('buying_price'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('buying_price') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- selling Price -->
                    <div class="col-12 col-md-6" style="padding:10px;">
                        <label for="selling_price" style="margin:0px;font-size:12px;">Selling Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend" style="border: 1px solid #a5a5a5;">
                              <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">$</span>
                            </div>
                            <input id="selling_price" name="selling_price" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('selling_price') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{$part->selling_price}}" placeholder="Selling Price" required onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">
                            <div class="input-group-append" style="border: 1px solid #a5a5a5;">
                              <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">.00</span>
                            </div>
                        </div>

                        @if ($errors->has('selling_price'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('selling_price') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- Discount -->
                    <div class="col-12 col-md-6" style="padding:10px;">
                        <label for="discount" style="margin:0px;font-size:12px;">Discount</label>
                        <div class="input-group">
                            <input id="discount" name="discount" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }} no-outline rounded-0" type="number" min="0" max="100" value="{{$part->current_discount*100}}" placeholder="Discount">
                            <div class="input-group-append" style="border: 1px solid #a5a5a5;">
                              <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">%</span>
                            </div>
                        </div>

                        @if ($errors->has('discount'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('discount') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- Max Discount -->
                    <div class="col-12 col-md-6" style="padding:10px;">
                        <label for="max_discount" style="margin:0px;font-size:12px;">Max Discount Possible</label>
                        <div class="input-group">
                            <input id="max_discount" name="max_discount" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('max_discount') ? ' is-invalid' : '' }} no-outline rounded-0" type="number" min="0" max="100" value="{{$part->max_possible_discount*100}}" placeholder="Max Discount Possible">
                            <div class="input-group-append" style="border: 1px solid #a5a5a5;">
                              <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">%</span>
                            </div>
                        </div>

                        @if ($errors->has('max_discount'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('max_discount') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- Part Category -->
                    <div class="col col-6" style="padding:10px;">
                        <div class="input-group">
                            <select id="part_category_select" name="part_category" style="border: 1px solid #a5a5a5;" class="update_select_category form-control no-outline rounded-0" required>
                              @foreach(App\Models\Product\PartCategory::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Part sub category -->
                    <div class="col col-6" style="padding:10px;">
                        <div class="input-group">
                            <select id="part_sub_category_select" name="part_sub_category" style="border: 1px solid #a5a5a5;" class="update_select_sub_category form-control no-outline rounded-0" required>
                              @foreach(App\Models\Product\PartSubCategory::all() as $subCategory)
                                <option value="{{$subCategory->id}}" class="category{{$subCategory->getCategory()->id}}">{{$subCategory->name}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Part Manufacturer -->
                    <div class="col col-12" style="padding:10px;">
                        <div class="input-group">
                            <select id="part_manufacturer_select" name="part_manufacturer" style="border: 1px solid #a5a5a5;" class="update_select_manufacturer form-control no-outline rounded-0" required>
                              @foreach(App\Models\Product\PartManufacturer::all() as $manufacturer)
                                <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Add Details Button-->
                    <div class="col-12 col-md-3" style="padding:10px;">
                      <button id="add_part_detail_fields" class="btn btn-primary no-outline rounded-0 w-100" style="font-size:13px;"><span class="fa fa-plus mr-2"></span>Add Part Details</button>
                    </div>

                    <!-- Image -->
                    <div class="col-12 col-md-3" style="padding:10px;">
                      <button type="button" class="btn btn-primary no-outline rounded-0 w-100" onclick="uploadImage('part_image_main')" style="font-size:13px;"><span class="fa fa-plus mr-2"></span>Main Image</button>
                      <input id="part_image_main" name="part_image_main" class="d-none" onchange="readURL(this, '#image_part_main')" type="file"/>
                      <img id="image_part_main" src="{{url($part->getImage())}}" style="width:100%;height:120px;object-fit:cover;" alt="">
                    </div>

                    <!-- Extra Image -->
                    <?php $ex_p = 1; ?>
                    @foreach($part->getExtraImage() as $extra)
                      <div class="col-12 col-md-2" style="padding:10px;">
                        <button type="button" class="btn btn-primary no-outline rounded-0 w-100" onclick="uploadImage('part_image_extra{{$ex_p}}')" style="font-size:13px;"><span class="fa fa-plus mr-2"></span>Extra Image</button>
                        <input id="part_image_extra{{$ex_p}}" name="part_image_extra{{$ex_p}}" class="d-none" onchange="readURL(this, '#image_part_extra{{$ex_p}}')" type="file"/>
                        <img id="image_part_extra{{$ex_p}}" src="{{url($extra->getImage())}}" style="width:100%;height:120px;object-fit:cover;" alt="">
                      </div>
                      <?php $ex_p++; ?>
                    @endforeach

                    <!-- Extra Image -->
                    @for($j=count($part->getExtraImage())+1; $j<'4'; $j++)
                      <div class="col-12 col-md-2" style="padding:10px;">
                        <button type="button" class="btn btn-primary no-outline rounded-0 w-100" onclick="uploadImage('part_image_extra{{$j}}')" style="font-size:13px;"><span class="fa fa-plus mr-2"></span>Extra Image</button>
                        <input id="part_image_extra{{$j}}" name="part_image_extra{{$j}}" class="d-none" onchange="readURL(this, '#image_part_extra{{$j}}')" type="file"/>
                        <img id="image_part_extra{{$j}}" src="" style="width:100%;height:120px;object-fit:cover;" alt="">
                      </div>
                    @endfor

                    <!-- Part Details-->
                    <div id="part_details" class="col-12 row mr-auto ml-auto m-0 p-0">
                      <?php $pe = 1; ?>
                      @foreach($part->getDetails() as $detail)
                        <div id="part_detail_criteria_col{{$pe}}" class="col-12 col-md-6" style="padding:10px;">
                          <label for="part_detail_criteria{{$pe}}" style="margin:0px;font-size:12px;">Part Detail Criteria</label>
                          <input id="part_detail_criteria{{$pe}}" name="part_detail_criteria{{$pe}}" style="border: 1px solid #a5a5a5;" class="form-control no-outline rounded-0" type="text" value="{{$detail->detail_criteria}}" placeholder="Detail Criteria">
                        </div>
                        <div id="part_detail_col{{$pe}}" class="col-12 col-md-6" style="padding:10px;">
                          <label for="part_detail{{$pe}}" style="margin:0px;font-size:12px;">Part Detail</label>
                          <div class="input-group">
                            <input id="part_detail{{$pe}}" name="part_detail{{$pe}}" style="border: 1px solid #a5a5a5;" class="form-control no-outline rounded-0" type="text" value="{{$detail->detail}}" placeholder="Detail">
                            <div class="input-group-append">
                              <button id="deletePartDetailButton" class="btn btn-danger no-outline rounded-0 pt-1 pb-1" onclick="deletePartDetail({{$pe}})">X</button>
                            </div>
                          </div>
                        </div>
                        <?php $pe++; ?>
                      @endforeach
                    </div>

                    <!-- Submit -->
                    <div class="col-6 ml-auto mr-auto" style="padding:10px;">
                      <button class="no-outline rounded-0 btn btn-primary pt-1 pb-1 text-center" type="submit" style="margin-right:25%;margin-left:25%;width:50%;">
                          {{ __('Update Part Info') }}
                      </button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
      <!-- footer -->
      @include('multiAuth.showroomstaff.inc.footer')
  </div>
@endsection

@section('style')
  <!-- CSS Files -->
  <style>
    .no-outline {
      box-shadow:none !important;
      outline:none;
    }
  </style>
  <link href="{{ asset('assets/css/light-bootstrap-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
@stop

@section('script')
  @include('multiAuth.showroomstaff.js.showroomJS')
  <script>
    $(document).ready(function () {
      $("#part_sub_category_select").children("option[class=category{{$part->getSubCategory()->getCategory()->id}}]").show();
      $('.update_select_category option[value={{$part->getSubCategory()->getCategory()->id}}]').attr('selected','selected');
      $('.update_select_sub_category option[value={{$part->getSubCategory()->id}}]').attr('selected','selected');
      $('.update_select_manufacturer option[value={{$part->getManufacturer()->id}}]').attr('selected','selected');
    });
  </script>
  <!--   Core JS Files   -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="{{ asset('assets/js/plugins/bootstrap-switch.js') }}"></script>
  <!--  Chartist Plugin  -->
  <script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
  <script src="{{ asset('assets/js/light-bootstrap-dashboard.js?v=2.0.1') }}" type="text/javascript"></script>
@stop
