<div class="modal fade" id="RegisterModalCenter" tabindex="-1" role="dialog" aria-labelledby="RegisterModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="rounded-0 modal-content p-2 pt-1">
      <div class="modal-header p-0">
        <h5 class="modal-title" id="exampleModalLongTitle"><legend>Registration</legend></h5>
      </div>
      <div class="modal-body">
        <!--Registration form-->
        <form method="POST" action="{{ route('consumer.register.submit') }}" aria-label="{{ __('Register') }}" enctype='multipart/form-data'>
            @csrf
            <div class="form-group row p-0">
                <!--first name-->
                <div class="col-12 col-md-6">
                    <input id="first_name" type="text" class="text-capitalize rounded-0 no-outline form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required>

                    @if ($errors->has('first_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>

                <!--last name-->
                <div class="col-12  col-md-6">
                    <input id="last_name" type="text" class="text-capitalize rounded-0 no-outline form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required>

                    @if ($errors->has('last_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <!--email-->
            <div class="form-group row">
                <div class="col-12">
                    <input id="email" type="email" class="rounded-0 no-outline form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <!--password-->
                <div class="col-12 col-md-6">
                    <input id="reg_password" type="password" minlength="6" maxlength="20" class="rounded-0 no-outline form-control{{ $errors->has('reg_password') ? ' is-invalid' : '' }}" name="reg_password" placeholder="Password (A-Z, a-z, @#$%^&*)" required pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\W+).*$" oninput="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ? '' :'Password must be of length 6-20 with an Uppercase, a Lowercase and a Spacial Character!');">
                    @if ($errors->has('reg_password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('reg_password') }}</strong>
                        </span>
                    @endif
                </div>

                <!--confirm password-->
                <div class="col-12 col-md-6">
                    <input id="reg_password-confirm" type="password" minlength="6" class="rounded-0 no-outline form-control" name="reg_password_confirmation" placeholder="Confirm Password" required>
                </div>
            </div>


            <div class="form-group row">

            </div>

            <!--submit button-->
            <div class="form-group row mb-0">
                <div class="col-6">
                    <button type="submit" class="float-left no-outline rounded-0 btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
                <div class="col-6">
                    <button class="float-right no-outline rounded-0 btn btn-primary" type="button" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#LoginModalCenter">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
