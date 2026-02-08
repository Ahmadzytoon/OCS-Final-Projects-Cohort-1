<!DOCTYPE html>
<html lang="en">

@include('layouts.partials.head')

  <body class="index-page d-flex flex-column min-vh-100">
  
    @include('layouts.partials.nav')

    <main class="main">
      @yield('content')
    </main>

      @include('layouts.partials.footer')
  </body>
</html>
