@extends('layouts.client')

@section('content')
    <div class="col-md-8">
        <div>
            <h3>{{$category->name}}</h3>
            <div class="row mt-4">
                @foreach($mainPosts as $index => $mainPost)
                    @if($index == 0)
                        <div class="col-md-12">
                            <a class="text-decoration-none" href="{{route('contentPage',$mainPost->id)}}">
                                <div class="news-card card mb-4">
                                    <img src="{{asset('storage/'.$mainPost->image)}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$mainPost->title}}</h5>
                                        <p class="card-text">{{$mainPost->description}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col-md-4 ">
                            <a class="text-decoration-none" href="{{route('contentPage',$mainPost->id)}}">
                                <div class="news-card card mb-4">
                                    <img src="{{asset('storage/'.$mainPost->image)}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$mainPost->title}}</h5>
                                        <p class="card-text">{{$mainPost->description}}</p>
                                    </div>
                                </div>
                            </a>

                        </div>
                    @endif
                @endforeach

            </div>
        </div>
        <div class="mt-5">
                <h3>Tin trong ngày</h3>
            <div class="row mt-4">

                @foreach($postsInDay as $postInDay)
                    <div class="col-md-3">
                        <a class="text-decoration-none" href="{{route('contentPage',$postInDay->id)}}">
                            <div class="news-card card mb-4">
                                <img src="{{asset('storage/'.$postInDay->image)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$postInDay->title}}</h5>
                                    <p class="card-text">{{$postInDay->description}}</p>
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
    {{$category->name}}
@endsection
