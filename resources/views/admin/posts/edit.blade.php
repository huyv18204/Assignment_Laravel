@extends('layouts.admin')

@section('title')
    Cập Nhật Bài Vết
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form tạo bài viết mới -->

    <form action="{{ route('posts.update',$posts->id) }}" method="POST" enctype="multipart/form-data">
        @method("PUT")
        @csrf

        <div class="mt-2 mb-2">
            <label class="form-label" for="title">Tiêu đề</label>
            <input value="{{$posts->title}}" type="text" id="title" name="title" class="form-control">
        </div>
        <div class="mt-2 mb-2">
            <label class="form-label" for="image">Ảnh</label>
            <input type="file" id="image" name="image" class="form-control">
            <img class="mt-3" width="200" src="{{asset('storage/'. $posts->image)}}" alt="">
        </div>

        <div class="mt-2 mb-2">
            <div class="form-floating">
                <textarea name="content" class="form-control"  id="floatingTextarea2" style="height: 150px">{{$posts->content}}</textarea>
                <label for="floatingTextarea2">Nội dung</label>
            </div>
        </div>

        <div class="mt-2 mb-2">
            <label class="form-label" for="description">Mô tả</label>
            <input value="{{$posts->description}}" type="text" id="description" name="description" class="form-control">
        </div>
        <div class="mt-2 mb-2">
            <label class="form-label" for="description">Danh mục</label>
            <select class="form-select" name="category_id">
                <option selected value="">Chọn</option>
                @foreach($categoryPluck as $id => $name)
                    <option {{$id == $posts->category_id ? 'selected' : ""}} value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Cập Nhật</button>

        <a href="{{ route('posts.index') }}" class="btn btn-danger">Quay lại</a>
    </form>
@endsection
