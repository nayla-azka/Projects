<?php 	 
include('function/fsekolah.php'); 
$fsekolah = new fsekolah();   

if(isset($_GET['xaksi'])){ 
    $status=$_GET['yaksi']; 

	if($status=='1') { 
      $dataku = $fsekolah->tampil_data();
      include "./view/vsekolah.php";   
	}

    if($status=='2') { 
        $id=$_GET['id'];
        $dataku = $fsekolah->cari_data($id);
        include "./view/vsekolah_ubah.php";   
    }

    if($status=='3') {   
        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $nama_sekolah=$_POST['nama_sekolah']; 
            $motto=$_POST['motto'];   
            $alamat=$_POST['alamat'];
            $telepon=$_POST['telepon'];
            $wa=$_POST['wa'];
            $instagram=$_POST['instagram'];
            $facebook=$_POST['facebook'];
            $twitter=$_POST['twitter'];
            $youtube=$_POST['youtube'];
            $email=$_POST['email'];
            $gambar_lama = $_POST['gambar_lama']; // File gambar lama dari database
        

            // Cek jika ada gambar baru yang diupload
            if ($_FILES['gambar']['name']) {
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/profile/images/sekolah/";
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
                        $result = $fsekolah->ubah_data($id, $nama_sekolah, $motto ,$alamat, $telepon, $wa, $instagram, $facebook, $twitter, $youtube, $email, $newFileName);
                        
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
                $result = $fsekolah->ubah_data($id, $nama_sekolah, $motto ,$alamat, $telepon, $wa, $instagram, $facebook, $twitter, $youtube, $email, $gambar_lama);
                if ($result) {
                    echo '<div class="alert alert-success">Data berhasil diubah.</div>';
                } else {
                    echo '<div class="alert alert-danger">Data gagal diubah.</div>';
                }
            }
            // Refresh halaman setelah 1 detik
            echo '<meta http-equiv="refresh" content="1;url=?aksi=Master&xaksi=sekolah&yaksi=1">';
        }
    }
} 
?>