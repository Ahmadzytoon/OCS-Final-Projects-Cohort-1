<!DOCTYPE html>
<html lang="en">
@include('site.layout.head')
<body data-spy="scroll" data-target="site-navbar-target" data-offset="300">
<div class="site-wrap">
    @include('site.layout.header')
    
    @yield('content')

    @include('site.layout.footer')
</div>    

</body>
</html>