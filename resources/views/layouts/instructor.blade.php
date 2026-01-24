<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    @livewireStyles
</head>

<body>
    @include('instructor.partials.navbar')

    @yield('content')

    @include('instructor.partials.footer')

    @include('partials.scripts')

    @stack('scripts')
    @livewireScripts
</body>

</html>
