<form id="infoForm" style="display:block;">
    <div class="form-row">
        <div class="col" style="padding-right:10px;">
            <div class="form-group">
              <label for="first_name" style="margin:0px;">First Name</label>
              @if(Auth::user()->first_name)
              <input class="form-control no-outline rounded-0" type="text" value="{{Auth::user()->first_name}}" readonly="" placeholder="First Name">
              @else
              <input class="form-control no-outline rounded-0" type="text" value="" readonly="" placeholder="First Name">
              @endif
            </div>
        </div>
        <div class="col" style="padding-left:10px;">
            <div class="form-group">
              <label for="last_name" style="margin:0px;">Last Name</label>
              @if(Auth::user()->last_name)
              <input class="form-control no-outline rounded-0" type="text" value="{{Auth::user()->last_name}}" readonly="" placeholder="Last Name">
              @else
              <input class="form-control no-outline rounded-0" type="text" value="" readonly="" placeholder="Last Name">
              @endif
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col" style="padding-right:10px;">
            <div class="form-group">
              <label for="email" style="margin:0px;">Email</label>
              @if(Auth::user()->email)
              <input class="form-control no-outline rounded-0" type="email" value="{{Auth::user()->email}}" readonly="" placeholder="Email">
              @else
              <input class="form-control no-outline rounded-0" type="text" value="" readonly="" placeholder="Email">
              @endif
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
              <label for="local_address" style="margin:0px;">Local Adrress</label>
              @if(Auth::user()->address_id)
              <input class="form-control no-outline rounded-0" type="text" value="{{Auth::user()->getAddress()->local}}" readonly="" placeholder="Local Address">
              @else
              <input class="form-control no-outline rounded-0" type="text" value="" readonly="" placeholder="Local Address">
              @endif
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col" style="padding-right:10px;">
            <div class="form-group">
              <label for="phone_number" style="margin:0px;">Phone Number</label>
              @if(Auth::user()->phone_number_id)
              <input class="form-control no-outline rounded-0" type="text" value="{{Auth::user()->getPhoneNumber()->number}}" readonly="" placeholder="Phone Number">
              @else
              <input class="form-control no-outline rounded-0" type="text" value="" readonly="" placeholder="Phone Number">
              @endif
            </div>
        </div>
        <div class="col" style="padding-left:10px;">
            <div class="form-group">
              <label for="postal_code" style="margin:0px;">Postal Code</label>
              @if(Auth::user()->address_id)
              <input class="form-control no-outline rounded-0" type="text" value="{{Auth::user()->getAddress()->postal_code}}" readonly="" placeholder="Postal Code">
              @else
              <input class="form-control no-outline rounded-0" type="text" value="" readonly="" placeholder="Postal Code">
              @endif
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col" style="padding-right:10px;">
            <div class="form-group">
              <label for="city" style="margin:0px;">City</label>
              @if(Auth::user()->address_id)
              <input class="form-control no-outline rounded-0" type="text" value="{{Auth::user()->getAddress()->city}}" readonly="" placeholder="City">
              @else
              <input class="form-control no-outline rounded-0" type="text" value="" readonly="" placeholder="City">
              @endif
            </div>
        </div>
        <div class="col" style="padding-left:10px;">
            <div class="form-group">
              <label for="country" style="margin:0px;">Country</label>
              @if(Auth::user()->address_id)
              <input class="form-control no-outline rounded-0" type="text" value="{{Auth::user()->getAddress()->country}}" readonly="" placeholder="Country">
              @else
              <input class="form-control no-outline rounded-0" type="text" value="" readonly="" placeholder="Country">
              @endif
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col text-right">
          <button class="btn btn-primary no-outline rounded-0" type="button" onclick="showEditForm()">Edit</button>
        </div>
    </div>
</form>
