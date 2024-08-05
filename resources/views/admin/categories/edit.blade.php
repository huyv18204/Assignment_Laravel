@extends('layouts.admin')

@section('title')
    Cập nhật danh mục
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

    <form action="{{ route('categories.update',$category->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mt-2 mb-2">
            <label class="form-label" for="name">Tên</label>
            <input value="{{$category->name}}" type="text" id="name" name="name" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>

        <a href="{{ route('categories.index') }}" class="btn btn-danger">Quay lại</a>
    </form>
@endsection
