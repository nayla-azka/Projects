<?php    
include('function_all.php'); 
$function_all = new function_all();    
$sekolah = $function_all->tampil_data_sekolah();  
$sekolah = $sekolah[0];
 

// Memanggil fungsi koneksi ke database
//$koneksi = koneksiDB();

// Mendapatkan alamat IP pengunjung
$ip_address = $_SERVER['REMOTE_ADDR']; 
// Mendapatkan user agent pengunjung (browser)
$user_agent = $_SERVER['HTTP_USER_AGENT']; 
// Mendapatkan waktu kunjungan
$tanggal_kunjungan = date('Y-m-d H:i:s'); 


// Cek apakah IP sudah ada di database 
if (is_array($_SERVER['REMOTE_ADDR'])) {
    $ip_address = $_SERVER['REMOTE_ADDR'][0]; // Mengambil elemen pertama dari array
} else {
    $ip_address = $_SERVER['REMOTE_ADDR']; // Jika bukan array, ambil langsung
} 

 $cek_pengunjung = $function_all->cek_pengunjung($ip_address); 
 $cek_pengunjung = $cek_pengunjung[0];  
 

if ($cek_pengunjung['ip_address'] =="")
 {
       $result = $function_all->input_data_pengunjung($ip_address,$tanggal_kunjungan,$user_agent); 
   if ($result) {
            //  echo '<div class="alert alert-success">Data berhasil ditambah</div>';
    } else {
            //  echo '<div class="alert alert-danger">Data gagal ditambah</div>';
    }
 } 
 ?>


<!-- Header Info Section -->
<div class="header-info bg-primary text-white text-align-center" style="padding-top: 0px; padding-bottom: 0px;">  
        <!-- Bagian ini akan hilang di layar mobile -->
        <div class="col-md-3 d-none d-lg-block" style="width:100%; padding:5px; text-align: right;">
             <h6>Telusuri Kami 
                <a href="<?php echo $sekolah['facebook']; ?>" class="text-white me-2"><i class="bi bi-facebook"></i></a>
                <a href="<?php echo $sekolah['instagram']; ?>" class="text-white me-2"><i class="bi bi-instagram"></i></a>
                <a href="<?php echo $sekolah['twitter']; ?>" class="text-white me-2"><i class="bi bi-twitter"></i></a>
                <a href="<?php echo $sekolah['youtube']; ?>" class="text-white me-2"><i class="bi bi-youtube"></i></a>
            </h6>
        </div>
    </div>
</div>



<!-- Navigation --> 
<nav class="navbar navbar-expand-xl navbar-light sticky-top" >
    <div class="container-lg" style="width:100%;">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="images/sekolah/<?php echo htmlspecialchars($sekolah['gambar']); ?>" alt="Logo" width="100" height="50" class="d-inline-block align-text-top me-2">
            <div class="text-start">
                <span class="d-block fw-bold"><?php echo $sekolah['nama_sekolah']; ?></span>
              <small class="d-block motto text-primary"><em><?php echo $sekolah['motto']; ?></em></small>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link"  href="./index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="./index.php?aksi=profil">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"   href="./index.php?aksi=fasilitas">Fasilitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"   href="./index.php?aksi=guru">Data Guru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"   href="./index.php?aksi=artikel">Artikel</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link"   href="./index.php?aksi=prestasi">Prestasi</a>
                </li> 
                 <li class="nav-item">
                    <a class="nav-link"   href="./index.php?aksi=kontak&yaksi=1">Hubungi Kami</a>
                </li> 
            </ul>
        </div>
    </div>
</nav>

<?php
if (! isset($_GET['aksi'])) 
{ ?>

<!-- Slideshow Section -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
    </div>
    <div class="carousel-inner">
        <?php
        $slide = $function_all->tampil_data_slide();  
        $jum=0;
        foreach($slide as $row)
        { 
         $jum++;
         if ($jum==1) 
         {
        ?>  
            <div class="carousel-item active">
                <img src="images/slide/<?php echo htmlspecialchars($row['gambar']); ?>" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                <h2><?php echo $row['judul'];   ?></h2>
                <p><?php echo $row['teks'];   ?></p>
            </div>
            </div>
    <?php } 
    else
     { ?> 
         <div class="carousel-item">
            <img src="images/slide/<?php echo htmlspecialchars($row['gambar']); ?>" class="d-block w-100" alt="Slide 2">
            <div class="carousel-caption d-none d-md-block">
                 <h2><?php echo $row['judul'];   ?></h2>
                <p><?php echo $row['teks'];   ?></p>
            </div>
        </div>
    <?php 
        } 
    }
        ?>
    </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
</div>
<?php
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
