<!DOCTYPE html>
<html>
    <head>
        @include('layouts.components.admin.head')
    </head>
    <body>
        <header>
            @include('layouts.components.admin.header')
        </header>
        <nav>
            @include('layouts.components.admin.nav')
        </nav>
        <main>
            @yield('content')
        </main>
        <aside>
            @yield('aside')
        </aside>
        <footer>
            @include('layouts.components.admin.footer')
        </footer>
    </body>
</html>

{{-- https://www.cloudways.com/blog/create-laravel-blade-layout/ --}}