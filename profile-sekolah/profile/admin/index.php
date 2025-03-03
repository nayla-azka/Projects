<?php 
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['username']) && !isset($_SESSION['nama_petugas'])) {
  echo "<script>window.location=('./login.php')</script>";
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>cpanel Admin - profile sekolah</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo1.png" rel="icon">
  <link href="assets/img/logo1.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <?php include "./header.php"; ?>

  <?php include "./menukiri.php"; ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Manajemen Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <?php 
          if (!isset($_GET['xaksi'])) { ?>
              <li class="breadcrumb-item active">Halaman Beranda</li>
          <?php } else { ?>  
              <li class="breadcrumb-item active"><?php echo $_GET['xaksi']; ?></li>
          <?php } ?> 
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <?php
        if (!isset($_GET['aksi'])) {
        include "./tengah.php";
        } else {
          if($_GET['xaksi']=='profil') {   
            include "./control/cprofil.php";   
          } 
          if($_GET['xaksi']=='sekolah') {    
            include "./control/csekolah.php";   
          } 
          if($_GET['xaksi']=='slide') {   
            include "./control/cslide.php";   
          }  
          if($_GET['xaksi']=='fasilitas') {    
            include "./control/cfasilitas.php";   
          }  
          if($_GET['xaksi']=='guru') {   
            include "./control/cguru.php";   
          }  
          if($_GET['xaksi']=='artikel') {   
            include "./control/cartikel.php";   
          }
          if($_GET['xaksi']=='pengguna') {   
            include "./control/cpengguna.php";   
          }  
        } ?>
      </div>
  </section>
</main>
  <!-- End #main -->

  <?php include "./footer.php"; ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script> 
 
  <script src="assets/vendor/tinymce/tinymce.min.js"></script> 

  <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>  -->
 
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



<script>
  tinymce.init({
    selector: '#isi_artikel, #isi_profil, .editor',  // Menggunakan selector ID dari textarea
    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link',
    toolbar_mode: 'floating',
    menubar: false,
    height: 300
  });
</script>



</body>

</html>