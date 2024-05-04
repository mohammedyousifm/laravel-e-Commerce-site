<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-grid.css.map') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-grid.min.css.map') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-reboot.css.map') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-reboot.min.css.map') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css.map') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css.map') }}">

    {{-- templeat --}}
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/primey.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/myadmin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/template1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/template2.css') }}">

</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header">
                <a href="{{ route('dashboard.index') }}" class="logo">
                    Admin Dashboard
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button class="topbar-toggler more"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg">
                <div class="container-fluid">

                    <form class="navbar-left navbar-form nav-search mr-md-3" action="">
                        <div class="input-group">
                            <input type="text" placeholder="Search ..." class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-regular fa-message"></i>
                                <span class="notification">3</span>
                            </a>
                            <ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
                                <li>
                                    <div class="dropdown-title">You have 4 new notification</div>
                                </li>
                                <li>
                                    <div class="notif-center">
                                        <a href="#">
                                            <div class="notif-icon notif-primary"> <i class="fa-solid fa-envelope"></i>
                                            </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    New user registered
                                                </span>
                                                <span class="time">5 minutes ago</span>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="notif-icon notif-success"> <i class="la la-comment"></i>
                                            </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    Rahmad commented on Admin
                                                </span>
                                                <span class="time">12 minutes ago</span>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="notif-img">
                                                <img src="{{ asset(auth()->user()->imageURL) }}" alt="Img Profile">
                                            </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    Reza send messages to you
                                                </span>
                                                <span class="time">12 minutes ago</span>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="notif-icon notif-danger"> <i class="fa-solid fa-envelope"></i>
                                            </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    Farrah liked Admin
                                                </span>
                                                <span class="time">17 minutes ago</span>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="see-all" href="javascript:void(0);"> <strong>See all
                                            notifications</strong> <i class="fa-solid fa-envelope"></i> </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false"> <img src="{{ asset(auth()->user()->imageURL) }}"
                                    loading="lazy" alt="profile" width="36"
                                    class="img-circle"><span></span></span>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    <div class="user-box">
                                        <div class="u-img"><img src="{{ asset(auth()->user()->imageURL) }}"
                                                loading="lazy" alt="profile">
                                        </div>
                                        <div class="u-text">
                                            <h4>{{ auth()->user()->name }}</h4>
                                            <p class="text-muted">{{ auth()->user()->email }}</p><a href=""
                                                class="btn btn-rounded btn-danger btn-sm">View
                                                Profile</a>
                                        </div>
                                    </div>
                                </li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href=""><i class="fa fa-user"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="#"><i class="fa-solid fa-envelope"></i>
                                    Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="fa fa-power-off"></i> Logout</a>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="sidebar">
            <div class="scrollbar-inner sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="{{ asset(auth()->user()->imageURL) }}" loading="lazy" alt="profile">
                    </div>
                    <div class="info">
                        <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                            <span>
                                {{ auth()->user()->name }}
                                <span class="user-level">Administrator</span>
                                <span class="caret"></span>
                            </span>
                        </a>
                        <div class="clearfix"></div>

                        <div class="collapse in" id="collapseExample" aria-expanded="true" style="">
                            <ul class="nav">
                                <li>
                                    <a href="#profile">
                                        <a href="">My Profile</a>
                                    </a>
                                </li>
                                <li>
                                    <a href="#edit">
                                        <span class="link-collapse">Edit Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#settings">
                                        <span class="link-collapse">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a href="{{ route('dashboard.index') }}">
                            <i class="fa-solid fa-house"></i>
                            <p>Dashboard</p>
                            <span class="badge badge-count">5</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('customers.index') }}">
                            <i class="fa fa-user"></i>
                            <p>Customers</p>
                            <span class="badge badge-count">50</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('massages.index') }}">
                            <i class="fa fa-comment-alt"></i>
                            <p>Massages</p>
                            <span class="badge badge-count">50</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('products.index') }}">
                            <i class="fa fa-box"></i>
                            <p>Products</p>
                            <span class="badge badge-count">50</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('products.index') }}">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <p>Orders</p>
                            <span class="badge badge-count">50</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('products.index') }}">
                            <i class="fa-solid fa-money-bill-wave"></i>
                            <p>Payment</p>
                            <span class="badge badge-count">50</span>
                        </a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('products.index') }}">
                            <i class="fa-solid fa-chart-bar"></i>
                            <p>Sales Analysis</p>
                            <span class="badge badge-count">50</span>
                        </a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('sign.out') }}">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <p>Sign Out</p>
                            <span class="badge badge-count"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        @yield('content')



        {{-- <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js.map') }}"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js.map') }}"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.js.map') }}"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js.map') }}"></script> --}}
        {{-- <script src="{{ asset('assets/dashboard/js/bootstrap-toggle.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/bootstrap-notify.min.js') }}"></script> --}}

        <script src="{{ asset('assets/dashboard/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/circles.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/jquery-ui.min.js') }}"></script>

        {{-- bootstrap --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>

        <script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('assets/js/myjs.js') }}"></script>

</body>

</html>
