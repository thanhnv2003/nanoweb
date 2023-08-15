@extends('layout.index')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Họ và tên</th>
            <th scope="col">Email</th>
            <th scope="col">Tel</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $value)
        <tr>
            <th scope="row"><a href="{{route('edit', [$value->id])}}">{{$value->id}}</a></th>
            <td>{!! htmlspecialchars_decode($value->name) !!}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->tel}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination">
        @if ($data->lastPage() > 1)
            {{-- Nút quay lại trang trước --}}
            @if ($data->currentPage() > 1)
                <a href="{{ $data->url($data->currentPage() - 1) }}"><< Quay lại |</a>
            @endif

            {{-- Hiển thị các trang --}}
            @php
                $blocks = ceil($data->lastPage() / 3); // Số khối trang (mỗi khối có 3 trang)
                $block = ceil($data->currentPage() / 3); // Khối trang hiện tại
                $startPage = ($block - 1) * 3 + 1; // Trang đầu của khối trang
                $endPage = min($startPage + 2, $data->lastPage()); // Trang cuối của khối trang
            @endphp

            @for ($i = $startPage; $i <= $endPage; $i++)
                @if ($i == $data->currentPage())
                    <span>{{ $i }} |</span>
                @else
                    <a href="{{ $data->url($i) }}">{{ $i }} |</a>
                @endif
            @endfor

            {{-- Nút đi tới trang sau --}}
            @if ($data->currentPage() < $data->lastPage())
                <a href="{{ $data->url($data->currentPage() + 1) }}"> Tiếp tục >></a>
            @endif
        @endif
    </div>

@endsection
