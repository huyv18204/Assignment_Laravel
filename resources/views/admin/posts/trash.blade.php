@extends('layouts.admin')
@section('title')
    Post Trash
@endsection
@section('content')
    <a href="{{ route('posts.index') }}" class="btn btn-info">Quay lại</a>

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
            <th scope="col">Mô tả</th>
            <th colspan="3" scope="col">Hành động</th>


        </tr>
        </thead>
        <tbody>
        @foreach($posts as $key => $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td><img width="40px" src="{{asset('storage/'. $post->image)}}" alt=""></td>
                <td>{{$post->description}}</td>

                <td>
                    <form method="post" action="{{route('posts.restore',$post->id)}}">
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
    {{$posts->links()}}
@endsection
