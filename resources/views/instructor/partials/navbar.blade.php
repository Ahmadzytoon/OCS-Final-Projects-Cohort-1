   <nav id="header" class="header d-flex align-items-center sticky-top">
       <div class="container-fluid container-xl position-relative d-flex align-items-center">

           <!-- Logo -->
           <a href="{{ route('instructor.home') }}" class="logo d-flex align-items-center me-auto">
               <img src="{{ asset('general/img/logo_2.png') }}" alt="CodeQuest">
           </a>

           <!-- Navigation -->
           <nav id="navmenu" class="navmenu">
               <ul>
                   <li>
                       <a href="{{ route('instructor.home') }}" class="active">Home</a>
                   </li>
                   <li>
                       <a href="{{ route('instructor.generate-course') }}">Generate Course</a>
                   </li>
                   <li>
                       <a href="{{ route('about') }}">About</a>
                   </li>
                   <li>
                       <a href="{{ route('contact') }}">Contact</a>
                   </li>
               </ul>
               <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
           </nav>

           <!-- Header Actions -->
           <div class="d-flex align-items-center gap-3 ms-4">

               <!-- User Profile Dropdown -->
               <div class="dropdown">
                   <a href="#" class="d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false"
                       style="text-decoration: none; color: inherit;">
                       @if(Auth::user()->profile_picture)
                            <img src="{{ asset(Auth::user()->profile_picture) }}" alt="Profile" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                       @else
                           <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white"
                               style="width: 40px; height: 40px; font-weight: 600;">
                               {{ substr(Auth::user()->name, 0, 2) }}
                           </div>
                       @endif
                   </a>
                   <ul class="dropdown-menu dropdown-menu-end">
                       <li class="dropdown-header">
                           <div class="fw-semibold">{{ Auth::user()->name }}</div>
                       </li>
                       <li>
                           <hr class="dropdown-divider">
                       </li>
                       <li>
                           <a class="dropdown-item" href="/instructor/profile">
                               <i class="bi bi-person me-2"></i>My Profile
                           </a>
                       </li>
                       <li>
                           <hr class="dropdown-divider">
                       </li>
                       <li>
                           <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                               @csrf
                               <button type="submit" class="dropdown-item text-danger">
                                   <i class="bi bi-box-arrow-right me-2"></i>Logout
                               </button>
                           </form>
                       </li>
                   </ul>
               </div>

           </div>

       </div>
   </nav>
