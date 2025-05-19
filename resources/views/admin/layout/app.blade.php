<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description"
        content="Fastkart admin is super flexible, powerful, clean & modern responsive bootstrap 5 admin template with unlimited possibilities." />
    <meta name="keywords"
        content="admin template, Fastkart admin template, dashboard template, flat admin template, responsive admin template, web app" />
    <meta name="author" content="pixelstrap" />

    <link rel="icon" href="{{ url('public/admin/assets/images/favicon.png') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ url('public/admin/assets/images/favicon.png') }}" type="image/x-icon" />

    <title>@yield('title')</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ url('public/admin/assets/css/linearicon.css') }}" />
    <link rel="stylesheet" href="{{ url('public/admin/assets/css/vendors/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ url('public/admin/assets/css/vendors/themify.css') }}" />
    <link rel="stylesheet" href="{{ url('public/admin/assets/css/ratio.css') }}" />
    <link rel="stylesheet" href="{{ url('public/admin/assets/css/remixicon.css') }}" />
    <link rel="stylesheet" href="{{ url('public/admin/assets/css/vendors/feather-icon.css') }}" />
    <link rel="stylesheet" href="{{ url('public/admin/assets/css/vendors/scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ url('public/admin/assets/css/vendors/animate.css') }}" />
    <link rel="stylesheet" href="{{ url('public/admin/assets/css/vendors/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ url('public/admin/assets/css/vector-map.css') }}" />
    <link rel="stylesheet" href="{{ url('public/admin/assets/css/vendors/slick.css') }}" />
    <link rel="stylesheet" href="{{ url('public/admin/assets/css/style.css') }}" />

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    @yield('style')
</head>

<body>
    <!-- Tap on top -->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>

    <!-- Page Wrapper -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Header -->
        @include('admin.layout.header')

        <!-- Body Wrapper -->
        <div class="page-body-wrapper">
            <!-- Sidebar -->
            @include('admin.layout.sidebar')

            <!-- Main Content -->
            <div class="page-body">
                @yield('content')

                <!-- Footer -->
                @include('admin.layout.footer')
            </div>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h5 class="modal-title mb-3" id="staticBackdropLabel">Logging Out</h5>
                    <p>Are you sure you want to log out?</p>
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="button-box d-flex justify-content-center gap-3 mt-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <a href="{{ route('logout') }}" class="btn btn-primary">Yes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Files -->
    <script src="{{ url('public/admin/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/scrollbar/custom.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/config.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/tooltip-init.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/notify/index.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/slick.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/custom-slick.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/customizer.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/ratio.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/sidebareffect.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/script.js') }}"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(function() {
            toastr.options = {
                closeButton: true,
                debug: false,
                newestOnTop: false,
                progressBar: true,
                positionClass: "toast-top-right",
                preventDuplicates: false,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                timeOut: "5000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut"
            };
        })
    </script>
    @if(session('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
@endif

    @yield('script')
</body>

</html>
