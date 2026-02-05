<!DOCTYPE html>
<html lang="en">


@include('layouts.head')
@livewireStyles


<body>

    @include('layouts.admin_sidebar')




    <main class="dashboard-main">


        @yield('content')


    </main>




    @yield('js')
        @livewireScripts


</body>

</html>
