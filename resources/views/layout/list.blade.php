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
            <td>{{substr_replace(substr_replace($value->tel, '-', 4, 0),'-',9,0) }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center mt-4">
        @if ($data->lastPage() > 1)
            @if ($data->currentPage() > 1)
                <a href="{{ $data->url($data->currentPage() - 1) }}" class="mr-2"><< Quay lại</a>
            @endif

            @php
                $blocks = ceil($data->lastPage() / 3);
                $block = ceil($data->currentPage() / 3);
                $startPage = ($block - 1) * 3 + 1;
                $endPage = min($startPage + 2, $data->lastPage());
            @endphp

            @for ($i = $startPage; $i <= $endPage; $i++)
                @if ($i == $data->currentPage())
                    <span class="mr-2">{{ $i }}</span>
                @else
                    <a href="{{ $data->url($i) }}" class="mr-2">{{ $i }}</a>
                @endif
            @endfor

            @if ($data->currentPage() < $data->lastPage())
                <a href="{{ $data->url($data->currentPage() + 1) }}">Tiếp tục >></a>
            @endif
        @endif
    </div>


@endsection
