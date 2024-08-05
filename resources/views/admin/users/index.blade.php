@extends('layouts.admin')
@section('title')
    Danh sách người dùng
@endsection
@section('content')
    <a href="{{ route('users.trash') }}" class="btn btn-secondary">Thùng rác</a>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-hover text-center mt-3">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên</th>
            <th scope="col">Email</th>
            <th scope="col">Admin</th>
            <th scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key => $user)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <form action="{{ route('users.update', $user->id) }}" method="post">
                        @method("PUT")
                        @csrf
                        @if($user->is_admin == 1 || $user->is_active == true)
                            <button type="submit" class="btn btn-danger">Huỷ</button>
                        @else
                            <button type="submit" class="btn btn-success">Kích hoạt</button>
                        @endif
                    </form>

                <td>
                    <form class="" method="post" action="{{route('users.destroy',$user->id)}}">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Bạn có muốn xoá không')"
                                class="btn btn-danger"
                                type="submit">Xoá
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$users->links()}}
@endsection
