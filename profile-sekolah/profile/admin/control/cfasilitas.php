<?php 	 
include('function/ffasilitas.php'); 
$ffasilitas = new ffasilitas();   

if(isset($_GET['xaksi'])) { 
    $status=$_GET['yaksi']; 

	if($status=='1') { 
        $dataku = $ffasilitas->tampil_data();
        include "./view/vfasilitas.php";   
	}

    if($status=='2') {  
        include "./view/vfasilitas_add.php";   
    }
  
    if($status=='3') {  
        if (isset($_POST['simpan'])) {  
            $nm_fasilitas=$_POST['nm_fasilitas']; 
            $keterangan=$_POST['keterangan'];   

            // exit;
            //poses upload gambar
            $target_dir = "../images/fasilitas/";
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
                    $result = $ffasilitas->input_data($nm_fasilitas, $keterangan, $newFileName);

                    if ($result) {
                        echo '<div class="alert alert-success">Data berhasil ditambah</div>';
                    } else {
                        echo '<div class="alert alert-danger">Data gagal ditambah</div>';
                    }

                    // Refresh halaman setelah 1 detik
                    echo '<meta http-equiv="refresh" content="1;url=?aksi=Master&xaksi=fasilitas&yaksi=1">';
                } else {
                    echo '<div class="alert alert-danger">Gagal mengupload gambar.</div>';
                }
            }
        }
    }
 
   
    if($status=='4') { 
        $id=$_GET['id'];
        $result=$ffasilitas->hapus_data($id);  
        if ($result) {  
            echo'<div class="alert alert-success">Data Berhasil dihapus</div>';
        } else {
            echo'<div class="alert alert-danger">Data gagal dihapus</div>';  
        }
        echo '<meta http-equiv="refresh" content="1;url=?aksi=Master&xaksi=fasilitas&yaksi=1">';  
    }
 

    if($status=='5') { 
        $id=$_GET['id'];
        $dataku = $ffasilitas->cari_data($id);
        include "./view/vfasilitas_ubah.php";   
    }


    if($status=='6') {   
        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $nm_fasilitas=$_POST['nm_fasilitas']; 
            $keterangan= $_POST['keterangan' ];    
            $gambar_lama = $_POST['gambar_lama']; // File gambar lama dari database
        

            // Cek jika ada gambar baru yang diupload
            if ($_FILES['gambar']['name']) {
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/profile/images/fasilitas/";
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
                        $result = $ffasilitas->ubah_data($id, $nm_fasilitas, $keterangan, $newFileName);
                        
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
                $result = $ffasilitas->ubah_data($id, $nm_fasilitas, $keterangan, $gambar_lama);
                if ($result) {
                    echo '<div class="alert alert-success">Data berhasil diubah.</div>';
                } else {
                    echo '<div class="alert alert-danger">Data gagal diubah.</div>';
                }
            }
            // Refresh halaman setelah 1 detik
            echo '<meta http-equiv="refresh" content="1;url=?aksi=Master&xaksi=fasilitas&yaksi=1">';
        }
    }
} 
?>