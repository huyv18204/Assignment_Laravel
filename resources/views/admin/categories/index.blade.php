@extends('layouts.admin')
@section('title')
    Danh sách danh mục
@endsection
@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-info">Thêm mới</a>
    <a href="{{ route('categories.trash') }}" class="btn btn-secondary">Thùng rác</a>

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
                <td class="">
                    <a href="{{route('categories.show',$category->id)}}" class="btn btn-primary">Chi tiết</a>


                </td>
                <td>
                    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning">Chỉnh sửa</a>
                </td>
                <td>
                    <form class="" method="post" action="{{route('categories.destroy',$category->id)}}">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Bạn có muốn xoá không')"
                                class="btn btn-danger"
                                type="submit">Xoá
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$data->links()}}
@endsection
