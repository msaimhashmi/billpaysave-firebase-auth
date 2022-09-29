<!DOCTYPE html>
<html lang="en">
  @include('admin.includes.head')
  @auth
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      @include('admin.includes.sidebar')
        
      @include('admin.includes.header')
      
      @yield('main-content')

      @include('admin.includes.footer')
        
      <aside class="control-sidebar control-sidebar-dark">
      </aside>
    </div>
    @include('admin.includes.js')
  </body>
  @endauth

  @guest
  <body class="hold-transition login-page">
    
    @yield('main-content')

    @include('admin.includes.js')
  </body>
  @endguest
</html>