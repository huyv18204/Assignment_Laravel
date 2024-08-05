@extends('layouts.client')

@section('content')
    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix pt-25 gray-bg">
            <div class="container">
                <div class="trending-main">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Top -->
                            <div class="slider-active">
                                @if($mainPosts)
                                    @foreach($mainPosts as $index => $mainPost)
                                        @php
                                            if($index == 2){
                                                break;
                                            }
                                        @endphp
                                        <div class="single-slider">
                                            <div class="trending-top mb-30">
                                                <div class="trend-top-img">
                                                    <img style="height: 660px"
                                                         src="{{ asset('storage/'. $mainPost->image) }}" alt="">
                                                    <div class="trend-top-cap">
                                                <span class="bgr" data-animation="fadeInUp" data-delay=".2s"
                                                      data-duration="1000ms">{{$mainPost->category->name}}</span>
                                                        <h2><a href="{{route('latest.news.page',$mainPost->id)}}"
                                                               data-animation="fadeInUp"
                                                               data-delay=".4s"
                                                               data-duration="1000ms">{{$mainPost->title}}</a></h2>
                                                        <p data-animation="fadeInUp" data-delay=".6s"
                                                           data-duration="1000ms">{{$mainPost->created_at->format('M d, Y')}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- Right content -->
                        <div class="col-lg-4">
                            <!-- Trending Top -->
                            <div class="row">

                                @php
                                    use Carbon\Carbon;
                                       $post = $mainPosts->get(3);
                                       if($post){
                                        $createdAt = Carbon::parse($post->created_at);
                                       }

                                @endphp
                                @if(!empty($mainPosts->toArray()[3]))
                                    <div class="col-lg-12 col-md-6 col-sm-6">
                                        <div class="trending-top mb-30">
                                            <div class="trend-top-img">
                                                <img src="{{ asset('storage/'. $mainPosts->toArray()[3]['image']) }}"
                                                     alt="">
                                                <div class="trend-top-cap trend-top-cap2">
                                                <span
                                                    class="bgb">{{$mainPosts->toArray()[3]['category']['name']}}</span>
                                                    <h2>
                                                        <a href="{{route('latest.news.page',$mainPosts->toArray()[3]['id'])}}">{{$mainPosts->toArray()[3]['title']}}</a>
                                                    </h2>
                                                    @php

                                                        $createdAt = Carbon::parse($mainPosts->toArray()[3]['created_at']);
                                                    @endphp
                                                    <p>{{ $createdAt->format('M d, Y') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @php

                                       $post = $mainPosts->get(4);
                                       if($post){
                                        $createdAt = Carbon::parse($post->created_at);
                                       }

                                @endphp

                                @if($post)
                                    <div class="col-lg-12 col-md-6 col-sm-6">
                                        <div class="trending-top mb-30">
                                            <div class="trend-top-img">
                                                <img src="{{ asset('storage/' . $post->image) }}" alt="">
                                                <div class="trend-top-cap trend-top-cap2">
                                                    <span class="bgb">{{ $post->category->name }}</span>
                                                    <h2>
                                                        <a href="{{ route('latest.news.page', $post->id) }}">{{ $post->title }}</a>
                                                    </h2>
                                                    <p>{{ $createdAt->format('M d, Y') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->
        <!-- Whats New Start -->
        <section class="whats-news-area pt-50 pb-20 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="whats-news-wrapper">
                            <!-- Heading & Nav Button -->
                            <div class="row justify-content-between align-items-end mb-15">
                                <div class="col-xl-4">
                                    <div class="section-tittle mb-30">
                                        <h3>Tin Mới</h3>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-md-9">
                                    <div class="properties__button">
                                        <!--Nav Button  -->
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                @foreach($menus as $menu)
                                                    <a class="nav-item nav-link {{ $loop->first ? 'active' : '' }}"
                                                       id="nav-{{ $menu->id }}-tab" data-toggle="tab"
                                                       href="#nav-{{ $menu->id }}" role="tab"
                                                       aria-controls="nav-{{ $menu->id }}"
                                                       aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                        {{$menu->name}}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </nav>
                                        <!--End Nav Button  -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab content -->
                            <div class="tab-content" id="nav-tabContent">
                                @foreach($menus as $menu)
                                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                         id="nav-{{ $menu->id }}" role="tabpanel"
                                         aria-labelledby="nav-{{ $menu->id }}-tab">
                                        <div class="row">
                                            @if($postsByCategory[$menu->id]->isNotEmpty())
                                                <!-- Left Details Caption -->
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="whats-news-single mb-40 mb-40">
                                                        <div class="whates-img">
                                                            <img
                                                                src="{{ asset('storage/' . $postsByCategory[$menu->id]->first()->image) }}"
                                                                alt="">
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4>
                                                                <a href="{{route('latest.news.page',$postsByCategory[$menu->id]->first()->id)}}">{{ $postsByCategory[$menu->id]->first()->title }}</a>
                                                            </h4>
                                                            <span>{{ $postsByCategory[$menu->id]->first()->created_at->format('M d, Y') }}</span>
                                                            <p>{{ $postsByCategory[$menu->id]->first()->description }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right single caption -->
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        @foreach($postsByCategory[$menu->id]->skip(1) as $post)
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20">
                                                                    <div class="whats-right-img">
                                                                        <img style="width: 170px; height: 105px"
                                                                             src="{{ asset('storage/'. $post->image) }}"
                                                                             alt="">
                                                                    </div>
                                                                    <div class="whats-right-cap">
                                                                        <span class="colorb">{{ $menu->name }}</span>
                                                                        <h6><a style="font-size: 14px"
                                                                               href="{{route('latest.news.page',$post->id)}}">{{ $post->title }}</a>
                                                                        </h6>
                                                                        <p>{{ $post->created_at->format('M d, Y') }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                <p>No posts available in this category.</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Banner -->
                        <div class="banner-one mt-20 mb-30">
                            <img src={{asset("news-master/assets/img/gallery/body_card1.png")}} alt="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="most-recent-area">
                            <!-- Section Tittle -->
                            <div class="small-tittle mb-20">
                                <h4>Mới thêm gần đây</h4>
                            </div>

                            <!-- Single -->


                            @foreach($newPosts as $newPost)
                                <div class="most-recent mb-40">
                                    <div class="most-recent-img">
                                        <img src="{{ asset('storage/'. $newPost->image) }}" alt="">
                                        <div class="most-recent-cap" style="width: 230px">
                                            <span class="bgbeg">{{$newPost->category->name}}</span>
                                            <h4><a href="{{route('latest.news.page',$newPost->id)}}">{{$newPost->title}}
                                                    .
                                                </a></h4>
                                            <p>{{ $newPost->created_at->format('M d, Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Whats New End -->
        <!--   Weekly2-News start -->
        <div class="weekly2-news-area pt-50 pb-30 gray-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <div class="row">
                        <!-- Banner -->
                        <div class="col-lg-3">
                            <div class="home-banner2 d-none d-lg-block">
                                <img src={{asset('news-master/assets/img/gallery/body_card2.png')}} alt="">
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="slider-wrapper">
                                <!-- section Tittle -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="small-tittle mb-30">
                                            <h4>Most Popular</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- Slider -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="weekly2-news-active d-flex">
                                            @foreach($mostPopulars as $mostPopular)
                                                <div class="weekly2-single">
                                                    <div class="weekly2-img">
                                                        <img style="height: 215px; width: 270px"
                                                             src={{asset('storage/'.$mostPopular->image)}}>
                                                    </div>
                                                    <div class="weekly2-caption">
                                                        <h4>
                                                            <a href="{{route('latest.news.page',$mostPopular->id)}}">{{$mostPopular->title}}
                                                                e</a>
                                                        </h4>
                                                        <p>{{ $mostPopular->created_at->format('M d, Y') }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->
        <!--   Weekly3-News start -->
        <div class="weekly3-news-area pt-80 pb-130">
            <div class="container">
                <div class="weekly3-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-wrapper">
                                <!-- Slider -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="weekly3-news-active dot-style d-flex">
                                            @foreach($randomPosts as $postRand)
                                                <div class="weekly3-single">
                                                    <div class="weekly3-img">
                                                        <img style="height: 215px" src="{{ asset('storage/' . $postRand->image) }}"
                                                             alt="{{ $postRand->title }}">
                                                    </div>
                                                    <div class="weekly3-caption">
                                                        <h4>
                                                            <a href="{{route('latest.news.page',$postRand->id)}}">{{ $postRand->title }}</a>
                                                        </h4>
                                                        <p>{{ $postRand->created_at->format('M d, Y') }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->
        <!-- banner-last Start -->
        <div class="banner-area gray-bg pt-90 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10">
                        <div class="banner-one">
                            <img src={{asset("news-master/assets/img/gallery/body_card3.png")}} alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner-last End -->
    </main>
@endsection
@section('title')
    Trang chủ
@endsection
