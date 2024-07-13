@extends('layouts.admin')
@section('content')
    <h1>Dashboard</h1>
    <nav class="navbar navbar-light bg-light">
        <form class="container-fluid justify-content-start">
            <a href="{{route('logout')}}" class="btn btn-sm btn-outline-secondary" type="button">Logout</a>
        </form>
        @dd(\Auth::user()->id)
    </nav>
@endsection
