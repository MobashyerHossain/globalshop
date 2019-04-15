<form class="product-option" id="part-entry" method="POST" action="{{ route('parts.store') }}" enctype='multipart/form-data'>
    @csrf
    <div class="form-row">
        <!-- Name -->
        <div class="col-12 col-md-6" style="padding:10px;">
          <label for="part_name" style="margin:0px;font-size:12px;">Part Name</label>
          <input id="part_name" name="part_name" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('part_name') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('part_name') }}" placeholder="Part Name" required>

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
              <input id="part_stock" name="part_stock" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('part_stock') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('part_stock') }}" placeholder="Part Stock" required onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">
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
                <input id="buying_price" name="buying_price" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('buying_price') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('buying_price') }}" placeholder="Buying Price" required onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">
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
                <input id="selling_price" name="selling_price" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('selling_price') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('selling_price') }}" placeholder="Selling Price" required onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">
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
                <input id="discount" name="discount" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }} no-outline rounded-0" type="number" min="0" max="100" value="{{ old('discount') }}" placeholder="Discount">
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
                <input id="max_discount" name="max_discount" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('max_discount') ? ' is-invalid' : '' }} no-outline rounded-0" type="number" min="0" max="100" value="{{ old('max_discount') }}" placeholder="Max Discount Possible">
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
                <select id="part_category_select" name="part_category" style="border: 1px solid #a5a5a5;" class="form-control no-outline rounded-0" required>
                  <option value="" selected hidden disabled>Category</option>
                  @foreach(App\Models\Product\PartCategory::all() as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
                <div class="input-group-append">
                  <button class="btn btn-primary no-outline rounded-0 pt-1 pb-1" type="button"  data-toggle="modal" data-target="#partCategoryModal"><span class="fa fa-plus mr-2"></span>New</button>
                </div>
            </div>
        </div>

        <!-- Part sub category -->
        <div class="col col-6" style="padding:10px;">
            <div class="input-group">
                <select id="part_sub_category_select" name="part_sub_category" style="border: 1px solid #a5a5a5;" class="form-control no-outline rounded-0" required>
                  <option value="" selected hidden disabled>Sub Category</option>
                  <option value="carmodel" disabled>Choose a Category first</option>
                  @foreach(App\Models\Product\PartSubCategory::all() as $subCategory)
                    <option value="{{$subCategory->id}}" class="category{{$subCategory->getCategory()->id}}">{{$subCategory->name}}</option>
                  @endforeach
                </select>
                <div class="input-group-append">
                  <button class="btn btn-primary no-outline rounded-0 pt-1 pb-1" type="button"  data-toggle="modal" data-target="#partSubCategoryModal"><span class="fa fa-plus mr-2"></span>New</button>
                </div>
            </div>
        </div>

        <!-- Part Manufacturer -->
        <div class="col col-12" style="padding:10px;">
            <div class="input-group">
                <select id="part_manufacturer_select" name="part_manufacturer"style="border: 1px solid #a5a5a5;" class="form-control no-outline rounded-0" required>
                  <option value="" selected hidden disabled>Manufacturer</option>
                  @foreach(App\Models\Product\PartManufacturer::all() as $manufacturer)
                    <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                  @endforeach
                </select>
                <div class="input-group-append">
                  <button class="btn btn-primary no-outline rounded-0 pt-1 pb-1" type="button"  data-toggle="modal" data-target="#partManufacturerModal"><span class="fa fa-plus mr-2"></span>New</button>
                </div>
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
          <img id="image_part_main" src="" style="width:100%;height:80px;object-fit:cover;" alt="">
        </div>

        <!-- Image -->
        <div class="col-12 col-md-2" style="padding:10px;">
          <button type="button" class="btn btn-primary no-outline rounded-0 w-100" onclick="uploadImage('part_image_extra1')" style="font-size:13px;"><span class="fa fa-plus mr-2"></span>Extra Image</button>
          <input id="part_image_extra1" name="part_image_extra1" class="d-none" onchange="readURL(this, '#image_part_extra1')" type="file"/>
          <img id="image_part_extra1" src="" style="width:100%;height:80px;object-fit:cover;" alt="">
        </div>

        <!-- Image -->
        <div class="col-12 col-md-2" style="padding:10px;">
          <button type="button" class="btn btn-primary no-outline rounded-0 w-100" onclick="uploadImage('part_image_extra2')" style="font-size:13px;"><span class="fa fa-plus mr-2"></span>Extra Image</button>
          <input id="part_image_extra2" name="part_image_extra2" class="d-none" onchange="readURL(this, '#image_part_extra2')" type="file"/>
          <img id="image_part_extra2" src="" style="width:100%;height:80px;object-fit:cover;" alt="">
        </div>

        <!-- Image -->
        <div class="col-12 col-md-2" style="padding:10px;">
          <button type="button" class="btn btn-primary no-outline rounded-0 w-100" onclick="uploadImage('part_image_extra3')" style="font-size:13px;"><span class="fa fa-plus mr-2"></span>Extra Image</button>
          <input id="part_image_extra3" name="part_image_extra3" class="d-none" onchange="readURL(this, '#image_part_extra3')" type="file"/>
          <img id="image_part_extra3" src="" style="width:100%;height:80px;object-fit:cover;" alt="">
        </div>

        <!-- Part Details-->
        <div id="part_details" class="col-12 row mr-auto ml-auto m-0 p-0">
        </div>

        <!-- Submit -->
        <div class="col-6 ml-auto mr-auto" style="padding:10px;">
          <button class="no-outline rounded-0 btn btn-primary pt-1 pb-1 text-center" type="submit" style="margin-right:25%;margin-left:25%;width:50%;">
              {{ __('Add Part to Inventory') }}
          </button>
        </div>
    </div>
</form>
