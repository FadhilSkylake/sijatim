<?= $this->extend('main') ?>
<?= $this->section('content') ?>

<div class="col-lg-7 col-md-12">
    <!-- support-section start -->
    <div class="row">
        <div class="col-sm-6">
            <div class="card support-bar overflow-hidden">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-yellow"><?= $pengunjung; ?></h4>
                            <h6 class="text-muted m-b-0">Total Pengunjung</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="feather icon-bar-chart-2 f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card support-bar overflow-hidden">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-green">290+</h4>
                            <h6 class="text-muted m-b-0">Total Pesanan</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="feather icon-file-text f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- support-section end -->
</div>

<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h5>Grafik Pengunjung Berdasarkan Tanggal</h5>
        </div>
        <div class="card-body table-border-style">
            <canvas id="ipChart" width="400" height="200"></canvas>
            <script>
                var ctx = document.getElementById('ipChart').getContext('2d');
                var ipChart = new Chart(ctx, {
                    type: 'bar', // Ubah tipe grafik menjadi bar
                    data: {
                        labels: [
                            <?php foreach ($ipData as $data) {
                                echo '"' . $data['visit_time'] . '", ';
                            } ?>
                        ],
                        datasets: [{
                            label: 'Jumlah Kunjungan berdasarkan Tanggal',
                            data: [
                                <?php foreach ($ipData as $data) {
                                    echo $data['total'] . ', ';
                                } ?>
                            ],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
</div>

<div class="container mt-5">
    <h2 class="mb-4">Visitor Logs</h2>
    <table id="visitorLogsTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>IP Address</th>
                <th>Referrer</th>
                <th>Visited Page</th>
                <th>Visit Time</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            if (!empty($visitor_logs) && is_array($visitor_logs)): ?>
                <?php foreach ($visitor_logs as $log): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($log['ip_address']) ?></td>
                        <td><?= esc($log['referrer']) ?></td>
                        <td><?= esc($log['visited_page']) ?></td>
                        <td><?= esc($log['visit_time']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No visitor logs found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- prject ,team member start -->
<!-- <div class="col-xl-6 col-md-12">
    <div class="card latest-update-card">
        <div class="card-header">
            <h5>Pesanan Baru Baru Ini</h5>
            <div class="card-header-right">
                <div class="btn-group card-option">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather icon-more-horizontal"></i>
                    </button>
                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                        <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                        <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                        <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="latest-update-box">
                <div class="row p-t-30 p-b-30">
                    <div class="col-auto text-right update-meta">
                        <p class="text-muted m-b-0 d-inline-flex">2 hrs ago</p>
                    </div>
                    <div class="col">
                        <a href="#!">
                            <h6>Pesanan jamur sebanyak 200 bag</h6>
                        </a>
                        <p class="text-muted m-b-0">oleh : Reggy</p>
                    </div>
                </div>
                <div class="row p-t-30 p-b-30">
                    <div class="col-auto text-right update-meta">
                        <p class="text-muted m-b-0 d-inline-flex">2 hrs ago</p>
                    </div>
                    <div class="col">
                        <a href="#!">
                            <h6>Pesanan jamur sebanyak 200 bag</h6>
                        </a>
                        <p class="text-muted m-b-0">oleh : Reggy</p>
                    </div>
                </div>
                <div class="row p-t-30 p-b-30">
                    <div class="col-auto text-right update-meta">
                        <p class="text-muted m-b-0 d-inline-flex">2 hrs ago</p>
                    </div>
                    <div class="col">
                        <a href="#!">
                            <h6>Pesanan jamur sebanyak 200 bag</h6>
                        </a>
                        <p class="text-muted m-b-0">oleh : Reggy</p>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="#!" class="b-b-primary text-primary">View all Projects</a>
            </div>
        </div>
    </div>
</div> -->
<!-- prject ,team member start -->

<!-- Latest Customers start -->
<!-- <div class="col-lg-8 col-md-12">
    <div class="card table-card review-card">
        <div class="card-header borderless ">
            <h5>Customer Reviews</h5>
            <div class="card-header-right">
                <div class="btn-group card-option">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather icon-more-horizontal"></i>
                    </button>
                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                        <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                        <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                        <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="review-block">
                <div class="row">
                    <div class="col-sm-auto p-r-0">
                        <img src="assets/images/user/avatar-2.jpg" alt="user image" class="img-radius profile-img cust-img m-b-15">
                    </div>
                    <div class="col">
                        <h6 class="m-b-15">John Deo <span class="float-right f-13 text-muted"> Tanggal</span></h6>
                        <p class="m-t-15 m-b-15 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                            took a
                            galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
            <div class="text-right  m-r-20">
                <a href="#!" class="b-b-primary text-primary">View all Customer Reviews</a>
            </div>
        </div>
    </div>

</div> -->

<script>
    $(document).ready(function() {
        $('#visitorLogsTable').DataTable({
            "pageLength": 5 // Menampilkan 5 data per halaman
        });
    });
</script>
<?= $this->endSection() ?>