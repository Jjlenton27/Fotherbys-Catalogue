<!DOCTYPE html>
<html>
    <head>
        @include('layouts.components.head')
    </head>
    <body>
        <header>
            @include('layouts.components.header')
        </header>
        <nav>
            @include('layouts.components.nav')
        </nav>
        <main>
            @yield('content')
        </main>
        <aside>
            @yield('aside')
        </aside>
        <footer>
            @include('layouts.components.footer')
        </footer>
    </body>
</html>

{{-- https://www.cloudways.com/blog/create-laravel-blade-layout/ --}}
