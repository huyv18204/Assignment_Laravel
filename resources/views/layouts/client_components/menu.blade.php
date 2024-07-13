<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div class="collapse navbar-collapse d-flex align-items-center justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item mx-3 ">
                    <a class="nav-link active text-dark" aria-current="page" href="{{route('homePage')}}">Trang chủ</a>
                </li>
                @foreach($menus as $menu)
                    <li class="nav-item mx-3 ">
                        <a class="nav-link active text-dark" aria-current="page" href="{{route('categoryPage',$menu->id)}}">{{$menu->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
