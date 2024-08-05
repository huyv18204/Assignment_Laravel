@extends('layouts.admin')

@section('title')
    Thêm Danh Mục
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

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mt-2 mb-2">
            <label class="form-label" for="name">Tên</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>

        <a href="{{ route('categories.index') }}" class="btn btn-danger">Quay Lại</a>
    </form>
@endsection
