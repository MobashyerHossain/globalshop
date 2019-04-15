<div class="row m-0 p-0">
  @include('multiAuth.consumer.inc.formExtraInfo')

  <div class="col-4">
    <h6 class="mt-1 mb-2 font-weight-bold">Time Slot Information</h6>
    {!! Form::open(['action' => 'OtherControllers\CarHandlingController@testDriveCar', 'method' => 'POST']) !!}
    <!--Test drive date-->
    <div class="form-group row">
        <div class="col-12">
          <label for="card_number" style="margin:0px;font-size:12px;">Date</label>
          <div class="border row m-0 pl-1" style="padding-top:6px;padding-bottom:6px;">
            <div class="col-1 m-0 p-0 ml-1">
              <span class="fa fa-calendar p-0 m-0"></span>
            </div>
            <div class="col m-0">
              <input id="date_of_drive" type="date" name="date_of_drive" value="{{Carbon\Carbon::tomorrow()->toDateString()}}" min="{{Carbon\Carbon::tomorrow()->toDateString()}}" max="{{Carbon\Carbon::tomorrow()->addMonth()->toDateString()}}" class="m-0 p-0 rounded-0 border-0 no-outline form-control" required>
            </div>
          </div>
        </div>
    </div>

    <!--start time-->
    <div class="form-group row">
        <div class="col-12">
          <label for="card_number" style="margin:0px;font-size:12px;">Start Time</label>
          <div class="border row m-0 pl-1" style="padding-top:6px;padding-bottom:6px;">
            <div class="col-1 m-0 p-0 ml-1">
              <span class="fa fa-clock-o p-0 m-0"></span>
            </div>
            <div class="col m-0">
              <input id="start_time" type="time" name="start_time" min="12:00" max="18:00" value="12:00" class="m-0 p-0 rounded-0 border-0 no-outline form-control" required>
            </div>
          </div>
        </div>
    </div>

    <!--start time-->
    <div class="form-group row">
        <div class="col-12">
          <label for="card_number" style="margin:0px;font-size:12px;">End Time</label>
          <div class="border row m-0 pl-1" style="padding-top:6px;padding-bottom:6px;">
            <div class="col-1 m-0 p-0 ml-1">
              <span class="fa fa-clock-o p-0 m-0"></span>
            </div>
            <div class="col m-0">
              <input id="end_time" type="time" name="end_time" min="12:00" max="18:00" value="13:00" class="m-0 p-0 rounded-0 border-0 no-outline form-control" required>
            </div>
          </div>
        </div>
    </div>

    <!--condition-->
    <div class="form-group row">
        <div class="col-12 mb-0 pb-0">
          <p style="font-size:10px;font-family: 'Times New Roman', Times, serif;" class="text-justify pb-0 mb-0">To book this vehicle you have to pay $1000. This payment will allow us to hold this car for you for a week(7 days). After that the car will again be put up for sale. We will return 50% of the sum you paid (5% of the Discounted price).</p>
        </div>
    </div>

        {{Form::hidden('consumer_id', Auth::id(), [])}}
        {{Form::hidden('car_id', $car->id, [])}}
        {{Form::checkbox('terms', '1', true)}}
        {{Form::label('terms', 'Agree to our terms and conditions?', ['class' => 'awesome m-0 p-0', 'style' => 'font-size:10px;'])}}
        <!--submit button-->
        <div class="form-group row m-0 float-right mt-3">
          <button type="submit" style="font-family: 'Times New Roman', Times, serif;" class="btn btn-primary rounded-0 no-outline">
              Book for $1000.00
          </button>
        </div>
    {!! Form::close() !!}
  </div>
</div>
