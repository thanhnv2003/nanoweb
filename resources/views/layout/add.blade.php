@extends('layout.index')
@section('content')
    <div class="container mt-5">
        <h2>Đăng ký nhân viên mới</h2>
        <form method="POST" action="{{ route('add') }}">
            @csrf <!-- CSRF Token -->
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" class="form-control" id="name" name="name" >
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" >
            </div>
            <div class="form-group">
                <label for="tel">Tel:</label>
                <input type="text" class="form-control" id="tel" name="tel" >
            </div>
            <button type="submit" class="btn btn-primary my-3">Register</button>
            <button type="button" onclick="window.location.href='{{route('list')}}'" class="btn btn-primary my-3 mx-3">Back</button>
        </form>
    </div>
@endsection
