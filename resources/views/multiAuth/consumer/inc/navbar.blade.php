<nav class="fixed-top">
  <div class="" style="background-color:#ffffff;box-shadow:0 2px 10px rgba(0, 0, 0, 0.2);">
      <div class="row" style="margin:0px;">
          <!--logo-->
          <div class="col-3">
            <a href="{{route('index')}}" class="h4 nav-link" style="font-family: Cookie, cursive;margin:0px;line-height:20px;color:rgba(33,37,41,0.8);padding-top:0px;padding-bottom:0px;padding-left:15px;line-height:70px;">
				{{config('app.name')}}
            </a>
          </div>

          @include('multiAuth.consumer.inc.searchbox')

          <!--Login-->
          <?php
            //Get correct Authentication guard
            $guard = substr(Auth::getProvider()->getModel(),21);
            switch ($guard) {
              case 'Admin':
                $logout = 'admin.logout';
                break;
              case 'Consumer':
                $logout = 'consumer.logout';
                break;
              case 'ShowRoomStaff':
                $logout = 'showroomstaff.logout';
                break;
              default:
                $logout = 'consumer.logout';
                break;
            }
          ?>
          <div class="col hover-dropdown p-0 pl-5 pr-4">
            <div class="dropbtn no-outline mt-2 text-right" style="cursor:pointer;">
                @guest
                    <i class="fa fa-user float-left pt-0 mt-0 mb-0 pb-0" style="font-size:30px;color:rgb(162,171,180);padding:5px;margin-top:auto;line-height:50px;"></i>
                    <div class="float-left mt-2">
                      <a class="d-inline-flex nav-link no-outline" href="" data-toggle="modal" data-target="#LoginModalCenter" style="padding:5px;color:rgba(33,37,41,0.8); font-size:13px;">Sign In</a>
                      <h6 class="d-inline-flex" style="margin-left:3px;margin-right:3px;color:rgba(33,37,41,0.8);">|</h6>
                      <a class="d-inline-flex nav-link no-outline" href="" data-toggle="modal" data-target="#RegisterModalCenter" style="padding:5px;color:rgba(33,37,41,0.8); font-size:13px;">Join Free</a>
                    </div>
                @else
                  {!! Form::open(['action' => 'ModelControllers\ImageController@storeProfilePicture', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    {{Form::hidden('user_type', 'consumer')}}
                    {{Form::file('profile_pic', ['id' => 'pro', 'style' => 'display:none;', 'onchange' => 'form.submit()'])}}
                  {!! Form::close() !!}
                  <img class="float-left rounded-circle m-0" onclick="proPic()" src="{{url(Auth::user()->getProfilePic())}}" alt="" style="width:40px;height:40px;object-fit:cover;">
                  <p class="m-0 mt-2 float-left" style="color:rgb(162,171,180);">{{ Auth::user()->getFullName() }}</p>
                @endguest
            </div>

            <!-- sign in dropdown-->
            <div class="hover-dropdown-content p-3 border" style="width:250px;padding:10px;right:0px;top:70px;background-color:#ffffff;  box-shadow: 3px 3px 12px #888888;">
              @guest
                <h6 style="color:rgba(33,37,41,0.8);">Get Started Now</h6>
                <div class="row" style="margin-right:-10px;margin-left:-10px;margin-bottom:5px;margin-top:15px;">
                    <div class="col" id="loginbutton">
                      <button class="btn btn-primary btn-sm float-left rounded-0 no-outline" type="button" data-toggle="modal" data-target="#LoginModalCenter">Sign In</button>
                    </div>
                    <div class="col" id="registerbutton">
                      <button class="btn btn-primary btn-sm float-right rounded-0 no-outline" type="button" data-toggle="modal" data-target="#RegisterModalCenter">Join Free</button>
                    </div>
                </div>
                <p class="text-center" style="margin:10px;margin-top:0px;color:rgba(33,37,41,0.8);">Or Continue with:</p>
                <div class="text-center" style="color:rgba(33,37,41,0.8);">
                  <a href="#">
                    <i class="fa fa-github" style="font-size:30px;margin:0px 10px;color:rgba(33,37,41,0.8);"></i>
                  </a>
                  <a href="#">
                    <i class="fa fa-facebook-official" style="font-size:30px;margin:0px 10px;color:rgba(33,37,41,0.8);"></i>
                  </a>
                  <a href="#">
                    <i class="fa fa-twitter" style="font-size:30px;margin:0px 10px;color:rgba(33,37,41,0.8);"></i>
                  </a>
                  <a href="#">
                    <i class="fa fa-instagram" style="font-size:30px;margin:0px 10px;color:rgba(33,37,41,0.8);"></i>
                  </a>
                </div>
              @else
              <h6 style="color:rgba(33,37,41,0.8);">Welcome back</h6>
              <div class="row m-0 p-0 mt-1">
                <div class="col">
                </div>
                <div class="col-7 p-0 m-0" style="position:relative; width:100%; height:100px;">
                  {!! Form::open(['action' => 'ModelControllers\ImageController@storeProfilePicture', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    {{Form::file('profile_pic', ['id' => 'pro', 'style' => 'display:none;', 'onchange' => 'form.submit()'])}}
                  {!! Form::close() !!}
                  <img class="rounded-circle m-0 p-0" onclick="proPic()" src="{{url(Auth::user()->getProfilePic())}}" alt="" style="cursor:pointer;width:100px;height:100px;object-fit:cover;position:absolute;">
                </div>
                <div class="col">
                </div>
              </div>
              <p class="mt-2 mb-0 text-center" style="color:rgb(162,171,180);">{{ Auth::user()->getFullName() }}</p>
              @endguest
                <h6 style="padding:5px;background-color:rgba(33,37,41,0.11);margin-top:10px;margin-bottom:10px;margin-right:-15px;margin-left:-15px;font-weight:600;color:rgba(33,37,41,0.8);">My Shop</h6>
                <ul class="list-group list-group-flush p-0 m-0">
                    <li class="list-group-item border-top-0 m-0" style="padding:2px;background-color:transparent;">
                      @if(Auth::check())
                        <a href="{{ route('consumer.profile')}}" style="text-decoration:none;color:rgba(33,37,41,0.8);">My Account</a>
                      @else
                        <a href="" style="text-decoration:none;color:rgba(33,37,41,0.8);" data-toggle="modal" data-target="#LoginModalCenter">My Account</a>
                      @endif
                    </li>
                    <li class="list-group-item border-top-0 m-0" style="padding:2px;background-color:transparent;">
                      <a href="{{route('cart.myOrders')}}" style="text-decoration:none;color:rgba(33,37,41,0.8);">My Orders</a>
                    </li>
                    <li class="list-group-item border-top-0 m-0" style="padding:2px;background-color:transparent;">
                      @if(Auth::check())
                        <a href="{{ route('myfavourites.index')}}" style="text-decoration:none;color:rgba(33,37,41,0.8);">My Favourites</a>
                      @else
                        <a href="" style="text-decoration:none;color:rgba(33,37,41,0.8);" data-toggle="modal" data-target="#LoginModalCenter">My Favourites</a>
                      @endif
                    </li>
                  @guest
                  @else
                    <li class="list-group-item border-top-0 m-0" style="padding:2px;background-color:transparent;">
                      <a href="{{ route($logout) }}" style="text-decoration:none;color:rgba(33,37,41,0.8);">Log Out</a>
                    </li>
                  @endguest
                </ul>
            </div>
          </div>

          <!--Cart-->
          @include('multiAuth.consumer.inc.cart')
      </div>
  </div>
</nav>

<!-- Login Modal -->
@include('multiAuth.consumer.inc.modals.loginModal')

<!-- Register Modal -->
@include('multiAuth.consumer.inc.modals.registerModal')

<!-- Checkout Modal -->
@include('multiAuth.consumer.inc.modals.payment')
