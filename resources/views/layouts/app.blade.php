<!DOCTYPE html>
<html lang="en">
@include('partials._head')

<body id="app-layout">
  @include('partials._nav')

  @include('partials._messages')

    @yield('content')

    @yield('scripts')

    <!-- JavaScripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    {{--<script src="js/slide.js"></script>
     <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
