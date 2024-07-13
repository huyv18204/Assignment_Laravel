@extends('layouts.client')

@section('content')
    <div class="col-md-8">
        <div>
            <h3>Kết quả tìm kiếm: {{$keyWord}}</h3>
            <div class="row mt-5">
                @if(!empty($posts))
                    @foreach($posts as $post)
                        <div class="col-md-3 ">
                            <a class="text-decoration-none" href="{{route('contentPage',$post->id)}}">
                                <div class="news-card card mb-4">
                                    <img src="{{asset('storage/'.$post->image)}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-title">{{$post->title}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <div>Không tìm thấy kết quả.</div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('title')
    Trang chủ
@endsection
