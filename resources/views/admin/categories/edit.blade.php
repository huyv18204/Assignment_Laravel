@extends('layouts.admin')

@section('title')
    Edit Category
@endsection

@section('content')
    <form action="{{ route('categories.update',$category->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mt-2 mb-2">
            <label class="form-label" for="name">Name</label>
            <input value="{{$category->name}}" type="text" id="name" name="name" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>

        <a href="{{ route('categories.index') }}" class="btn btn-danger">Back</a>
    </form>
@endsection
