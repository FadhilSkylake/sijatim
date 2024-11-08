<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4LY52S4BZ8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-4LY52S4BZ8');
    </script>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>DaudJamur</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?= base_url('landing/css/bootstrap.min.css') ?>">
    <!-- style css -->
    <link rel="stylesheet" href="<?= base_url('landing/css/style.css') ?>">
    <!-- Responsive-->
    <link rel="stylesheet" href="<?= base_url('landing/css/responsive.css') ?>">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('landing/css/jquery.mCustomScrollbar.min.css') ?>">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <style>
        /* CSS untuk membuat tombol sticky lebih besar dan responsif di bagian bawah layar */
        .sticky-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1050;
            padding: 15px 30px;
            font-size: 1.25rem;
            border-radius: 30px;
        }

        /* Styling khusus untuk mobile */
        @media (max-width: 576px) {
            .sticky-button {
                padding: 10px 20px;
                /* Kurangi padding pada tampilan mobile */
                font-size: 1rem;
                /* Ukuran font lebih kecil pada tampilan mobile */
                right: 10px;
                /* Sedikit bergeser lebih ke dalam */
                bottom: 10px;
            }

            .modal-dialog {
                margin: 1rem;
                /* Supaya modal lebih rapi di tampilan kecil */
            }
        }

        /* Styling tambahan untuk card di dalam carousel */
        .carousel-item {
            display: flex;
            justify-content: center;
        }

        .card {
            width: 18rem;
        }

        .date {
            color: #666;
            /* warna abu-abu */
            font-size: 12px;
            /* ukuran teks */
        }
    </style>
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="<?= base_url('landing/images/loading.gif') ?>" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <?= $this->include('landing/layouts/header') ?>

    <!-- about  -->
    <?= $this->include('landing/layouts/about') ?>
    <!-- end abouts -->

    <div id="news" class="news">
        <div class="container my-5">
            <h2 class="text-center">Latest News</h2>
            <div class="row justify-content-center">
                <?php foreach ($news as $index => $n): ?>
                    <div class="col-md-4 d-flex align-items-stretch">
                        <div class="card mx-2 my-3" style="min-width: 300px;">
                            <div class="card-body">
                                <h5><?= htmlspecialchars($n['judul_berita']); ?></h5>
                                <p class="date"><?= htmlspecialchars($n['date']); ?></p>
                                <!-- Button untuk membuka modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newsModal<?= $index; ?>">
                                    Read More
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal untuk berita -->
                    <div class="modal fade" id="newsModal<?= $index; ?>" tabindex="-1" aria-labelledby="newsModalLabel<?= $index; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="modal-title" id="newsModalLabel<?= $index; ?>">
                                        <h5><?= htmlspecialchars($n['judul_berita']); ?></h5>
                                        <p class="date"><?= htmlspecialchars($n['date']); ?></p>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><?= $n['isi_berita']; ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!--  footer -->
    <?= $this->include('landing/layouts/footer') ?>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="<?= base_url('landing/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('landing/') ?>js/popper.min.js"></script>
    <script src="<?= base_url('landing/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('landing/js/jquery-3.0.0.min.js') ?>"></script>
    <script src="<?= base_url('landing/js/plugin.js') ?>"></script>
    <!-- sidebar -->
    <script src="<?= base_url('landing/js/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
    <script src="<?= base_url('landing/js/custom.js') ?>"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>


</body>

</html>