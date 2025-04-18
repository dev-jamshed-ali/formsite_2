<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="Ln1IpEtabtsQOUcCVnK0hAr91bP7x8j4tAsnxGMZ">
<title> Ginicoe: 404 Page Not Found </title>
<link rel="stylesheet" href="https://ginicoe.com/public/backend/vendor/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="https://ginicoe.com/public/backend/css/sb-admin-2.css">
<link rel="stylesheet" href="https://ginicoe.com/public/backend/vendor/datatables/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://ginicoe.com/public/backend/css/toastr.min.css">
<link rel="stylesheet" href="https://ginicoe.com/public/backend/css/jquery-ui.css">
<link rel="stylesheet" href="https://ginicoe.com/public/backend/css/spacing.css">
<link rel="stylesheet" href="https://ginicoe.com/public/backend/css/style.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700&display=swap" rel="stylesheet">

<script src="https://ginicoe.com/public/backend/vendor/jquery/jquery.min.js"></script>
<script src="https://ginicoe.com/public/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://ginicoe.com/public/backend/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="https://ginicoe.com/public/backend/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="https://ginicoe.com/public/backend/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://ginicoe.com/public/backend/js/toastr.min.js"></script>
<script src="https://ginicoe.com/public/backend/js/jscolor.js"></script>
<script src="https://ginicoe.com/public/backend/js/jquery-ui.js"></script>
<script src="https://ginicoe.com/public/backend/js/jquery.mask.js"></script>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="background:#3867D6 !important">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- 404 Error Text -->
                    <div class="text-center">
                        <div class="error mx-auto" data-text="">404</div>
                        <p class="lead text-gray-800 mb-5">Page Not Found</p>
                        <!-- Replace this content with your provided content -->
                        <p class="text-gray-500 mb-0">
                            404 exception error: Oops!<br>
                            We're having a problem with the page you requested.<br>
                            The page you were looking for could not be displayed for some reason: The page could be temporarily unavailable, so you might try again later.<br>
                            The page has been moved, renamed, deleted, or never existed.<br>
                            There is an error in the URL.<br>
                            If you typed the address, double-check the spelling.<br>
                            If you followed a link from somewhere on <a href="{{ url('/') }}">Ginicoe.com</a>, let us know and we'll fix it. Be sure to tell us where you came from and what you were looking for.<br>
                            If you followed a link from another site, you may wish to let them know that they may be linking to a missing page.<br>
                            You can <a href="{{ route('admin.register') }}">sign up</a> or <a href="{{ route('admin.login') }}">login</a> on the Home Page.
                        </p>
                        <a href="javascript:history.back(0);">← Back</a>
                    </div>
                </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright ©  Ginicoe - <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top" style="display: none;">
        <i class="fas fa-angle-up"></i>
    </a>


</body>

</html>
