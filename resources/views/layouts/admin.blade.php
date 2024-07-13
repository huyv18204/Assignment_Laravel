<!doctype html>
<html lang="en">
<head>
    <title>@yield("title")</title>
    @include('layouts.admin_components.head')
</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('layouts.admin_components.sidebar')
        <div class="col py-3">
            <div class="mx-4">
                <h3 class="mt-3">@yield("title")</h3>
                <div class="content mt-5">
                    @yield("content")
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
