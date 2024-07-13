@extends('layouts.admin')

@section('title')
    Add Post
@endsection

@section('content')
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mt-2 mb-2">
            <label class="form-label" for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control">
        </div>
        <div class="mt-2 mb-2">
            <label class="form-label" for="image">Image</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <div class="mt-2 mb-2">
            <div class="form-floating">
                <textarea name="content" class="form-control"  id="floatingTextarea2" style="height: 300px"></textarea>
                <label for="floatingTextarea2">Content</label>
            </div>
        </div>
        <div class="mt-2 mb-2">
            <label class="form-label" for="description">Description</label>
            <input type="text" id="description" name="description" class="form-control">
        </div>
        <div class="mt-2 mb-2">
            <label class="form-label" for="description">Category</label>
            <select class="form-select" name="category_id">
                <option selected value="">Chọn</option>
                @foreach($categoryPluck as $id => $name)
                    <option value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-success">Save</button>

        <a href="{{ route('categories.index') }}" class="btn btn-danger">Back</a>
    </form>
@endsection
