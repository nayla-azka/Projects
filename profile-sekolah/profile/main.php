<section id="kontenutama" class="kontenutama">
    <div class="row" style="width: 100%;">
       <div class="col-md-3 mb-3">
            <div class="p-3 bg-light border shadow-sm rounded"> 
                <h4 class="konten-title">Lokasi Sekolah</h4>
                <!-- Ganti img dengan iframe Google Maps -->
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.4998083136195!2d107.7320278!3d-6.9514167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTcnMDUuMSJTIDEwN8KwNDMnNTUuMyJF!5e0!3m2!1sen!2sid!4v1695744915079!5m2!1sen!2sid"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <?php      
        $sambutan = $function_all->tampil_data_profil_sambutan(); 
        $sambutan = $sambutan[0];
        ?>
            <div class="col-md-6 mb-6">
                <div class="p-3 bg-light border shadow-sm rounded konten-container sambutan-container">
                    <h4 class="konten-title"><?php echo $sambutan['judul']; ?></h4>
                    <img src="images/profil/<?php echo htmlspecialchars($sambutan['gambar']); ?>" class="rounded-circle school-head-image" alt="Kepala Sekolah"> 
                    <?php
                    $text = $sambutan['isi_profil'];
                    echo (strlen($text) > 500) ? substr($text, 0, 500) . '...' : $text; 
                    ?>
                    <a href="./index.php?aksi=sambutan">Selengkapnya</a>
                </div>
            </div>

        <?php      
        $guru = $function_all->jumlah_guru(); 
        $guru = $guru[0];  
        $prestasi = $function_all->jumlah_prestasi(); 
        $prestasi = $prestasi[0];  
        $fasilitas = $function_all->jumlah_fasilitas(); 
        $fasilitas = $fasilitas[0]; 
        $jumpengunjung = $function_all->jumpengunjung(); 
        $jumpengunjung = $jumpengunjung[0]; 
        ?>
            <div class="col-md-3 mb-3">
                <div class="p-3 bg-light border shadow-sm rounded">
                <h4 class="konten-title">Informasi Data</h4>
                <ul class="list-group"> 
                        <li class="list-group-item">
                            <i class="bi bi-person-workspace"></i> <?php echo htmlspecialchars($guru['jumlah']); ?>  Orang Guru
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-trophy"></i> <?php echo htmlspecialchars($prestasi['jumlah']); ?> Prestasi
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-building"></i> <?php echo htmlspecialchars($fasilitas['jumlah']); ?> Fasilitas
                        </li>
                    <li class="list-group-item">
                            <i class="bi bi-people"></i> <?php  echo htmlspecialchars($jumpengunjung['jumlah']); ?> Pengunjung Web
                        </li>
                    </ul>
                </div>
            </div>
    </div> 
</section>