@extends('layouts.admin')
@section('title')
   Danh Sách Bài Viết
@endsection
@section('content')
    <a href="{{ route('posts.create') }}" class="btn btn-info">Thêm Mới</a>
    <a href="{{ route('posts.trash') }}" class="btn btn-secondary">Thùng rác</a>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Hiển thị danh sách các bài viết -->


    <table class="table table-hover text-center mt-3">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tiêu đề</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Kích hoạt</th>
            <th scope="col">Bài viết chính</th>
            <th colspan="3" scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $key => $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td><img width="40px" src="{{asset('storage/'. $post->image)}}" alt=""></td>
                <td>{{$post->category->name}}</td>
                <td>{{$post->description}}</td>
                <td>
                    <form action="{{route('changeActive', $post->id)}}" method="post">
                        @method("PUT")
                        @csrf

                        @if($post->is_active == 1 || $post->is_active == true)

                            <button class="btn btn-danger">
                                Huỷ
                            </button>
                        @else
                            <button class="btn btn-success">
                                Kích hoạt
                            </button>
                        @endif


                    </form>
                </td>
                <td>
                    <form action="{{route('changeMainPost',$post->id)}}" method="post">
                        @method("PUT")
                        @csrf
                        @if($post->is_main == 1 || $post->is_main == true)

                            <button class="btn btn-danger">
                                Huỷ
                            </button>
                        @else
                            <button class="btn btn-success">
                                Kích hoạt
                            </button>
                        @endif
                    </form>
                </td>
                <td class="">
                    <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">Chi tiết</a>

                </td>
                <td>
                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-warning">Chỉnh sửa</a>
                </td>
                <td>
                    <form method="post" action="{{route('posts.destroy',$post->id)}}">
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
    {{$posts->links()}}
@endsection
