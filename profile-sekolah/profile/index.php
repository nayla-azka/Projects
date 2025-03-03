<!DOCTYPE html>
<html lang="en">
  <?php include './head.php';?>
<body>
  <?php include './header.php';?>
  <?php
  if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=="profil") {
      include './profil.php';
    } else if ($_GET['aksi']=="fasilitas") {
      include './fasilitas.php';
    } else if ($_GET['aksi']=="guru") {
      include './guru.php';
    } else if ($_GET['aksi']=="artikel") {
      include './artikel.php';
    } else if ($_GET['aksi']=="kontak") {
      include './kontak.php';
    } else if ($_GET['aksi']=="sambutan") {
      include './sambutan.php';
    } else if ($_GET['aksi']=="artikeldet") {
      $id= $_GET['id'];
      include './artikeldet.php';
    } else if ($_GET['aksi']=="prestasi") {
      include './prestasi.php';
    } else if ($_GET['aksi']=="prestasidet") {
      $id= $_GET['id'];
      include './prestasidet.php';
    } else {
      include './main.php';
    } 
  } else {
    include './main.php';
  } 
  include './footer.php';
   ?>  
</body>
</html>