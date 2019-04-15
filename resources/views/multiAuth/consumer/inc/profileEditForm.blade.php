{!! Form::open(['id' => 'editForm', 'action' => ['Auth\ConsumerControllers\ConsumerController@update', Auth::id()], 'method' => 'POST', 'style' => 'display:none;']) !!}
    @csrf
    <div class="form-row">
        <div class="col" style="padding-right:10px;">
            <div class="form-group">
              <label for="first_name" style="margin:0px;">First Name</label>
              @if(Auth::user()->first_name)
              <input class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{Auth::user()->first_name}}" placeholder="First Name" id="first_name" name="first_name">
              @else
              <input class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('first_name') }}" placeholder="First Name" id="first_name" name="first_name">
              @endif

              @if ($errors->has('first_name'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('first_name') }}</strong>
                  </span>
              @endif
            </div>
        </div>
        <div class="col" style="padding-left:10px;">
            <div class="form-group">
              <label for="last_name" style="margin:0px;">Last Name</label>
              @if(Auth::user()->last_name)
              <input class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{Auth::user()->last_name}}" placeholder="Last Name" id="last_name" name="last_name">
              @else
              <input class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ old('last_name') }}" placeholder="Last Name" id="last_name" name="last_name">
              @endif

              @if ($errors->has('last_name'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('last_name') }}</strong>
                  </span>
              @endif
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col" style="padding-right:10px;">
            <div class="form-group">
              <label for="profile_email" style="margin:0px;">Email</label>
              @if(Auth::user()->email)
              <input class="form-control{{ $errors->has('profile_email') ? ' is-invalid' : '' }} no-outline rounded-0" type="email" value="{{Auth::user()->email}}" placeholder="Email" id="profile_email" name="profile_email">
              @else
              <input class="form-control{{ $errors->has('profile_email') ? ' is-invalid' : '' }} no-outline rounded-0" type="email" value="{{ old('email') }}" placeholder="Email" id="profile_email" name="profile_email">
              @endif

              @if ($errors->has('profile_email'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('profile_email') }}</strong>
                  </span>
              @endif
            </div>
        </div>
        <div class="col" style="padding-left:10px;">
            <div class="form-group">
              <label for="date_of_birth" style="margin:0px;">Date of Birth</label>
              @if(Auth::user()->date_of_birth)
              <input class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }} no-outline rounded-0" type="date" value="{{Auth::user()->date_of_birth}}" id="date_of_birth" name="date_of_birth">
              @else
              <input class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }} no-outline rounded-0" type="date" value="{{ old('date_of_birth') }}" id="date_of_birth" name="date_of_birth">
              @endif

              @if ($errors->has('date_of_birth'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('date_of_birth') }}</strong>
                  </span>
              @endif
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
              <label for="local_address" style="margin:0px;">Local Adrress</label>
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
        <div class="col" style="padding-right:10px;">
            <div class="form-group">
              <label for="phone_number" style="margin:0px;">Phone Number</label>
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
        <div class="col" style="padding-left:10px;">
            <div class="form-group">
              <label for="postal_code" style="margin:0px;">Postal Code</label>
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
        <div class="col" style="padding-right:10px;">
            <div class="form-group">
              <label for="city" style="margin:0px;">City</label>
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
        <div class="col" style="padding-left:10px;">
            <div class="form-group">
              <label for="country" style="margin:0px;">Country</label>
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
    <div class="form-row">
        <div class="col text-right">
          <button class="btn btn-primary no-outline rounded-0" type="button" onclick="showInfoForm()" style="margin-right:20px;">Return</button>
          {{Form::submit('Submit',['class' => 'rounded-0 no-outline btn btn-primary float-right'])}}
        </div>
    </div>
{!! Form::close() !!}
