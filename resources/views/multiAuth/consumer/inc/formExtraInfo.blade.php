<div class="col">
  <h6 class="mt-1 mb-2 font-weight-bold">Parsonal Information</h6>
  <!--first name-->
  <div class="form-group row p-0">
      <div class="col-12">
          <label for="first_name" style="margin:0px;font-size:12px;">First Name</label>
          <input id="first_name" type="text" class="rounded-0 no-outline form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" placeholder="{{Auth::user()->first_name}}" required disabled>
      </div>
  </div>

  <!--last name-->
  <div class="form-group row p-0">
      <div class="col-12">
          <label for="last_name" style="margin:0px;font-size:12px;">Last Name</label>
          <input id="last_name" type="text" class="rounded-0 no-outline form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="{{Auth::user()->last_name}}" required disabled>
      </div>
  </div>

  <!--email-->
  <div class="form-group row">
      <div class="col-12">
          <label for="email" style="margin:0px;font-size:12px;">Email</label>
          <input id="email" type="email" class="rounded-0 no-outline form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{Auth::user()->email}}" required disabled>
      </div>
  </div>

  <h6 class="mt-1 mb-2 font-weight-bold">Car Information</h6>
  <!--car maker-->
  <div class="form-group row p-0">
      <div class="col-12">
          <label for="car_maker" style="margin:0px;font-size:12px;">Car Maker</label>
          <input id="car_maker" type="text" class="rounded-0 no-outline form-control" name="car_maker" value="{{ old('car_maker') }}" placeholder="{{$car->getModel()->getMaker()->name}}" required disabled>
      </div>
  </div>

  <!--car model-->
  <div class="form-group row p-0">
      <div class="col-12">
          <label for="car_model" style="margin:0px;font-size:12px;">Car Model</label>
          <input id="car_model" type="text" class="rounded-0 no-outline form-control" name="car_model" value="{{ old('car_model') }}" placeholder="{{$car->getModel()->name}}" required disabled>
      </div>
  </div>

  <!--car-->
  <div class="form-group row">
      <div class="col-12">
          <label for="car" style="margin:0px;font-size:12px;">Car</label>
          <input id="car" type="text" class="rounded-0 no-outline form-control" name="car" value="{{ old('car') }}" placeholder="{{$car->name}}" required disabled>
      </div>
  </div>
</div>
