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
    <table id="universalTables" class="table table-bordered table-striped">
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

<?= $this->endSection() ?>