<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Selamat Datang | Growlib App</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('template/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    {{-- css style and script --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('template/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/css/pages/page-auth.css') }}" />
    <script src="{{ asset('template/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('template/assets/js/config.js') }}"></script>
</head>

<body>
    {{-- alert include --}}
    @include('sweetalert::alert')

    <nav class="navbar bg-transparent">
        <div class="container-fluid">

            <form accept="#" class="d-flex my-2 shadow-sm">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="tf-icons bx bx-search"></i>
                    </span>
                    <input type="text" id="searchBook" class="form-control" placeholder="Cari buku..." />
                </div>
            </form>

            <div class="row d-flex justify-content-around">
                <div class="col">
                    @guest
                        <a href="{{ route('login.page') }}" class="btn btn-primary my-2">
                            Masuk
                        </a>
                    @endguest

                    @auth
                        @if (auth()->user()->hasRole('admin'))
                            <a href="{{ route('dashboard.admin.page') }}" class="btn btn-primary my-2">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('dashboard.user.page') }}" class="btn btn-primary my-2">
                                Dashboard
                            </a>
                        @endif
                    @endauth
                </div>

                @guest
                    <div class="col">
                        <a href="{{ route('register.page') }}" class="btn btn-outline-primary my-2">
                            Daftar
                        </a>
                    </div>
                @endguest
            </div>

        </div>
    </nav>

    <!-- Content -->
    <div class="container-xxl">
        <div class="row">
            <div class="col-12">
                <div class="container-p-y">

                    <div class="row d-flex justify-content-around">
                        <div class="col-5">
                            <center>
                                <img src="{{ asset('img/astro-read.png') }}" class="img-fluid" alt="">
                            </center>
                        </div>

                        <div class="col-5 d-flex">
                            <div class="mx-auto my-auto">
                                <h1 class="fw-bold">#ReadForSuccess</h1>
                                <h2 class="fw-medium">Selamat datang di <b class="text-theme">Growlib</b></h2>
                                <p>Silahkan menikmati e-book gratis yang bisa diakses kapan saja kamu mau..</p>
                                <span>
                                    "Buku adalah jendela, barang siapa yang suka membuka buku maka dia akan
                                    memperoleh sebagian dari pengetahuan dunia".
                                </span>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <a href="#searchBook" class="btn btn-primary btn-block my-2">
                                            Explore Buku
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- / Content -->

    {{-- script js --}}
    <script src="{{ asset('template/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('template/assets/js/main.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
