@extends('layouts.admin')
@section('title')
    Chi tiết bài viết
@endsection
@section('content')
    <a class="btn btn-primary" href="{{route('posts.index')}}">Quay lại</a>
    <table class="table table-hover text-center mt-3">
        <thead>
        <tr>
            <th scope="col">Từ khoá</th>
            <th scope="col">Nội dung</th>
        </tr>
        </thead>
        <tbody>
        @foreach($post->toArray() as $key => $value)
            @if($key == "image")
                <tr>
                    <th scope="row">{{$key}}</th>
                    <td><img style="width: 263px; height: 210px" src="{{asset('storage/'.$value)}}" alt=""></td>
                </tr>
            @endif
            <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$value}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
