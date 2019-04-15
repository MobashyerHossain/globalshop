<footer class="m-0 pt-4 pb-2">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 footer-navigation">
                <h4>
                  <a class="text-secondary" href="{{ route('index')}}" style="text-decoration:none;">Grim Reapers Automobiles</a>
                </h4>
                <p class="links">
                  <a href="{{route('find.car.maker', rand(1,4))}}">Cars</a>
                  <strong> · </strong>
                  <a href="{{route('find.part.category', rand(1,5))}}">Spare Parts</a>
                </p>
                <p class="company-name">Designed by Grim Reapers © 2018</p>
            </div>

            <div class="col-md-4 col-sm-6 footer-contacts mt-0">
                <div>
                  <span class="fa fa-map-marker footer-contacts-icon"></span>
                  <p class="mt-2">
                    <span class="new-line-span">Bashundhara , Baridhara, B block</span> Dhaka, Bangladesh
                  </p>
                </div>
                <div>
                  <span class="fa fa-phone footer-contacts-icon"></span>
                  <p class="footer-center-info email text-left mt-2"> +8801676409204</p>
                </div>
                <div>
                  <span class="fa fa-envelope footer-contacts-icon"></span>
                  <p class="footer-center-info email text-left mt-2">support@grimreapers.com</p>
                </div>
            </div>

            <div class="col-md-4 footer-about">
                <h4>About the company</h4>
                <p>One of the finest places for car inventory: providing different car models, appropiate services &amp; relaiable accessories.</p>
                <div class="social-links social-icons">
                  <a href="#">
                    <i class="fa fa-facebook text-secondary" style="font-size:16px;"></i>
                  </a>
                  <a href="#">
                    <i class="fa fa-twitter text-secondary" style="font-size:16px;"></i>
                  </a>
                  <a href="#">
                    <i class="fa fa-linkedin text-secondary" style="font-size:16px;"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram text-secondary" style="font-size:16px;"></i>
                </a>
                </div>
            </div>
        </div>
    </div>
</footer>
