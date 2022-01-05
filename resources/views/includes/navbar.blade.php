<!-- Navbar -->
<div class="container">
    <div class="something">
        <nav class="row navbar navbar-expand-lg navbar-light bg-white">
            <a href="{{route('home')}} " class="navbar-brand">
            <img src="{{ url('frontend/images/logo.png') }}" alt="Logo Tournuhun" />
            </a>
            <button
            class="navbar-toggler navbar-toggler-right"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navb"
            >
            <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mx-md-2">
                    <a href="{{route('home')}}" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item mx-md-2">
                    <a href="#" class="nav-link">Paket Travel</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a
                        href="#"
                        class="nav-link dropdown-toggle"
                        id="navbardrop"
                        data-bs-toggle="dropdown"
                    >
                        Services
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbardrop">
                        <li><a href="#" class="dropdown-item">Link</a></li>
                        <li><a href="#" class="dropdown-item">Link</a></li>
                        <li><a href="#" class="dropdown-item">Link</a></li>
                    </ul>
                    </li>
                    <li class="nav-item mx-md-2">
                    <a href="#" class="nav-link">Testimonial</a>
                    </li>
                </ul>
    
               @guest
                    <!-- Mobile Button -->
                <form class="form-inline d-sm-block d-md-none">
                    <button class="btn btn-login my-2 my-sm-0" type="button" 
                        onclick="event.preventDefault(); location.href='{{url('/login')}}';" >
                        Masuk
                    </button>
                </form>
    
                <!-- Dekstop Button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button" 
                        onclick="event.preventDefault(); location.href='{{url('/login')}}';">
                        Masuk
                    </button>
                </form>
               @endguest
               
               @auth
                    <!-- Mobile Button -->
                <form class="form-inline d-sm-block d-md-none" action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-logout my-2 my-sm-0" type="submit">
                        Keluar
                    </button>
                </form>
    
                <!-- Dekstop Button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-logout btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                        Keluar
                    </button>
                </form>
               @endauth
            </div>
        </nav>
        {{-- <h2 class="opening  position-absolute top-50 start-50 translate-middle">Tai Anjing</h2> --}}
    </div>
    
</div>