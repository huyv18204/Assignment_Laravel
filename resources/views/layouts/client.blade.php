<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.client_components.head')
    <title>@yield('title')</title>

</head>
<body>
@include('layouts.client_components.header')
@include('layouts.client_components.menu')
<div class="container my-4">
    <div class="row">
        @yield('content')
        @include('layouts.client_components.aside')
    </div>
</div>
@include('layouts.client_components.footer')
</body>
</html>

