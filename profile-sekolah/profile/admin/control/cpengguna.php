<?php 	 
include('function/fpengguna.php'); 
$fpengguna = new fpengguna();   

if(isset($_GET['xaksi'])) { 
    $status=$_GET['yaksi']; 

	if($status=='1') { 
        $dataku = $fpengguna->tampil_data();
        include "./view/vpengguna.php";   
	}

    if($status=='2') {  
        include "./view/vpengguna_add.php";   
    }
  
    if($status=='3') {  
        if (isset($_POST['simpan'])) {  
            $username=$_POST['username']; 
            $passw=$_POST['passw'];   
            $nama_user=$_POST['nama_user'];   
            $level=$_POST['level'];   

            // exit;
            //poses upload gambar
            $target_dir = "../images/pengguna/";
            $gambar = $_FILES['gambar']['name'];
            $temp_name = $_FILES['gambar']['tmp_name'];
            $imageFileType = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));



            // Membuat nama unik untuk file gambar yang akan disimpan
            $newFileName = uniqid() . '.' . $imageFileType;
            $target_file = $target_dir . $newFileName;

            // Valid_userasi tipe file yang diperbolehkan
            $allowed_file_types = ['jpg', 'jpeg', 'png'];
            if (!in_array($imageFileType, $allowed_file_types)) {
                echo '<div class="alert alert-danger">Hanya file JPG, JPEG, dan PNG yang diperbolehkan.</div>';
            } else {
                // Cek apakah file sudah terupload
                if (move_uploaded_file($temp_name, $target_file)) {

                    // Simpan data ke database, dengan nama file gambar yang baru
                    $result = $fpengguna->input_data($username, $passw,$nama_user,$level, $newFileName);

                    if ($result) {
                        echo '<div class="alert alert-success">Data berhasil ditambah</div>';
                    } else {
                        echo '<div class="alert alert-danger">Data gagal ditambah</div>';
                    }

                    // Refresh halaman setelah 1 detik
                    echo '<meta http-equiv="refresh" content="1;url=?aksi=Master&xaksi=pengguna&yaksi=1">';
                } else {
                    echo '<div class="alert alert-danger">Gagal mengupload gambar.</div>';
                }
            }
        }
    }
 
   
    if($status=='4') { 
        $id_user=$_GET['id_user'];
        $result=$fpengguna->hapus_data($id_user);  
        if ($result) {  
            echo'<div class="alert alert-success">Data Berhasil dihapus</div>';
        } else {
            echo'<div class="alert alert-danger">Data gagal dihapus</div>';  
        }
        echo '<meta http-equiv="refresh" content="1;url=?aksi=Master&xaksi=pengguna&yaksi=1">';  
    }
 

    if($status=='5') { 
        $id_user=$_GET['id_user'];
        $dataku = $fpengguna->cari_data($id_user);
        include "./view/vpengguna_ubah.php";   
    }


     if($status=='6') {   
        if (isset($_POST['update'])) {
            $id_user = $_POST['id_user'];
            $username=$_POST['username']; 
            $passw=$_POST['passw'];   
            $nama_user=$_POST['nama_user'];   
            $level=$_POST['level'];   
            $gambar_lama = $_POST['gambar_lama']; // File gambar lama dari database
        

            // Cek jika ada gambar baru yang diupload
            if ($_FILES['gambar']['name']) {
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/profile/images/pengguna/";
                $gambar_baru = $_FILES['gambar']['name'];
                $temp_name = $_FILES['gambar']['tmp_name'];
                $imageFileType = strtolower(pathinfo($gambar_baru, PATHINFO_EXTENSION));

                // Membuat nama unik untuk file gambar baru
                $newFileName = uniqid() . '.' . $imageFileType;
                $target_file = $target_dir . $newFileName;

                // Valid_userasi tipe file yang diperbolehkan
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
                        $result = $fpengguna->ubah_data($id_user, $username, $passw,$nama_user,$level, $newFileName);
                        
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
                // Jika tid_userak ada gambar baru yang diupload, gunakan gambar lama
                $result = $fpengguna->ubah_data($id_user, $username, $passw,$nama_user,$level, $gambar_lama);
                if ($result) {
                    echo '<div class="alert alert-success">Data berhasil diubah.</div>';
                } else {
                    echo '<div class="alert alert-danger">Data gagal diubah.</div>';
                }
            }
            // Refresh halaman setelah 1 detik
            echo '<meta http-equiv="refresh" content="1;url=?aksi=Master&xaksi=pengguna&yaksi=1">';
        }
    }
} 
?>