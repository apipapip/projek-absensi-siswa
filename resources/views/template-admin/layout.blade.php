<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/dist/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{asset('assets/dist/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{asset('assets/dist/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{asset('assets/dist/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{asset('assets/dist/css/app.css') }}">
    <link rel="shortcut icon" href="{{asset('assets/dist/images/favicon.svg') }}" type="image/x-icon">
    <style>
    body {
        background: linear-gradient(135deg, #e0e7ff 0%, #f0fdfa 100%);
        min-height: 100vh;
    }
    .dashboard .card {
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        transition: transform 0.2s, box-shadow 0.2s;
        border: none;
    }
    .dashboard .card:hover {
        transform: translateY(-6px) scale(1.03);
        box-shadow: 0 8px 32px rgba(0,0,0,0.12);
    }
    .dashboard .card-icon {
        width: 48px;
        height: 48px;
        font-size: 2rem;
        background: #f1f5f9;
        margin-right: 12px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    /* Icon warna berbeda */
    .dashboard .card-icon .bi-person-badge { color: #6366f1; }
    .dashboard .card-icon .bi-person-lines-fill { color: #10b981; }
    .dashboard .card-icon .bi-door-open { color: #f59e42; }
    .dashboard .card-icon .bi-diagram-3 { color: #f43f5e; }
    .dashboard .card-icon .bi-briefcase-fill { color: #0ea5e9; }
    .dashboard .card-icon .bi-clipboard-check { color: #a21caf; }
    .dashboard h5.card-title {
        font-weight: 700;
        font-size: 1.1rem;
        color: #334155;
    }
    .dashboard h6 {
        font-size: 1.7rem;
        font-weight: 800;
        color: #0f172a;
    }
    .dashboard .text-muted {
        color: #64748b !important;
    }
</style>
    @yield('css')
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                <div class="d-flex align-items-center">
                    <img class="img-error rounded-circle me-2" src="{{ asset('assets/dist/images/logo/public.jpg') }}" alt="Logo" style="width: 60px; height: 60px;">
                    <h1 class="text-blue mb-0" style="font-size: 1.2rem;">Tukang Absen</h1>
                </div>
                
                </div>
                <div class="dropdown">
                    <a href="#" class="btn p-0" id="logoutMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-ellipsis-v fa-lg"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="logoutMenu">
                    <li>
                        <form action="{{route('logout')}}" method="post" class="m-0">
                        @csrf
                        <button type="submit" class="dropdown-item text-white" style="background-color: #007bff; border-radius: 5px;">Logout</button>
                        </form>
                    </li>
                    </ul>
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