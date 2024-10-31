<header>
    <!-- header inner -->
    <div class="header-top">
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.html"><img src="<?= base_url('assets/images/jamur-logo-hijau.png') ?>" alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-8 col-md-8 col-sm-9">

                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu ">
                                    <ul class="menu-area-main">
                                        <li class="active"> <a href="index.html">Home</a> </li>
                                        <li> <a href="#about">About</a> </li>
                                        <li> <a href="#produk">Produk</a> </li>
                                        <li> <a href="#testimonial">Testimonial</a> </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header inner -->

    <!-- end header -->
    <div class="container-fluid padding_dd">
        <div class="carousel-caption">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="text-bg">
                        <span>Selamat Datang di DaudJamur</span>
                        <h1>Petani Jamur Subang</h1>
                    </div>
                    <!-- Button to trigger modal -->
                    <button type="button" class="btn btn-primary sticky-button" data-toggle="modal" data-target="#stayUpdatedModal">
                        BERLANGGANAN DENGAN KAMI
                    </button>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="images_box">
                        <figure><img src="<?= base_url('landing/images/mushroom-oyster.png') ?>"></figure>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="stayUpdatedModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content bg-dark text-light">
                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="modalTitle">Stay Updated</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Dapatkan berita, pembaruan, dan hal-hal terkini yang akan datang!<br>Daftar Newsletter kami di sini.</p>
                                <form action="<?= base_url('/email/subscribe') ?>" method="post">
                                    <?= csrf_field() ?>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email *" name="email">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</header>