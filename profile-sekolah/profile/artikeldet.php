<section id="kontenutama" class="kontenutama">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="p-3 bg-light border shadow-sm rounded konten-container">
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $artikel_det = $function_all->tampil_data_artikel_det($id);
                        $artikel_det = $artikel_det[0];
                    } else {
                        header('Location: index.php');
                        exit;
                    }
                    ?>
                    <h4 class="konten-title"><?php echo $artikel_det['judul']; ?></h4>
                    <div class="artikel-item border p-2 rounded d-flex flex-column flex-md-row">
                        <div class="artikel-img-container mb-3 mb-md-0">
                            <img src="images/artikel/<?php echo htmlspecialchars($artikel_det['gambar']); ?>" alt="" class="artikel-img img-fluid">
                        </div>
                        <div class="artikel-text ms-3"> 
                            <?php echo $artikel_det['isi_artikel']; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="p-3 bg-light border shadow-sm rounded konten-container">
                    <h4 class="konten-title">Artikel Lain</h4>
                    <?php
                    $artikel = $function_all->tampil_data_artikel();
                    foreach ($artikel as $row) {
                        $id = $row['id'];
                    ?>
                        <div class="artikel-lainnya">
                            <div class="artikel-lainnya-item d-flex align-items-start mb-3">
                                <div class="text-black me-2">
                                    <i class="bi bi-arrow-right-circle"></i>
                                </div>
                                <a href="./index.php?aksi=artikeldet&id=<?php echo $id; ?>" class="artikel-link"> <?php echo $row['judul']; ?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
