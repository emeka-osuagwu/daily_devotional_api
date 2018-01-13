<!DOCTYPE html>
<html>
    <head>
        <title>Decree Your Day | @yield('title')</title>
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        @include('admin.includes.sections.links')
    </head>
    <body class="page-header-fixed compact-menu page-horizontal-bar">

        <main class="page-content content-wrap">

            @include('admin.includes.sections.main_nav')

            @yield('content')
            
            @include('admin.includes.sections.footer')
            
        </main>
    </body>
</html>