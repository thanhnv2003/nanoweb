@extends('layout.index')
@section('content')
    <div class="container mt-5">
        <h2>Biên soạn thông tin nhân viên</h2>
        <form method="POST" action="{{ route('edit', [$data->id]) }}">
            @csrf <!-- CSRF Token -->
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" class="form-control" id="name" name="name" value="{!! htmlspecialchars_decode($data->name) !!}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}">
            </div>
            <div class="form-group">
                <label for="tel">Tel:</label>
                <input type="text" class="form-control" id="tel" name="tel" value="{{ substr_replace($data->tel, '-', 4, 0) }}">
            </div>
            <button type="submit" class="btn btn-primary my-3">Update</button>
            <button type="reset" class="btn btn-primary my-3 mx-3">Delete</button>
            <button type="button" onclick="window.location.href='{{route('list')}}'" class="btn btn-primary my-3 mx-3">Back</button>
        </form>
    </div>
@endsection
