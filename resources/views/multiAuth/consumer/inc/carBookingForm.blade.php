<div class="row m-0 p-0">
  @include('multiAuth.consumer.inc.formExtraInfo')

  <div class="col-4">
    <h6 class="mt-1 mb-2 font-weight-bold">Payment Information</h6>
    {!! Form::open(['action' => 'OtherControllers\CarHandlingController@bookCar', 'method' => 'POST']) !!}
    <!--card brand-->
    <div class="form-group row">
        <div class="col-12">
          <label for="card_brand" style="margin:0px;font-size:12px;">Card Brand</label>
          <div class="border row m-0 pl-1" style="padding-top:6px;padding-bottom:6px;">
            <div class="col-1 m-0 p-0 ml-1">
              <span class="fa fa-credit-card p-0 m-0"></span>
            </div>
            <div class="col m-0">
              <select id="card_brand" class="border-0 w-100 no-outline">
                <option selected hidden>Card Brand</option>
                <option value="12">Visa</option>
                <option value="13">Master Card</option>
                <option value="14">Maiestro</option>
                <option value="14">American Express</option>
              </select>
            </div>
          </div>
        </div>
    </div>

    <!--card number-->
    <div class="form-group row">
        <div class="col-12">
          <label for="card_number" style="margin:0px;font-size:12px;">Card Number</label>
          <div class="border row m-0 pl-1" style="padding-top:6px;padding-bottom:6px;">
            <div class="col-1 m-0 p-0 ml-1">
              <span class="fa fa-credit-card p-0 m-0"></span>
            </div>
            <div class="col m-0">
              <input id="card_number" type="text" class="m-0 p-0 rounded-0 border-0 no-outline form-control" name="card_number" value="{{ old('card_number') }}" placeholder="Card Number" required onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">
            </div>
          </div>
        </div>
    </div>

    <!--trail ends-->
    <div class="form-group row">
        <div class="col-12">
          <label for="trail_ends" style="margin:0px;font-size:12px;">Expiry date</label>
          <div class="border row m-0 pl-1" style="padding-top:6px;padding-bottom:6px;">
            <div class="col-1 m-0 p-0 ml-1">
              <span class="fa fa-calendar p-0 m-0"></span>
            </div>
            <div class="col m-0">
              <select id="card_brand" class="mr-1 border-0 w-25 no-outline">
                <option selected hidden>MM</option>
                @for($i=1; $i<=12; $i++)
                  <option value="{{$i}}">{{$i}}</option>
                @endfor
              </select>
              /
              <select id="card_brand" class="ml-1 border-0 w-50 no-outline">
                <option selected hidden>YY</option>
                @for($i=2018; $i<=2030; $i++)
                  <option value="{{$i}}">{{$i}}</option>
                @endfor
              </select>
            </div>
          </div>
        </div>
    </div>

    <!--cvv-->
    <div class="form-group row">
        <div class="col-12">
          <label for="cvv" style="margin:0px;font-size:12px;">CVV</label>
          <div class="border row m-0 pl-1" style="padding-top:6px;padding-bottom:6px;">
            <div class="col-1 m-0 p-0 ml-1">
              <span class="fa fa-lock p-0 m-0"></span>
            </div>
            <div class="col m-0">
              <input id="cvv" type="text" maxlength="4" class="m-0 p-0 rounded-0 border-0 no-outline form-control" name="cvv" value="{{ old('cvv') }}" placeholder="CVV" required onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">
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
        {{Form::hidden('advance', 1000, [])}}
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
