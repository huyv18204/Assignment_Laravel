@extends('layouts.admin')

@section('title')
    Thêm Bài Viết
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

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mt-2 mb-2">
            <label class="form-label" for="title">Tiêu đề</label>
            <input type="text" id="title" name="title" class="form-control">
        </div>
        <div class="mt-2 mb-2">
            <label class="form-label" for="image">Ảnh </label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <div class="mt-2 mb-2">
            <div class="form-floating">
                <textarea name="content" class="form-control"  id="floatingTextarea2" style="height: 300px"></textarea>
                <label for="floatingTextarea2">Nội dung</label>
            </div>
        </div>
        <div class="mt-2 mb-2">
            <label class="form-label" for="description">Mô tả</label>
            <input type="text" id="description" name="description" class="form-control">
        </div>
        <div class="mt-2 mb-2">
            <label class="form-label" for="description">Danh mục</label>
            <select class="form-select" name="category_id">
                <option selected value="">Chọn</option>
                @foreach($categoryPluck as $id => $name)
                    <option value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-success">Lưu</button>

        <a href="{{ route('posts.index') }}" class="btn btn-danger">Quay Lại</a>
    </form>
@endsection
