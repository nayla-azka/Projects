<section id="kontenutama" class="kontenutama">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="p-3 bg-light border shadow-sm rounded konten-container">
                    <h4 class="konten-title">Artikel</h4>
                        <?php
                        $artikel = $function_all->tampil_data_artikel(); 
                        $nom = 0;   
                        foreach($artikel as $row) { 
                            $nom++;
                        ?>
                            <div class="artikel-item border p-2 rounded d-flex mb-3">
                                <div class="artikel-img-container">
                                    <img src="images/artikel/<?php echo htmlspecialchars($row['gambar']); ?>" alt="" class="artikel-img img-fluid" style="max-width: 150px;">
                                </div>
                                <div class="artikel-text ms-3"> 
                                    <h5>
                                        <a href="./index.php?aksi=artikeldet&id=<?php echo $row['id']; ?>" class="artikel-link">
                                            <?php echo $row['judul']; ?>
                                        </a>
                                    </h5>
                                    <p>
                                        <?php
                                        $text = $row['isi_artikel'];
                                        echo (strlen($text) > 400) ? substr($text, 0, 400) . '...' : $text; 
                                        ?>
                                        <a href="./index.php?aksi=artikeldet&id=<?php echo $row['id']; ?>">Selengkapnya</a>
                                    </p>
                                </div>
                            </div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="p-3 bg-light border shadow-sm rounded konten-container">
                    <h4 class="konten-title">Artikel lain</h4>
                    <?php
                    $artikel = $function_all->tampil_data_artikel();  
                    foreach($artikel as $row){  
                        $id=$row['id'];
                    ?> 
                        <div class="artikel-lainnya">
                            <div class="artikel-lainnya-item d-flex align-items-start mb-3">
                                <div class="text-black me-2">
                                    <i class="bi bi-arrow-right-circle"></i>
                                </div> 
                                <a href="./index.php?aksi=artikeldet&id=<?php echo $id; ?>" class="artikel-link"> <?php echo $row['judul']; ?></a>
                            </div>
                    <?php } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>