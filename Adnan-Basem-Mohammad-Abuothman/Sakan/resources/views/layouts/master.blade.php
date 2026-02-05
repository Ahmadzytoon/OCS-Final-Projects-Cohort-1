<!DOCTYPE html>
<html lang="en">

@include('layouts.head')
@livewireStyles

<body @yield('class')>


    @include('layouts.header')




    <main class="">

        @yield('content')

    </main>




    @include('layouts.footer')



    @yield('js')
    @livewireScripts

</body>

</html>
