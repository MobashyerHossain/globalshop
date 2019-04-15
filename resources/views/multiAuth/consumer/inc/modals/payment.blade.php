<div class="modal fade" id="PaymentModalCenter" tabindex="-1" role="dialog" aria-labelledby="PaymentModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="rounded-0 modal-content p-2 pt-1">
      <div class="modal-header p-0 row m-0">
        <div class="col">
          <h5 class="modal-title" id="exampleModalLongTitle">Payment</h5>
        </div>
        <div class="col-3 text-right">
          <a href="#" onclick="showCarditCardOptions()"><span id="carditCardIcon" class="fa fa-credit-card" style="font-size:20px;color:#0e94c9;"></span></a>
          <span class="font-weight-bold">  /  </span>
          <a href="#" onclick="showHomeDelivaryOptions()"><span id="homeDelivaryIcon" class="fa fa-truck" style="font-size:20px;color:#6b6b6b;"></span></a>
        </div>
      </div>
      @if(Auth::check())
        <div id="paymentCarditCard" class="modal-body" style="display:block;">
          {!! Form::open(['action' => ['OtherControllers\ProductController@checkOut'], 'method' => 'POST']) !!}
            @csrf
            {{Form::hidden('payment_option', 'cradit_card')}}
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
                      <select id="card_brand" class="mr-1 border-0 no-outline" style="width:45%;">
                        <option selected hidden disabled>MM</option>
                        @for($i=1; $i<=12; $i++)
                          <option value="{{$i}}">{{$i}}</option>
                        @endfor
                      </select>
                      /
                      <select id="card_brand" class="ml-1 border-0 no-outline" style="width:45%;">
                        <option selected hidden disabled>YY</option>
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

            {{Form::checkbox('terms', '1', true)}}
            @if ($errors->has('terms'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('terms') }}</strong>
                </span>
            @endif
            {{Form::label('terms', 'Agree to our terms and conditions?', ['class' => 'awesome m-0 p-0', 'style' => 'font-size:10px;'])}}

            <!--submit button-->
            <div class="form-group row m-0 float-right mt-3">
              {{Form::submit('Submit',['class' => 'rounded-0 no-outline btn btn-primary float-right', 'style' =>"font-family: 'Times New Roman', Times, serif;"])}}
            </div>
          {!! Form::close() !!}
        </div>
        <div id="paymentHomeDelivary" class="modal-body" style="display:none;">
          {!! Form::open(['action' => ['OtherControllers\ProductController@checkOut'], 'method' => 'POST']) !!}
            @csrf
            {{Form::hidden('payment_option', 'home_delivary')}}
            <!--local address-->
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                      <label for="local_address" style="margin:0px;font-size:12px;">Local Adrress</label>
                      @if(Auth::user()->address_id)
                      <input class="form-control{{ $errors->has('local_address') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{Auth::user()->getAddress()->local}}" placeholder="Local Address" id="local_address" name="local_address">
                      @else
                      <input class="form-control{{ $errors->has('local_address') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('local_address') }}" placeholder="Local Address" id="local_address" name="local_address">
                      @endif

                      @if ($errors->has('local_address'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('local_address') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
            </div>
            <div class="form-row">
                <!--phone number-->
                <div class="col" style="padding-right:10px;">
                    <div class="form-group">
                      <label for="phone_number" style="margin:0px;font-size:12px;">Phone Number</label>
                      @if(Auth::user()->phone_number_id)
                      <input class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }} no-outline rounded-0" type="tel" value="{{Auth::user()->getPhoneNumber()->number}}" placeholder="Phone Number" id="phone_number" name="phone_number">
                      @else
                      <input class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }} no-outline rounded-0" type="tel" value="{{ old('phone_number') }}" placeholder="Phone Number" id="phone_number" name="phone_number">
                      @endif

                      @if ($errors->has('phone_number'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('phone_number') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <!--postal code-->
                <div class="col" style="padding-left:10px;">
                    <div class="form-group">
                      <label for="postal_code" style="margin:0px;font-size:12px;">Postal Code</label>
                      @if(Auth::user()->address_id)
                      <input class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{Auth::user()->getAddress()->postal_code}}" placeholder="Postal Code" id="postal_code" name="postal_code">
                      @else
                      <input class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('postal_code') }}" placeholder="Postal Code" id="postal_code" name="postal_code">
                      @endif

                      @if ($errors->has('postal_code'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('postal_code') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
            </div>
            <div class="form-row">
                <!--city-->
                <div class="col" style="padding-right:10px;">
                    <div class="form-group">
                      <label for="city" style="margin:0px;font-size:12px;">City</label>
                      @if(Auth::user()->address_id)
                      <input class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{Auth::user()->getAddress()->city}}" placeholder="City" id="city" name="city">
                      @else
                      <input class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('city') }}" placeholder="City" id="city" name="city">
                      @endif

                      @if ($errors->has('city'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('city') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <!--country-->
                <div class="col" style="padding-left:10px;">
                    <div class="form-group">
                      <label for="country" style="margin:0px;font-size:12px;">Country</label>
                      @if(Auth::user()->address_id)
                      <input class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{Auth::user()->getAddress()->country}}" placeholder="Country" id="country" name="country">
                      @else
                      <input class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('country') }}" placeholder="Country" id="country" name="country">
                      @endif

                      @if ($errors->has('country'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('country') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
            </div>

            {{Form::checkbox('terms', '1', true)}}
            @if ($errors->has('terms'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('terms') }}</strong>
                </span>
            @endif
            {{Form::label('terms', 'Confirm your Address', ['class' => 'awesome m-0 p-0', 'style' => 'font-size:10px;'])}}

            <!--submit button-->
            <div class="form-group row m-0 float-right mt-3">
              {{Form::submit('Submit',['class' => 'rounded-0 no-outline btn btn-primary float-right', 'style' =>"font-family: 'Times New Roman', Times, serif;"])}}
            </div>
          {!! Form::close() !!}
        </div>
      @else
      @endif
    </div>
  </div>
</div>
