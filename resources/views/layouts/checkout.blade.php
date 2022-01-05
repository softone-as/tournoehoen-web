<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>@yield('title')</title>
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
    @include('includes.script')
  </head>

  <body>
    @include('includes.navbar-alternate')
    @yield('content')
    @include('includes.footer')
    @stack('prefend-script')
    @stack('addon-script')
  </body>
</html>