@extends('layouts.admin')

@section('title')
    Edit Post
@endsection

@section('content')
    <form action="{{ route('posts.update',$posts->id) }}" method="POST" enctype="multipart/form-data">
        @method("PUT")
        @csrf

        <div class="mt-2 mb-2">
            <label class="form-label" for="title">Title</label>
            <input value="{{$posts->title}}" type="text" id="title" name="title" class="form-control">
        </div>
        <div class="mt-2 mb-2">
            <label class="form-label" for="image">Image</label>
            <input type="file" id="image" name="image" class="form-control">
            <img class="mt-3" width="200" src="{{asset('storage/'. $posts->image)}}" alt="">
        </div>

        <div class="mt-2 mb-2">
            <div class="form-floating">
                <textarea name="contents" class="form-control"  id="floatingTextarea2" style="height: 150px">{{$posts->content}}</textarea>
                <label for="floatingTextarea2">Content</label>
            </div>
        </div>

        <div class="mt-2 mb-2">
            <label class="form-label" for="description">Description</label>
            <input value="{{$posts->description}}" type="text" id="description" name="description" class="form-control">
        </div>
        <div class="mt-2 mb-2">
            <label class="form-label" for="description">Category</label>
            <select class="form-select" name="category_id">
                <option selected value="">Chọn</option>
                @foreach($categoryPluck as $id => $name)
                    <option {{$id == $posts->category_id ? 'selected' : ""}} value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>

        <a href="{{ route('categories.index') }}" class="btn btn-danger">Back</a>
    </form>
@endsection
