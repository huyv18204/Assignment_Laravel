@extends('layouts.admin')
@section('title')
    Post List
@endsection
@section('content')
    <a href="{{ route('posts.create') }}" class="btn btn-info">Create</a>
    <table class="table table-hover text-center mt-3">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Active</th>
            <th scope="col">Main Post</th>
            <th colspan="3" scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $key => $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td><img width="40px" src="{{asset('storage/'. $post->image)}}" alt=""></td>
                <td>{{$post->description}}</td>
                <td>
                    <form action="{{route('changeActive', $post->id)}}" method="post">
                        @method("PUT")
                        @csrf

                        @if($post->is_active == 1 || $post->is_active == true)

                            <button class="btn btn-danger">
                                DeActive
                            </button>
                        @else
                            <button class="btn btn-success">
                                Active
                            </button>
                        @endif


                    </form>
                </td>
                <td>
                    <form action="{{route('changeMainPost',$post->id)}}" method="post">
                        @method("PUT")
                        @csrf
                        @if($post->is_main == 1 || $post->is_main == true)

                            <button class="btn btn-danger">
                                DeActive
                            </button>
                        @else
                            <button class="btn btn-success">
                                Active
                            </button>
                        @endif
                    </form>
                </td>
                <td class="">
                    <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">Detail</a>

                </td>
                <td>
                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{route('posts.destroy',$post->id)}}">
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
    {{$posts->links()}}
@endsection
