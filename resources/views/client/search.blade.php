@extends('layouts.client')

@section('content')
    <main>
        <!-- About US Start -->
        <div class="about-area2 gray-bg pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="whats-news-wrapper">
                            <!-- Heading & Nav Button -->
                            <div class="row justify-content-between align-items-end mb-15">
                                <div class="col-12">
                                    <div class="section-tittle mb-30">
                                        <h3>Kết quả tìm kiếm: {{$keyWord}}</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Tab content -->
                            <div class="row">
                                <div class="col-12">
                                    <!-- Nav Card -->
                                    <div class="tab-content" id="nav-tabContent">
                                        <!-- card one -->
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                             aria-labelledby="nav-home-tab">
                                            <div class="row">
                                                @foreach($posts as $post)
                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                        <div class="whats-news-single mb-40 mb-40">
                                                            <div class="whates-img">
                                                                <img style="height: 271px"
                                                                     src="{{asset('storage/'.$post->image)}}"
                                                                     alt="">
                                                            </div>
                                                            <div class="whates-caption whates-caption2">
                                                                <h4><a href="{{route('latest.news.page',$post->id)}}">{{$post->title}}</a></h4>
                                                                <span>{{ $post->created_at->format('M d, Y') }}</span>
                                                                <p>{{ $post->descripiton }}</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End Nav Card -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Flow Socail -->
                        <div class="single-follow mb-45">
                            <div class="single-box">
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="{{asset('news-master/assets/img/news/icon-fb.png')}}"></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="{{asset('news-master/assets/img/news/icon-tw.png')}}"></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img
                                                src="{{asset('news-master/assets/img/news/icon-ins.png')}}"></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="{{asset('news-master/assets/img/news/icon-yo.png')}}"></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- New Poster -->
                        <div class="news-poster d-none d-lg-block">
                            <img src="{{asset('news-master/assets/img/news/news_card.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About US End -->
        <!--Start pagination -->
        <div class="pagination-area  gray-bg pb-45">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item"><a class="page-link" href="#">
                                            <!-- SVG icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="15px">
                                                <path fill-rule="evenodd" fill="rgb(221, 221, 221)"
                                                      d="M8.142,13.118 L6.973,14.135 L0.127,7.646 L0.127,6.623 L6.973,0.132 L8.087,1.153 L2.683,6.413 L23.309,6.413 L23.309,7.856 L2.683,7.856 L8.142,13.118 Z"/>
                                            </svg>
                                        </a></li>

                                    @for($i = 1; $i <= $page_number; $i++)
                                        <li class="page-item {{ $i == request()->get('page', 1) ? 'active' : '' }}">
                                            <a class="page-link" href="{{ route('search', ['page' => $i]) }}">
                                                {{ $i }}
                                            </a>
                                        </li>
                                    @endfor

                                    <li class="page-item"><a class="page-link" href="#">
                                            <!-- SVG iocn -->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="15px">
                                                <path fill-rule="evenodd" fill="rgb(255, 11, 11)"
                                                      d="M31.112,13.118 L32.281,14.136 L39.127,7.646 L39.127,6.624 L32.281,0.132 L31.167,1.154 L36.571,6.413 L0.491,6.413 L0.491,7.857 L36.571,7.857 L31.112,13.118 Z"/>
                                            </svg>
                                        </a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End pagination  -->
    </main>
@endsection
@section('title')
    Kết quả tìm kiếm {{$keyWord}}
@endsection
