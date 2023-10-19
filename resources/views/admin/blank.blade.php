@extends('admin.layout')

@section('container')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column pb-5">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <form action="{{route('users.logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger fw-bold" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
                                <span class="me-1">
                                    تسجيل الخروج
                                </span>
                            </button>
                        </form>
                    </li>
                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container mt-5">
                    <!-- Page Heading -->
                    <h2 class="mb-4 text-gray-800">@yield('title')</h1>
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
@endsection
