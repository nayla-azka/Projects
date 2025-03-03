<section id="kontenutama" class="kontenutama"> 
     <div class="container my-4"> 
        <div class="row">
            <?php
            $fasilitas = $function_all->tampil_data_fasilitas();
            $nom=0;   
            foreach($fasilitas as $row){ 
                $nom++;
            ?>
                <div class="col-md-4 mb-4">
                    <div class="card card-fasilitas">
                        <img src="images/fasilitas/<?php echo htmlspecialchars($row['gambar']); ?>" class="card-img-top img-fasilitas" alt="Gedung Sekolah" data-bs-toggle="modal" data-bs-target="#imageModal<?php echo $nom; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nm_fasilitas'];   ?></h5>
                            <p class="card-text"><?php echo $row['keterangan'];   ?></p>
                        </div>
                    </div>
                </div> 
                <div class="modal fade" id="imageModal<?php echo $nom; ?>" tabindex="-1" aria-labelledby="imageModalLabel<?php echo $nom; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="images/fasilitas/<?php echo htmlspecialchars($row['gambar']); ?>" class="img-fluid" alt="<?php echo $row['nm_fasilitas'];   ?>">
                            </div>
                        </div>
                    </div>
                </div>
        <?php } ?>
        </div>
    </div>
</section>