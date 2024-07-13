@extends('layouts.admin')

@section('title')
    Add Category
@endsection

@section('content')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mt-2 mb-2">
            <label class="form-label" for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>

        <a href="{{ route('categories.index') }}" class="btn btn-danger">Back</a>
    </form>
@endsection
