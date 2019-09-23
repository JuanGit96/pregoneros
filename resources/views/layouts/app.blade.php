<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @section('head')
        @include('layouts.head')
        @show
    </head>
    <div id="app">
        <body>
            @yield('content')
            @include('layouts.footer')
            @include('layouts.scripts')
            @yield('scripts')
        </body>
    </div>
</html>