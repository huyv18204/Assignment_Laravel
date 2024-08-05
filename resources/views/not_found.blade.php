<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <h1>404 Not Found</h1>
    <p>Trang bạn yêu cầu không tồn tại.</p>
    <a href="{{ route('home.page') }}">Quay lại trang chính</a>
</div>
</body>
</html>
