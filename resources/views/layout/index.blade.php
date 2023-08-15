<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <!-- Link tới thư viện Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">Trang Chủ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('add')}}">Thêm Mới</a>
                </li>
            </ul>
            <form class="d-flex ms-auto" action="{{route('list')}}" method="POST">
                @csrf
                <input name="name" class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                <input class="btn btn-outline-success" type="submit" value="Tìm kiếm">
            </form>
        </div>
    </div>
</nav>
@include('layout.error')
@yield('content')

<!-- Link tới thư viện Bootstrap JS (cần để sử dụng các tính năng tương tác) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

