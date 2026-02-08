<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>
    @include('visitor.partials.navbar')

    {{ $slot ?? '' }}
    @yield('content')

    @include('visitor.partials.footer')

    @include('partials.scripts')

    @stack('scripts')
</body>

</html>
