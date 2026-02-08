<!DOCTYPE html>
<html lang="en">
@include('admin.layout.head')
<body>
    <div id="wrapper">  
        @include('admin.layout.sidebar')

        @yield('content')

        
    </div>
    @include('admin.layout.footer')
</body>
</html>