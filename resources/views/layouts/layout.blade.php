<!DOCTYPE html>
<html>
<head>
@include('layouts.components.head')
</head>
<body>
<header>
@include('layouts.components.header')
</header>
<main>
@yield('content')
</main>
<footer>
@include('layouts.components.footer')
</footer>
</body>
</html>