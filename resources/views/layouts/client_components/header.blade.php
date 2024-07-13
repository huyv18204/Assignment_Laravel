<header class="navbar border-bottom ">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{asset('EZ.png')}}" alt="" width="50">
        </a>

        <form method="POST" action="{{route('search')}}" class="d-flex">
            @csrf
            @method('POST')
            <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>

</header>
