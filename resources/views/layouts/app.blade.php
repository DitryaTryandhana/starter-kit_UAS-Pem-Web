<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Starter Kit UAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Topbar -->
                @include('layouts.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid mt-3">
                    {{-- Konten halaman --}}
                    @yield('content')

                    {{-- Flash Message --}}
                    @foreach (['success', 'error', 'warning', 'info'] as $msg)
                        @if(session($msg))
                            <div class="alert alert-{{ $msg }} alert-dismissible fade show mt-3" role="alert">
                                {{ session($msg) }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    @endforeach
                </div>
                <!-- /.container-fluid -->

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>
</html>
