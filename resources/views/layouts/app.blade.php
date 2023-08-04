<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OAS-NMSS</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

    @yield('stylesheet')

    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css?v=3.2.0')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                @if (Route::has('login'))
                    @auth
                        <a href="{{route('home.page')}}" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
            @endauth
            @endif
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item btn bg-gray">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf


                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-white">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </li>
        </ul>
        {{-- <ul class="navbar-nav ml-auto">--}}

        {{-- <li class="nav-item">--}}
        {{-- <a class="nav-link" data-widget="navbar-search" href="#" role="button">--}}
        {{-- <i class="fas fa-search"></i>--}}
        {{-- </a>--}}
        {{-- <div class="navbar-search-block">--}}
        {{-- <form class="form-inline">--}}
        {{-- <div class="input-group input-group-sm">--}}
        {{-- <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
        {{-- <div class="input-group-append">--}}
        {{-- <button class="btn btn-navbar" type="submit">--}}
        {{-- <i class="fas fa-search"></i>--}}
        {{-- </button>--}}
        {{-- <button class="btn btn-navbar" type="button" data-widget="navbar-search">--}}
        {{-- <i class="fas fa-times"></i>--}}
        {{-- </button>--}}
        {{-- </div>--}}
        {{-- </div>--}}
        {{-- </form>--}}
        {{-- </div>--}}
        {{-- </li>--}}

        {{-- <li class="nav-item dropdown">--}}
        {{-- <a class="nav-link" data-toggle="dropdown" href="#">--}}
        {{-- <i class="far fa-comments"></i>--}}
        {{-- <span class="badge badge-danger navbar-badge">3</span>--}}
        {{-- </a>--}}
        {{-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
        {{-- <a href="#" class="dropdown-item">--}}

        {{-- <div class="media">--}}
        {{-- <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">--}}
        {{-- <div class="media-body">--}}
        {{-- <h3 class="dropdown-item-title">--}}
        {{-- Brad Diesel--}}
        {{-- <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>--}}
        {{-- </h3>--}}
        {{-- <p class="text-sm">Call me whenever you can...</p>--}}
        {{-- <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
        {{-- </div>--}}
        {{-- </div>--}}

        {{-- </a>--}}
        {{-- <div class="dropdown-divider"></div>--}}
        {{-- <a href="#" class="dropdown-item">--}}

        {{-- <div class="media">--}}
        {{-- <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
        {{-- <div class="media-body">--}}
        {{-- <h3 class="dropdown-item-title">--}}
        {{-- John Pierce--}}
        {{-- <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>--}}
        {{-- </h3>--}}
        {{-- <p class="text-sm">I got your message bro</p>--}}
        {{-- <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
        {{-- </div>--}}
        {{-- </div>--}}

        {{-- </a>--}}
        {{-- <div class="dropdown-divider"></div>--}}
        {{-- <a href="#" class="dropdown-item">--}}

        {{-- <div class="media">--}}
        {{-- <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
        {{-- <div class="media-body">--}}
        {{-- <h3 class="dropdown-item-title">--}}
        {{-- Nora Silvester--}}
        {{-- <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>--}}
        {{-- </h3>--}}
        {{-- <p class="text-sm">The subject goes here</p>--}}
        {{-- <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
        {{-- </div>--}}
        {{-- </div>--}}

        {{-- </a>--}}
        {{-- <div class="dropdown-divider"></div>--}}
        {{-- <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>--}}
        {{-- </div>--}}
        {{-- </li>--}}

        {{-- <li class="nav-item dropdown">--}}
        {{-- <a class="nav-link" data-toggle="dropdown" href="#">--}}
        {{-- <i class="far fa-bell"></i>--}}
        {{-- <span class="badge badge-warning navbar-badge">15</span>--}}
        {{-- </a>--}}
        {{-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
        {{-- <span class="dropdown-header">15 Notifications</span>--}}
        {{-- <div class="dropdown-divider"></div>--}}
        {{-- <a href="#" class="dropdown-item">--}}
        {{-- <i class="fas fa-envelope mr-2"></i> 4 new messages--}}
        {{-- <span class="float-right text-muted text-sm">3 mins</span>--}}
        {{-- </a>--}}
        {{-- <div class="dropdown-divider"></div>--}}
        {{-- <a href="#" class="dropdown-item">--}}
        {{-- <i class="fas fa-users mr-2"></i> 8 friend requests--}}
        {{-- <span class="float-right text-muted text-sm">12 hours</span>--}}
        {{-- </a>--}}
        {{-- <div class="dropdown-divider"></div>--}}
        {{-- <a href="#" class="dropdown-item">--}}
        {{-- <i class="fas fa-file mr-2"></i> 3 new reports--}}
        {{-- <span class="float-right text-muted text-sm">2 days</span>--}}
        {{-- </a>--}}
        {{-- <div class="dropdown-divider"></div>--}}
        {{-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
        {{-- </div>--}}
        {{-- </li>--}}
        {{-- <li class="nav-item">--}}
        {{-- <a class="nav-link" data-widget="fullscreen" href="#" role="button">--}}
        {{-- <i class="fas fa-expand-arrows-alt"></i>--}}
        {{-- </a>--}}
        {{-- </li>--}}
        {{-- <li class="nav-item">--}}
        {{-- <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">--}}
        {{-- <i class="fas fa-th-large"></i>--}}
        {{-- </a>--}}
        {{-- </li>--}}
        {{-- </ul>--}}
    </nav>


    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="#" class="brand-link">
            <img src="dist/img/unnamed.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">NMSS</span>
        </a>

        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/admin.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                </div>
            </div>

            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v2</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))

                        <li class="nav-item">
                            <a href="{{route('student-register')}}" class="nav-link">
                                <i class="nav-icon fas fa-th text-red"></i>
                                <p>
                                    Register Student
                                </p>
                            </a>
                        </li>
                    @endif

                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))

                        <li class="nav-item">
                            <a href="{{route('teacher-register')}}" class="nav-link">
                                <i class="nav-icon fas fa-th text-blue"></i>
                                <p>
                                    Register Teacher
                                </p>
                            </a>
                        </li>
                    @endif

                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin|teacher'))
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th text-green"></i>
                                <p>
                                    Reports
                                </p>
                            </a>
                        </li>
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('teacher'))
                        <li class="nav-item">
                            <a href="{{route('students-attendance')}}" class="nav-link">
                                <i class="nav-icon fas fa-th text-red"></i>
                                <p>
                                    Do Attendance
                                </p>
                            </a>
                        </li>
                    @endif


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th text-white"></i>
                            <p>
                                Student Information
                            </p>
                        </a>
                    </li>

                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))

                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-th text-yellow"></i>
                                <p>
                                    Teacher Information
                                </p>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>

        </div>

    </aside>


    <div class="content-wrapper">

        {{$slot}}


    </div>


    <footer class="main-footer">

        <div class="float-right d-none d-sm-inline">
            Attendence System
        </div>

        <strong>Copyright &copy; 2023 <a href="https://gopalpoudel.com.np">Developer</a>.</strong> All rights reserved.
    </footer>
</div>



<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('dist/js/adminlte.min.js?v=3.2.0')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@yield('script')
<script>
    $(document).ready(function(){


        @if(session('success'))

        iziToast.success({
            title: 'Success',
            message: '{{session('success')}}',
            position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
            progressBarColor: 'rgb(255, 0, 0)',
        });


        @endif

        @if(session('errors'))

        iziToast.error({
            title: 'Error',
            message: '{{session('errors')}}',
            position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
            progressBarColor: 'rgb(255, 0, 0)',
        });


        @endif

    });
</script>

</body>

</html>
