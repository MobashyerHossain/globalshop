<div class="row m-0 p-0">
  @include('multiAuth.consumer.inc.formExtraInfo')
</div>
<div id="loan_Info_Start" class="row m-0 p-0">
  <div class="col">
    {!! Form::open(['action' => 'OtherControllers\CarHandlingController@applyForCarLoan', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <h6 class="mt-1 mb-2 font-weight-bold">Loan Information</h6>
      {{Form::hidden('consumer_id', Auth::id(), [])}}
      {{Form::hidden('car_id', $car->id, [])}}
      <div class="form-group row p-0">
          <!--Applicant Profession-->
          <div class="col-12 col-md-6">
              <label for="applicant_profession" style="margin:0px;font-size:12px;"><span class="text-danger fa fa-asterisk" style="font-size:10px;"></span> Profession of Applicant</label>
              <input id="applicant_profession" type="text" class="rounded-0 no-outline form-control{{ $errors->has('applicant_profession') ? ' is-invalid' : '' }}" name="applicant_profession" value="{{ old('applicant_profession') }}" placeholder="Profession of Applicant" required>

              @if ($errors->has('applicant_profession'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('applicant_profession') }}</strong>
                  </span>
              @endif
          </div>

          <!--Requested Percentage-->
          <div class="col-12 col-md-6">
              <label for="requested_percentage" style="margin:0px;font-size:12px;"><span class="text-danger fa fa-asterisk" style="font-size:10px;"></span> Loan Percentage</label>
              <input id="requested_percentage" type="number" min="30" max="90" class="rounded-0 no-outline form-control{{ $errors->has('requested_percentage') ? ' is-invalid' : '' }}" name="requested_percentage" value="{{ old('requested_percentage') }}" placeholder="State a Loan Percentage" required>

              @if ($errors->has('requested_percentage'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('requested_percentage') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row p-0">
          <!--Nid-->
          <div class="col-12 col-md-6">
              <label for="national_id" style="margin:0px;font-size:12px;"><span class="text-danger fa fa-asterisk" style="font-size:10px;"></span> Copy of National ID Card</label>
              <input id="national_id" type="file" class="rounded-0 no-outline form-control" name="national_id" placeholder="" required>
          </div>

          <!--Bank Statement-->
          <div class="col-12 col-md-6">
              <label for="bank_statement" style="margin:0px;font-size:12px;"><span class="text-danger fa fa-asterisk" style="font-size:10px;"></span> Copy of Bank Statement</label>
              <input id="bank_statement" type="file" class="rounded-0 no-outline form-control" name="bank_statement" placeholder="" required>
          </div>
      </div>

      <div class="form-group row p-0">
          <!--Tax Clearence-->
          <div class="col-12 col-md-6">
              <label for="tex_clearence" style="margin:0px;font-size:12px;"><span class="text-danger fa fa-asterisk" style="font-size:10px;"></span> Copy of Tax Clearence Certificate</label>
              <input id="tex_clearence" type="file" class="rounded-0 no-outline form-control" name="tex_clearence" placeholder="" required>
          </div>

          <!--passport-->
          <div class="col-12 col-md-6">
              <label for="passport" style="margin:0px;font-size:12px;">Copy of Passport</label>
              <input id="passport" type="file" class="rounded-0 no-outline form-control" name="passport" placeholder="">
          </div>
      </div>

      <!--Additional-->
      <div class="form-group row p-0">
          <div class="col-12 col-md-6">
              <label for="additional_1" style="margin:0px;font-size:12px;">Copy of Any Additional Document 1</label>
              <input id="additional_1" type="file" class="rounded-0 no-outline form-control" name="additional_1" placeholder="">
          </div>

          <div class="col-12 col-md-6">
              <label for="additional_2" style="margin:0px;font-size:12px;">Copy of Any Additional Document 2</label>
              <input id="additional_2" type="file" class="rounded-0 no-outline form-control" name="additional_2" placeholder="">
          </div>
      </div>

      <!--submit button-->
      <div class="form-group row m-0 float-right mt-3 mb-4">
        <button type="submit" style="font-family: 'Times New Roman', Times, serif;" class="btn btn-primary rounded-0 no-outline">
            Apply for Loan
        </button>
      </div>
    {!! Form::close() !!}
  </div>
</div>
