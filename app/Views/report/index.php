<?= $this->extend('main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h5>Grafik Pengunjung Berdasarkan User dan Tanggal</h5>
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
                                echo '"' . $data['date'] . '", ';
                            } ?>
                        ],
                        datasets: [{
                            label: 'Jumlah Kunjungan User per Tanggal',
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


<?= $this->endSection() ?>