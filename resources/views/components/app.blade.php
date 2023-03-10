<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Teknotik</title>

    <!-- Fonts -->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Scripts -->

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
 
</head>

<body>
    @include('sweetalert::alert')
    <div id="app">
        <nav class="navbar navbar-expand-md bg-light shadow-sm ">
            <div class="container">
                <a class="navbar-brand mt-2 " href="{{ url('/') }}">
                    <h2>
                        <div class="d-flex"> Tekno<nav class="text-success">tik</nav>
                        </div>
                    </h2>
                </a>

                <button class="navbar-toggler " type="button" id="mavnar-toggle" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class=""> <i class="fa fa-bars"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @auth
                            @if (auth()->user()->type === 'user')
                               
                                <li class="nav-item ">
                                    <a class="nav-link text-bolds " href="{{ route('order.index') }}">
                                        <i class="fa fa-list"></i> Sipari??lerim</a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link text-bolds " href="{{ route('cart.index') }}">
                                        <i class="fa fa-cart-arrow-down"></i> Sepetim</a>
                                </li>
                                
                            @endif

                            @if (auth()->user()->type === 'admin')
                                <li class="nav-item ">
                                    <a class="nav-link text-bolds " href="{{ route('order.adminIndex') }}">
                                        <i class="fa fa-cog"></i>Kullan??c?? Sipari??leri</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa fa-cog"></i> Kategori ????lemleri
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="nav-link text-bolds ps-2" href="{{ route('main-category.create') }}">
                                            <i class="fa fa-plus"></i> Ana kategori ekle</a>
                                        <a class="nav-link text-bolds ps-2" href="{{ route('main-category.index') }}">
                                            <i class="fa fa-folder"></i> Ana kategoriler</a>
                                        <a class="nav-link text-bolds ps-2" href="{{ route('sub-category.create') }}">
                                            <i class="fa fa-plus"></i> Alt kategori ekle</a>
                                        <a class="nav-link text-bolds ps-2" href="{{ route('sub-category.index') }}">
                                            <i class="fa fa-folder"></i> Alt kategoriler</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown ">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa fa-cog"></i> ??r??n ????lemleri
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="nav-link text-bolds dropdown-item ps-2"
                                            href="{{ route('product.create') }}">
                                            <i class="fa fa-plus"></i> ??r??n ekle</a>
                                        <a class="nav-link text-bolds dropdown-item ps-2"
                                            href="{{ route('product.index') }}">
                                            <i class="fa fa-folder"></i> ??r??nler</a>
                                    </div>
                                </li>
                            @endif
                        @endauth

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-bolds" href="{{ route('login') }}">
                                        <i class="fa-solid fa-arrow-right-to-bracket"></i> Giri?? Yap</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <i class="fa-solid fa-user-plus"></i> ??ye Ol</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-door-closed"></i> ????k???? Yap
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>

            </div>

        </nav>
        <x-flash-message />

        <main>
            {{ $slot }}
        </main>

    </div>




    @isset($js)
        {{ $js }}
    @endisset
    <script>
        $("#mavnar-toggle").click(function() {
            if ($("#wrapper").css("z-index") == "-1") {
                $("#wrapper").css("z-index", "");
            } else {
                $("#wrapper").css("z-index", "-1");
            }
        });
    </script>
</body>

</html>
