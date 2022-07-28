<!doctype html>
<html lang="en">
  @include('templates.head')

  <body class="antialiased bg-pattern">
    <div class="page">
      @include('templates.navbar')
      <div class="content">
        <div class="container-fluid" style='margin-top:-50px'>
          @yield('content')
        </div>
        @include('templates.footer')
      </div>
    </div>
    
    @include('templates.foot')
  </body>
</html>