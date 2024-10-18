<!doctype html>
<html lang="en">
 <!--// //-->
 <head>
  @include('partials/head')
 </head>
 <body>

  @include('partials/nav')
  @yield('hero')
  @yield('blog_header')
  <div class="container">
   <div class="stretch">
   @include('partials/message')
   @yield('content')
    </div>
  </div>
  @include('partials/hero_footer')
  
  @include('partials/javascript')
  @yield('scripts')
  
 </body>
</html>