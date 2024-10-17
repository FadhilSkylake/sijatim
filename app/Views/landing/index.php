<!DOCTYPE html>
<html lang="en">

<head>
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

    <!-- jamur -->
    <?= $this->include('landing/layouts/jamur') ?>
    <!-- end jamur -->

    <!-- testimonial -->
    <?= $this->include('landing/layouts/testimonial') ?>
    <!-- end testimonial -->

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