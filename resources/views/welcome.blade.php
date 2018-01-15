<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        @include('admin.includes.sections.links')
    </head>
    <body>
        <div class="row">
            @yield('content')
        </div>
    </body>
</html>