<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>
        @yield('title')
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
</head>

<body>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

        <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand" href="{{ route('welcome') }}">
                <a class="navbar-brand text-white" href="{{ route('welcome') }}">
                    <b>INNO&copy;EnT&reg;</b>
            </a>
        </div>

        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>
            <ul class="nav nav-navbar">

                <li class="nav-link"><a class="text-decoration-none text-white" href="{{ route('welcome') }}">Home</a></li>
                <li class="nav-link"><a href="" class="text-decoration-none text-white">Contact</a></li>
                <li class="nav-link"><a href="" class="text-decoration-none text-white">About</a></li>


            </ul>

        </section>


        @if(Auth::check())
            <a class="btn btn-xs btn-round btn-success" href="{{ route('home') }}">Admin</a>
        @endif

    </div>
</nav><!-- /.navbar -->





<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-stick-dark" data-navbar="smart">
    <div class="container">

        <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand text-dark" href="{{ route('welcome') }}">
                <b>INNO&copy;EnT&reg;</b>
            </a>
        </div>

        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>

            <ul class="nav nav-navbar">

                <li class="nav-link"><a  href="{{ route('welcome') }}">Home</a></li>
                <li class="nav-link"><a href="" >Contact</a></li>
                <li class="nav-link"><a href="" >About</a></li>


            </ul>
        </section>

        @if(Auth::check())
            <a class="btn btn-xs btn-round btn-success" href="{{ route('home') }}">Admin</a>
        @endif

    </div>
</nav><!-- /.navbar -->







<!-- Main Content -->
<main class="main-content">


    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Blog content
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <!-- Main Content -->
    @yield('content')


</main>


<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row gap-y align-items-center">

            <div class="col-6 col-lg-3">
                <a href="{{ route('welcome') }}">
                    <b>INNO&copy;EnT&reg;</b>
                </a>
            </div>

            <div class="col-6 col-lg-3 text-right order-lg-last">
                <div class="social">
                    <a class="social-facebook" href=""><i class="fa fa-facebook"></i></a>
                    <a class="social-twitter" href=""><i class="fa fa-twitter"></i></a>
                    <a class="social-instagram" href=""><i class="fa fa-instagram"></i></a>
                    <a class="social-dribbble" href=""><i class="fa fa-dribbble"></i></a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
                    <a class="nav-link" href="">Home</a>
                    <a class="nav-link" href="">About</a>
                    <a class="nav-link" href="">Blog</a>
                    <a class="nav-link" href="">Contact</a>
                </div>
            </div>

        </div>
    </div>
</footer><!-- /.footer -->


<!-- Scripts -->
<script src="{{ asset('js/page.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
