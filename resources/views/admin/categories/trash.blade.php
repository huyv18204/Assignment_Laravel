@extends('layouts.admin')
@section('title')
    Thùng rác danh mục
@endsection
@section('content')
    <a href="{{ route('categories.index') }}" class="btn btn-danger">Quay lại</a>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-hover text-center mt-3">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên</th>
            <th colspan="3" scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $key => $category)
            <tr>

                <th scope="row">{{$key + 1}}</th>
                <td>{{$category->name}}</td>
                <td>
                    <form class="" method="post" action="{{route('categories.restore',$category->id)}}">
                        @method('PUT')
                        @csrf
                        <button onclick="return confirm('Bạn có muốn khôi phục không')"
                                class="btn btn-danger"
                                type="submit">Khôi phục
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$data->links()}}
@endsection
