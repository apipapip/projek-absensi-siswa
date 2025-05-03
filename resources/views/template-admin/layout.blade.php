<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/dist/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{asset('assets/dist/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{asset('assets/dist/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{asset('assets/dist/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{asset('assets/dist/css/app.css') }}">
    <link rel="shortcut icon" href="{{asset('assets/dist/images/favicon.svg') }}" type="image/x-icon">
    @yield('css')
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="{{asset('assets/dist/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>

               <hr>
                
                <div class="sidebar-menu">
                    @include('template-admin.sidebar')
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                @yield('header-content')
            </div>
            <div class="page-content">
                <section class="row">
                    @yield('content')
                </section>
            </div>
        </div>
    </div>
</div>



    
    </div>
    </div>
    <script src="{{asset('assets/dist/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{asset('assets/dist/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{asset('assets/dist/js/pages/dashboard.js') }}"></script>

    <script src="{{asset('assets/dist/js/main.js') }}"></script>
    @yield('js')
</body>

</html>