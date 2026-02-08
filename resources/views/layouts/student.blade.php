    <!DOCTYPE html>
    <html lang="en">

    <head>
        @include('partials.head')
    </head>

    <body>
        @include('student.partials.navbar')

        {{ $slot ?? '' }}
        @yield('content')

        @include('student.partials.footer')

        @include('partials.scripts')

        @stack('scripts')
    </body>

    </html>
