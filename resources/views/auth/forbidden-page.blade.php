<!DOCTYPE html>

<html lang="en" class="light-style" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Forbidden Page - Growlib App</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('template/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    {{-- Font awesome icon cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Css style --}}
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('template/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/css/pages/page-misc.css') }}" />
    <script src="{{ asset('template/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('template/assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Content -->

    <!--Under Maintenance -->
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
            <h2 class="mb-2 mx-2">Halaman Forbidden!</h2>
            <p class="mb-4 mx-2">Maaf anda tidak dapat mengakses ke halaman ini, karena anda tidak memiliki izin.</p>
            <div class="mt-4">
                <img src="{{ asset('img/forbidden.svg') }}" alt="girl-doing-yoga-light" width="500" class="img-fluid"
                    data-app-dark-img="illustrations/girl-doing-yoga-dark.png"
                    data-app-light-img="illustrations/girl-doing-yoga-light.png" />
            </div>
            <div class="mt-5">
                @guest
                    <a href="{{ route('login.page') }}" class="btn btn-primary"><i
                            class="fa-solid fa-right-to-bracket"></i>&ensp; Masuk halaman login</a>
                @endguest

                @auth
                    @if (auth()->user()->hasRole('admin'))
                        <a href="{{ route('dashboard.admin.page') }}" class="btn btn-primary"><i
                                class="fa-solid fa-house"></i>&ensp; Kembali ke halaman
                            dashboard</a>
                    @else
                        <a href="{{ route('dashboard.user.page') }}" class="btn btn-primary"><i
                                class="fa-solid fa-house"></i>&ensp; Kembali ke halaman
                            dashboard</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
    <!-- /Under Maintenance -->
    <!-- / Content -->

    {{-- js script --}}
    <script src="{{ asset('template/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('template/assets/js/main.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
