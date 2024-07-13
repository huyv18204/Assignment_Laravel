@extends('layouts.admin')
@section('title')
    Categories Detail
@endsection
@section('content')
    <a class="btn btn-primary" href="{{route('categories.index')}}">Back</a>
    <table class="table table-hover text-center mt-3">
        <thead>
        <tr>
            <th scope="col">Key</th>
            <th scope="col">Value</th>
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
