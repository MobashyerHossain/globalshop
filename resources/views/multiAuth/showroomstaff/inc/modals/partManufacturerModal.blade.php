<div class="modal fade modal-primary" id="partManufacturerModal" tabindex="-1" role="dialog" aria-labelledby="partManufacturerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header border-bottom mt-0 p-1 pl-4 mb-0">
              <h5 class="mt-0 pt-2 pb-0 mb-1" style="color:#a5a5a5;">Add Part Manufacturer</h5>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('partManufacturers.store') }}" enctype='multipart/form-data'>
                  @csrf
                  <div class="form-group row p-0">
                      <!--name-->
                      <div class="col-12 col-md-6">
                          <input id="manufacturer_name" name="manufacturer_name" value="Name" onclick="if(this.value =='Name')this.value=''" type="text" class="text-capitalize rounded-0 no-outline form-control{{ $errors->has('manufacturer_name') ? ' is-invalid' : '' }}" value="{{ old('manufacturer_name') }}" placeholder="Name" required style="border: 1px solid #a5a5a5;">

                          @if ($errors->has('manufacturer_name'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('manufacturer_name') }}</strong>
                              </span>
                          @endif
                      </div>

                      <!--logo-->
                      <div class="col-12 col-md-6">
                          <button type="button" class="btn btn-primary no-outline rounded-0 w-100" onclick="uploadImage('part_manufacturer_logo')" style="font-size:13px;"><span class="fa fa-plus mr-2"></span>Logo</button>
                          <input id="part_manufacturer_logo" name="part_manufacturer_logo" class="d-none" onchange="readURL(this, '#image_manufacturer')" type="file"/>
                          <img id="image_manufacturer" src="" style="width:100%;" alt="">
                      </div>
                  </div>

                  <!--details-->
                  <div class="form-group row">
                      <div class="col-12">
                        {{Form::textarea('manufacturer_detail',"Details..." ,['onclick' => "if(this.value =='Details...')this.value=''", 'style' => "height:120px;border: 1px solid #a5a5a5;", 'class' => "rounded-0 no-outline form-control", 'placeholder' => "Details..."])}}

                          @if ($errors->has('manufacturer_detail'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('manufacturer_detail') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <!--submit button-->
                  <div class="form-group row mb-0">
                      <div class="col-6">
                          <button class="no-outline rounded-0 btn btn-primary pt-1 pb-1" type="submit">
                              {{ __('Add Manufacturer') }}
                          </button>
                      </div>
                  </div>
              </form>
            </div>
        </div>
    </div>
</div>
