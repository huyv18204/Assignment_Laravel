<aside class="col-md-4">
    <h3>Tin mới</h3>
    <div class="mt-4">
        @foreach($newPosts as $newPost )
            <div class="card mb-4">
                <a href="{{route('contentPage',$newPost->id)}}" class="text-decoration-none text-dark">
                    <div class="card-body">
                        <h5 class="card-title">{{$newPost->title}}</h5>
                        <p class="card-text">{{$newPost->description}}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</aside>
