@extends('layouts.client')

@section('content')
    <main>
        <!-- About US Start -->
        <div class="about-area2 gray-bg pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Tittle -->
                        <div class="about-right mb-90">
                            <div class="about-img">
                                <img style="width:770px; height: 410px" src="{{asset('storage/'. $post->image)}}" alt="">
                            </div>
                            <div class="heading-news mb-30 pt-30">
                                <h3>{{$post->title}}</h3>
                            </div>
                            <div class="about-prea">
                                <p class="about-pera1 mb-25">{{$post->description}}.</p>
                                <p class="about-pera1 mb-25">
                                   {{$post->content}}
                            </div>
                            <p>{{ $post->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="most-recent-area">
                            <!-- Section Tittle -->
                            <div class="small-tittle mb-20">
                                <h4>Tin liên quan</h4>
                            </div>


                            @foreach($postByCategory as $post)
                            <div class="most-recent-single">
                                <div class="most-recent-images">
                                    <img style="width: 85px; height: 79px" src="{{asset('storage/'. $post->image)}}" alt="">
                                </div>
                                <div class="most-recent-capt">
                                    <h4><a href="{{route('latest.news.page',$post->id)}}">{{$post->title}}</a></h4>
                                    <p>{{ $post->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About US End -->
    </main>
@endsection
@section('title')
    Latest News
@endsection
