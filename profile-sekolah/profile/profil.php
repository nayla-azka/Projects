<?php     
$sejarah = $function_all->tampil_data_profil_sejarah(); 
$sejarah = $sejarah[0];

$visi = $function_all->tampil_data_profil_visi(); 
$visi = $visi[0];
?>

<section id="kontenutama" class="kontenutama">
    <div class="row">   
        <div class="col-md-6 mb-6">
            <div class="p-3 bg-light border shadow-sm rounded konten-container">
                <h4 class="konten-title"> <?php echo $sejarah['judul']; ?></h4>
                <img src="images/profil/<?php echo htmlspecialchars($sejarah['gambar']); ?>" class="img-fluid  school-head-image2" alt="Kepala Sekolah">
                <div style="text-align:left;"> 
                    <?php echo $sejarah['isi_profil']; ?>
                </div>
            </div>
        </div> 


        <div class="col-md-6 mb-6">
            <div class="p-3 bg-light border shadow-sm rounded konten-container">
                <h4 class="konten-title"> <?php echo $visi['judul']; ?></h4>
                <img src="images/profil/<?php echo htmlspecialchars($visi['gambar']); ?>" class="img-fluid  school-head-image2" alt="Kepala Sekolah">
                <div style="text-align:left;"> 
                    <?php echo $visi['isi_profil']; ?>
                </div>
            </div>
        </div>
    </div> 
</section>