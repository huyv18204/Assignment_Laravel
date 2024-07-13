@extends('layouts.admin')
@section('title')
    Categories List
@endsection
@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-info">Create</a>
    <table class="table table-hover text-center mt-3">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th colspan="3" scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $key => $category)
            <tr>

                <th scope="row">{{$key + 1}}</th>
                <td>{{$category->name}}</td>
                <td class="">
                    <a href="{{route('categories.show',$category->id)}}" class="btn btn-primary">Detail</a>


                </td>
                <td>
                    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <form class="" method="post" action="{{route('categories.destroy',$category->id)}}">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Bạn có muốn xoá không')"
                                class="btn btn-danger"
                                type="submit">Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$data->links()}}
@endsection
