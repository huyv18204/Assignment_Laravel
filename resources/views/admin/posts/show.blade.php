@extends('layouts.admin')
@section('title')
    Post Detail
@endsection
@section('content')
    <a class="btn btn-primary" href="{{route('posts.index')}}">Back</a>
    <table class="table table-hover text-center mt-3">
        <thead>
        <tr>
            <th scope="col">Key</th>
            <th scope="col">Value</th>
        </tr>
        </thead>
        <tbody>
        @foreach($post->toArray() as $key => $value)
            <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$value}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
