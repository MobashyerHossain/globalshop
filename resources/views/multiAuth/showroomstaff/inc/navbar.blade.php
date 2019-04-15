<!-- Navbar -->
<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class=" container-fluid  ">
        <a class="navbar-brand" href="#"> @yield('title') </a>
        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="nav navbar-nav mr-auto">
                <li class="dropdown nav-item">
                    <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="nc-icon nc-planet"></i>
                        <span class="notification">2</span>
                        <span class="d-lg-none">Notification</span>
                    </a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="#">Notification 1</a>
                        <a class="dropdown-item" href="#">Notification 2</a>
                        <a class="dropdown-item" href="#">Notification 3</a>
                        <a class="dropdown-item" href="#">Notification 4</a>
                        <a class="dropdown-item" href="#">Another notification</a>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="dropdown nav-item">
                    <a href="" class="nav-link" data-toggle="dropdown">
                      <img class="rounded-circle m-0" style="width:30px;height:30px;object-fit:cover;cursor:pointer;" src="{{ url(Auth::user()->getProfilePic()) }}">
                      <span class="mt-1 ml-2">{{Auth::user()->getFullname()}}</span>
                    </a>
                    <ul class="dropdown-menu rounded-0">
                        <a class="dropdown-item" href="{{ route('showroomstaff.password.request') }}">Change Password</a>
                        <a class="dropdown-item" href="{{ route('showroomstaff.logout')}}">Log out</a>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
