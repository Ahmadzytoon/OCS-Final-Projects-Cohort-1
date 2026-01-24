  <nav id="header" class="header d-flex align-items-center sticky-top">
      <div class="container-fluid container-xl position-relative d-flex align-items-center">

          <a href="{{ route('visitor.home') }}" class="logo d-flex align-items-center me-auto">

              <img src="{{ asset('general/img/logo_2.png') }}" alt="">
          </a>

          <nav id="navmenu" class="navmenu">
              <ul>
                  <li><a href="{{ route('visitor.courses') }}">Browse Courses</a></li>
                  <li><a href="{{ route('visitor.pricing') }}">Pricing</a></li>
                  <li><a href="{{ route('about') }}">About</a></li>
                  <li><a href="{{ route('contact') }}">Contact</a></li>
                  <li><a href="{{ route('login') }}">Login</a></li>
              </ul>
              <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>
          <a class="btn-getstarted" href="{{ route('register') }}"><b>Sign Up</b></a>
      </div>
  </nav>
