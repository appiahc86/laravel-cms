<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'INNOCENT') }}</title>



    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('links')

</head>

<style>
    .btn-info{
        color: white;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light mb-3">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>

        </ul>






        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                </li>

            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('user.edit-profile') }}">Profile</a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
        <!-- Right navbar links -->
{{--        <ul class="navbar-nav ml-auto">--}}

{{--            <!-- Notifications Dropdown Menu -->--}}
{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link" data-toggle="dropdown" href="#">--}}
{{--                    <i class="far fa-bell"></i>--}}
{{--                    <span class="badge badge-warning navbar-badge">15</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
{{--                    <span class="dropdown-item dropdown-header">15 Notifications</span>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <i class="fas fa-envelope mr-2"></i> 4 new messages--}}
{{--                        <span class="float-right text-muted text-sm">3 mins</span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <i class="fas fa-users mr-2"></i> 8 friend requests--}}
{{--                        <span class="float-right text-muted text-sm">12 hours</span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <i class="fas fa-file mr-2"></i> 3 new reports--}}
{{--                        <span class="float-right text-muted text-sm">2 days</span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--        </ul>--}}



    </nav>
    <!-- /.navbar -->



    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">


        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <div class="info">
                    <a href="{{ route('welcome') }}" class="d-block"><i class="fas fa-home"></i><b> HOME</b></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->



                    @if(Auth::check())
                    @if(Auth::user()->isAdmin())

                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                  Users

                                </p>
                            </a>
                        </li>
                    @endif




                    <li class="nav-item">
                        <a href="{{ route('posts.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Posts
                                <span class="right badge badge-primary">{{ App\Post::all()->count() }}</span>
                            </p>
                        </a>
                    </li>



                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-network-wired"></i>
                            <p>
                               Categories
                                <span class="right badge badge-success">{{ App\Category::all()->count() }}</span>
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('tags.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-link"></i>
                            <p>
                                Tags
                                <span class="right badge badge-warning">{{ App\Tag::all()->count() }}</span>
                            </p>
                        </a>
                    </li>


                    <div class="dropdown-divider"></div>


                    <li class="nav-item">
                        <a href="{{ route('trashed.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-trash"></i>
                            <p class="text-orange text-bold">
                                Trash
                                <span class="right badge badge-danger">{{ App\Post::onlyTrashed()->count() }}</span>
                            </p>
                        </a>
                    </li>

                    @endif

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">

            @if(Session::has('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif


            @if(Session::has('deleted'))

                <div class="alert alert-danger">
                    {{ session('deleted') }}
                </div>

            @endif

            @yield('content')


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer text-center">
        <strong>Copyright &copy; 2019-{{ \Illuminate\Support\Carbon::now()->year }} <a href="">INNOCENT</a>.</strong>
        All rights reserved.
    </footer>



</div>
<!-- ./wrapper -->




<!-- jQuery -->
 <script src="{{ asset('js/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>


<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.js') }}"></script>

@yield('scripts')

</body>
</html>
