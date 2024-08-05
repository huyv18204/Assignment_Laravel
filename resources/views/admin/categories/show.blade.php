@extends('layouts.admin')
@section('title')
    Chi tiết danh mục
@endsection
@section('content')
    <a class="btn btn-primary" href="{{route('categories.index')}}">Quay lại</a>
    <table class="table table-hover text-center mt-3">
        <thead>
        <tr>
            <th scope="col">Từ khoá</th>
            <th scope="col">Nội dung</th>
        </tr>
        </thead>
        <tbody>
        @foreach($category->toArray() as $key => $value)
            <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$value}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
