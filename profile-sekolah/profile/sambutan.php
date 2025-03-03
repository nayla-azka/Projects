<section id="kontenutama" class="kontenutama">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-8">
                <div class="p-3 bg-light border shadow-sm rounded konten-container">
                    <h4 class="konten-title">Sambutan</h4>
                    <?php      
                    $sambutan_det = $function_all->tampil_data_profil_sambutan_det(); 
                    $sambutan_det = $sambutan_det[0];
                    ?>
                        <div class="artikel-item border p-2 rounded d-flex">
                            <div class="artikel-img-container">
                                <img src="images/profil/<?php echo htmlspecialchars($sambutan_det['gambar']); ?>" alt="" class="artikel-img mb-3" style="max-width: 150px;">
                            </div>
                            <div class="artikel-text ms-3"> 
                                <?php echo  $sambutan_det['isi_profil'];?>
                            </div>
                        </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="p-3 bg-light border shadow-sm rounded konten-container">
                    <h4 class="konten-title">Artikel lain</h4>
                    <?php
                    $artikel = $function_all->tampil_data_artikel();  
                    foreach($artikel as $row) {  
                        $id=$row['id'];
                    ?> 
                        <div class="artikel-lainnya">
                            <div class="artikel-lainnya-item d-flex align-items-start mb-3">
                                <div class="text-black me-2">
                                    <i class="bi bi-arrow-right-circle"></i>
                                </div> 
                                <a href="./index.php?aksi=artikeldet&id=<?php echo $id; ?>" class="artikel-link"><?php echo $row['judul']; ?></a>
                            </div>
                    <?php } ?>
                        </div>
        
                </div>
            </div>
        </div>
    </div>
</section>