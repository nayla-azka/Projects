<section id="kontenutama" class="kontenutama"> 
     <div class="container my-4"> 
        <div class="row">
        <?php
            $guru = $function_all->tampil_data_guru();
            $nom=0;   
            foreach($guru as $row){ 
                $nom++;
            ?>
                <div class="col-md-2 mb-4">
                    <div class="card card-guru">
                        <img src="images/guru/<?php echo htmlspecialchars($row['gambar']); ?>" class="card-img-top img-guru" alt="Admin" data-bs-toggle="modal" data-bs-target="#imageModal<?php echo $nom; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nama_guru'];   ?></h5>
                            <p class="card-text"><?php echo $row['email'];   ?></p>
                        </div>
                    </div>
                </div> 
                <div class="modal fade" id="imageModal<?php echo $nom; ?>" tabindex="-1" aria-labelledby="imageModalLabel<?php echo $nom; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="images/guru/<?php echo htmlspecialchars($row['gambar']); ?>" class="img-fluid" alt="<?php echo $row['nama_guru'];   ?>">
                            </div>
                        </div>
                    </div>
                </div>
        <?php } ?>
        </div>
     </div>
</section>