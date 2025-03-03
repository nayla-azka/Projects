<?php 	 
include('function/fprofil.php'); 
$fprofil = new fprofil();   

if(isset($_GET['xaksi'])) { 
    $status=$_GET['yaksi']; 

	if($status=='1') { 
        $dataku = $fprofil->tampil_data();
        include "./view/vprofil.php";   
	}

    if($status=='2') {  
        include "./view/vprofil_add.php";   
    }
  
    if($status=='3') {  
        if (isset($_POST['simpan'])) {  
            $jenis=$_POST['jenis']; 
            $judul=$_POST['judul'];   
            $isi_profil=$_POST['isi_profil'];

            // exit;
            //poses upload gambar
            $target_dir = "../images/profil/";
            $gambar = $_FILES['gambar']['name'];
            $temp_name = $_FILES['gambar']['tmp_name'];
            $imageFileType = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));



            // Membuat nama unik untuk file gambar yang akan disimpan
            $newFileName = uniqid() . '.' . $imageFileType;
            $target_file = $target_dir . $newFileName;

            // Validasi tipe file yang diperbolehkan
            $allowed_file_types = ['jpg', 'jpeg', 'png'];
            if (!in_array($imageFileType, $allowed_file_types)) {
                echo '<div class="alert alert-danger">Hanya file JPG, JPEG, dan PNG yang diperbolehkan.</div>';
            } else {
                // Cek apakah file sudah terupload
                if (move_uploaded_file($temp_name, $target_file)) {

                    // Simpan data ke database, dengan nama file gambar yang baru
                    $result = $fprofil->input_data($jenis, $judul, $isi_profil, $newFileName);

                    if ($result) {
                        echo '<div class="alert alert-success">Data berhasil ditambah</div>';
                    } else {
                        echo '<div class="alert alert-danger">Data gagal ditambah</div>';
                    }

                    // Refresh halaman setelah 1 detik
                    echo '<meta http-equiv="refresh" content="1;url=?aksi=Master&xaksi=profil&yaksi=1">';
                } else {
                    echo '<div class="alert alert-danger">Gagal mengupload gambar.</div>';
                }
            }
        }
    }
 
   
    if($status=='4') { 
        $id=$_GET['id'];
        $result=$fprofil->hapus_data($id);  
        if ($result) {  
            echo'<div class="alert alert-success">Data Berhasil dihapus</div>';
        } else {
            echo'<div class="alert alert-danger">Data gagal dihapus</div>';  
        }
        echo '<meta http-equiv="refresh" content="1;url=?aksi=Master&xaksi=profil&yaksi=1">';  
    }
 

    if($status=='5') { 
        $id=$_GET['id'];
        $dataku = $fprofil->cari_data($id);
        include "./view/vprofil_ubah.php";   
    }


    if($status=='6') {   
        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $jenis=$_POST['jenis']; 
            $judul= $_POST['judul' ];   
            $isi_profil= $_POST['isi_profil' ];   
            $gambar_lama = $_POST['gambar_lama']; // File gambar lama dari database
        

            // Cek jika ada gambar baru yang diupload
            if ($_FILES['gambar']['name']) {
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/profile/images/profil/";
                $gambar_baru = $_FILES['gambar']['name'];
                $temp_name = $_FILES['gambar']['tmp_name'];
                $imageFileType = strtolower(pathinfo($gambar_baru, PATHINFO_EXTENSION));

                // Membuat nama unik untuk file gambar baru
                $newFileName = uniqid() . '.' . $imageFileType;
                $target_file = $target_dir . $newFileName;

                // Validasi tipe file yang diperbolehkan
                $allowed_file_types = ['jpg', 'jpeg', 'png'];
                if (!in_array($imageFileType, $allowed_file_types)) {
                    echo '<div class="alert alert-danger">Hanya file JPG, JPEG, dan PNG yang diperbolehkan.</div>';
                } else {
                    // Cek apakah file sudah terupload
                    if (move_uploaded_file($temp_name, $target_file)) {
                        // Hapus gambar lama dari folder jika ada
                        $filePathLama = $target_dir . $gambar_lama;
                        if (file_exists($filePathLama)) {
                            unlink($filePathLama);
                        }

                        // Update data di tabel, termasuk nama gambar baru
                        $result = $fprofil->ubah_data($id, $jenis, $judul, $isi_profil, $newFileName);
                        
                        if ($result) {
                            echo '<div class="alert alert-success">Data berhasil diubah.</div>';
                        } else {
                            echo '<div class="alert alert-danger">Data gagal diubah.</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger">Gagal mengupload gambar baru.</div>';
                    }
                }
            } else {
                // Jika tidak ada gambar baru yang diupload, gunakan gambar lama
                $result = $fprofil->ubah_data($id, $jenis, $judul, $isi_profil, $gambar_lama);
                if ($result) {
                    echo '<div class="alert alert-success">Data berhasil diubah.</div>';
                } else {
                    echo '<div class="alert alert-danger">Data gagal diubah.</div>';
                }
            }
            // Refresh halaman setelah 1 detik
            echo '<meta http-equiv="refresh" content="1;url=?aksi=Master&xaksi=profil&yaksi=1">';
        }
    }
} 
?>