<!DOCTYPE html>
<html lang="{{ getCurrentLocale() }}">

    <head>
        @include('nn_site.partials.head')
    </head>

    <body class="en">

        @yield('content')


        @include('nn_site.partials.footer')

        @include('nn_site.partials.scripts')
    </body>
</html>
