<!DOCTYPE html>
<html lang="en">
    @include('user.includes.head')
    <body>
        <main>
            @include('user.includes.header')
            @yield('main-content')
        </main>

        @include('user.includes.js')
    </body>
</html>