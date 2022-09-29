<!DOCTYPE html>
<html lang="en">
    @include('includes.head')
    <body>
        <!------------------------ HEADER START ---------------------->
        <!-- NAVBAR START -->
        @include('includes.header')
        <!-- NAVBAR END -->
        <!--------------- MAIN CONTENT START --------------->
        @yield('main-content')
        <!--------------- MAIN CONTENT START --------------->
        
        <!-- FOOTER START -->
        @if(!in_array(request()->route()->getName(), ['login', 'register']))
        @include('includes.footer')
        @endif
        <!-- FOOTER END -->
        @include('includes.js')
    </body>
</html>