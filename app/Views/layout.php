<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?> - Digilib</title>
    <base href="<?= base_url() ?>">

    <link rel="shortcut icon" href="./assets/compiled/png/favicon.png" type="image/x-icon" />

    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.4.1/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="./assets/compiled/css/table-datatable-jquery.css" />

    <link rel="stylesheet" href="./assets/compiled/css/app.css" />
    <link rel="stylesheet" href="./assets/compiled/css/app-dark.css" />

    <style media="print">
        /* Menghilangkan URL dan tanggal pada header */
        @page {
            size: auto;
            /* Atur ukuran halaman sesuai dengan ukuran kertas yang digunakan */
            margin: 0;
            /* Mengatur margin halaman menjadi 0 */
        }

        /* Menghilangkan konten pada header dan footer */
        @page :header {
            content: none;
        }

        @page :footer {
            content: none;
        }
    </style>

    <?php $this->renderSection('style'); ?>
</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
        <?= $this->include('_sidebar'); ?>
        <div id="main" class="layout-navbar navbar-fixed">
            <header>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="javascript:void(0)" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="form-group has-icon-left m-2">
                            <div class="position-relative">
                                <form action="buku" method="get">
                                    <input type="text" class="form-control" name="cari" placeholder="Cari buku" id="first-name-horizontal-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-search"></i> <button type="submit" class="d-none"></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">
                                <?php if (!logged_in()) : ?>
                                    <li>
                                        <a href="login" class="btn icon icon-left btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg> Masuk</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                            <?php if (logged_in()) : ?>
                                <?php
                                $masyarakatModel = model('MasyarakatModel');
                                $user = $masyarakatModel->user(user_id());
                                ?>
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="user-menu d-flex">
                                            <div class="user-name text-end me-3">
                                                <h6 class="mb-0 text-gray-600"><?= ucfirst(user()->username) ?></h6>
                                                <p class="mb-0 text-sm text-gray-600"><?= (in_groups('admin')) ? 'admin' : ((in_groups('kepala')) ? 'Kepala Balai' : 'masyarakat') ?></p>
                                            </div>
                                            <div class="user-img d-flex align-items-center">
                                                <div class="avatar avatar-md">
                                                    <img src="./assets/compiled/jpg/1.jpg" />
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem">
                                        <li>
                                            <h6 class="dropdown-header">Hello, <?= user()->username ?>!</h6>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="user"><i class="icon-mid bi bi-person me-2"></i> My
                                                Profile</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i> Settings</a>
                                        </li>
                                        <?php if (in_groups('admin')) : ?>
                                            <li>
                                                <a class="dropdown-item" href="admin"><i class="icon-mid bi bi-speedometer me-2"></i> Dashboard</a>
                                            </li>
                                        <?php endif; ?>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="logout"><i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                                Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-sm-6 order-md-1 order-last">
                                <h3><?= $title ?></h3>
                            </div>
                            <div class="col-12 col-sm-6 order-md-1 order-last">
                                <div class="float-start float-sm-end">
                                    <?php $this->renderSection('tools'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->renderSection('content'); ?>
            </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Digilib Balai Bahasa Papua</p>
                    </div>
                    <div class="float-end">
                        <p>
                            Crafted with
                            <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="https://github.com/abiisaleh">abiisaleh</a>
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/static/js/components/dark.js"></script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/extensions/jquery/jquery.min.js"></script>
    <script src="assets/compiled/js/app.js"></script>

    <!-- DataTable -->
    <script src="assets/extensions/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="assets/static/js/pages/datatables.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.4.1/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <?php $this->renderSection('script'); ?>

</body>

</html>