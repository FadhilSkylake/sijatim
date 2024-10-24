<nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li class="nav-item">
                    <a href="<?= route_to('dashboard') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Admin Menu</label>
                </li>
                <li class="nav-item">
                    <a href="<?= route_to('user') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">User</span></a>
                </li>
                <li class="nav-item">
                    <a href="<?= route_to('produk') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-airplay"></i></span><span class="pcoded-mtext">Produk</span></a>
                </li>
                <li class="nav-item">
                    <a href="<?= route_to('email') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Email Marketing</span></a>
                </li>
                <li class="nav-item">
                    <a href="<?= route_to('news') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-info"></i></span><span class="pcoded-mtext">Berita</span></a>
                </li>
                <li class="nav-item">
                    <a href="<?= route_to('report') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-info"></i></span><span class="pcoded-mtext">Laporan</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>