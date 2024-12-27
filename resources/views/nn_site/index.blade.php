<!DOCTYPE html>
<html lang="{{ getCurrentLocale() }}">

    <head>
        @include('nn_site.partials.head')
    </head>
    <!-- head -->

    <body class="en">
        
        {!!$siteSettings->tags_body!!}

        @yield('content')
        <!-- content -->

        @include('nn_site.partials.footer')
        <!-- footer -->

        <a href="#" id="scroll-top-btn"></a>
        
        @include('nn_site.partials.scripts')
        
       <script type="module" async>
            if (window.location.pathname == "/public/") {
              window.location.href = 'https://myvaluta.ge/'; 
            }
        </script>

    </body>

</html>