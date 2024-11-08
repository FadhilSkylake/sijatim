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