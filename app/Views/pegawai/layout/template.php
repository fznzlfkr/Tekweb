<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/pegawai/dashboard') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-solid fa-warehouse"></i>

                </div>
                <div class="sidebar-brand-text mx-3">Management Barang</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-3">

            <!-- Nav Item - Dashboard -->


            <!-- Heading -->
            <div class="sidebar-heading">
                Dashboard
            </div>


            <!-- Nav Item - Charts -->
            <li class="nav-item">
    <a class="nav-link" href="<?= base_url('/pegawai/dashboard') ?>">
        <i class="fa-solid fa-house"></i>
        <span>Dashboard</span>
    </a>
</li>

<!-- Nav Item - Data Barang -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('/pegawai/data_barang') ?>">
        <i class="fa-solid fa-boxes-stacked"></i>
        <span>Data Barang</span>
    </a>
</li>

<!-- Nav Item - Barang Masuk -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('/pegawai/create_barang') ?>">
        <i class="fa-solid fa-arrow-down-wide-short"></i>
        <span>Barang Masuk</span>
    </a>
</li>

<!-- Nav Item - Barang Keluar -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('/pegawai/barang_keluar') ?>">
        <i class="fa-solid fa-arrow-up-wide-short"></i>
        <span>Barang Keluar</span>
    </a>
</li>

<!-- Nav Item - History -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('/pegawai/history') ?>">
        <i class="fa-solid fa-clock-rotate-left"></i>
        <span>History</span>
    </a>
</li>

<!-- Nav Item - Logout -->
<li class="nav-item">
    <a class="nav-link" href="#" id="btnLogout">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
        <span>Logout</span>
    </a>
</li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Info (No Dropdown) -->
                        <li class="nav-item"><a href="<?= base_url('pegawai/profil') ?>">
                                <span class="nav-link text-gray-600 small">
                                    <i class="fas fa-user mr-1"></i>
                                    <?= $_SESSION['username'] ?>
                                </span>
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->



                <?= $this->renderSection('content') ?>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Kelompok 5 <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/js/sb-admin-2.min.js"></script>
<script>
    document.getElementById('btnLogout').addEventListener('click', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Yakin ingin logout?',
            text: "Kamu akan keluar dari sistem.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('/logout') ?>";
            }
        });
    });
    document.querySelectorAll('.btnHapus').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Cari dan submit form terdekat
                    this.closest('form').submit();
                }
            });
        });
    });
</script>
</body>

</html>