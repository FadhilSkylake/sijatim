<?= $this->extend('main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h5>Grafik Pengunjung Berdasarkan IP Address dan Tanggal</h5>
        </div>
        <div class="card-body table-border-style">
            <canvas id="ipChart" width="400" height="200"></canvas>
            <script>
                var ctx = document.getElementById('ipChart').getContext('2d');
                var ipChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: [
                            <?php foreach ($ipData as $data) {
                                echo '"' . $data['date'] . '", ';
                            } ?>
                        ],
                        datasets: [{
                            label: 'Jumlah IP Address per Tanggal',
                            data: [
                                <?php foreach ($ipData as $data) {
                                    echo $data['total'] . ', ';
                                } ?>
                            ],
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                            fill: true
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?= $this->endSection() ?>