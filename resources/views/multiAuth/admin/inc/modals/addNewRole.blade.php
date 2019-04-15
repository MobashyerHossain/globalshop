<div class="modal fade modal-primary" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header border-bottom mt-0 p-1 pl-4 mb-0">
              <h5 class="mt-0 pt-2 pb-0 mb-1" style="color:#a5a5a5;">Add New Admin Role</h5>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('roles.store') }}">
                  @csrf
                  <div class="form-group row p-0">
                      <!--job title-->
                      <div class="col-12 col-md-6">
                          <label for="country" style="margin:0px;color:#7a7a7a;">Role Title</label>
                          <input id="job_title" name="job_title" value="" type="text" class="text-capitalize rounded-0 no-outline form-control{{ $errors->has('job_title') ? ' is-invalid' : '' }}" value="{{ old('job_title') }}" placeholder="Job Title" required>

                          @if ($errors->has('job_title'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('job_title') }}</strong>
                              </span>
                          @endif
                      </div>

                      <!--salary-->
                      <div class="col-12 col-md-6">
                          <label for="country" style="margin:0px;color:#7a7a7a;">Salary</label>
                          <input id="salary" name="salary" value="" type="text" class="text-capitalize rounded-0 no-outline form-control{{ $errors->has('salary') ? ' is-invalid' : '' }}" value="{{ old('salary') }}" placeholder="Salary" required onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">

                          @if ($errors->has('salary'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('salary') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  {{Form::hidden('work_as', 'admin')}}
                  <!--details-->
                  <div class="form-group row">
                      <div class="col-12">
                          <label for="country" style="margin:0px;color:#7a7a7a;">Details</label>
                          {{Form::textarea('job_detail',"" ,['style' => "height:120px;", 'class' => "rounded-0 no-outline form-control", 'placeholder' => "Details...", 'required', 'maxlength' => '500'])}}

                          @if ($errors->has('job_detail'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('job_detail') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <!--submit button-->
                  <div class="form-group row mb-0">
                      <div class="col-6">
                          <button class="no-outline rounded-0 btn btn-primary pt-1 pb-1" type="submit">
                              {{ __('Add') }}
                          </button>
                      </div>
                  </div>
              </form>
            </div>
        </div>
    </div>
</div>
