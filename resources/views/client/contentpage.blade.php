@extends('layouts.client')

@section('content')
    <div class="col-md-8">
        <div>
            <h3>{{$post->title}}</h3>
            <div class=" mt-4">

                {{$post->content}}

            </div>
        </div>
        <div class="mt-5">
            <h3>Tin liên quan</h3>
            <div class="row mt-4">

                @foreach($postByCategory as $postInDay)
                    <div class="col-md-3">
                        <a class="text-decoration-none" href="{{route('contentPage',$postInDay->id)}}">
                            <div class="news-card card mb-4">
                                <img src="{{asset('storage/'.$postInDay->image)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">{{$postInDay->title}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('title')
    Trang chủ
@endsection
