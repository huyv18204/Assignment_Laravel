<!doctype html>
<html class="no-js" lang="zxx">
@include('layouts.client_components.head')

<body>
@include('layouts.client_components.loading')
@include('layouts.client_components.header')
@yield('content')
@include('layouts.client_components.footer')
@include('layouts.client_components.script')
</body>
</html>
