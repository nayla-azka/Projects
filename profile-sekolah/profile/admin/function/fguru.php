<?php 
include('database.php'); 

class fguru extends  database {   

    function tampil_data() {
        $sql = mysqli_query($this->koneksi,"select * from tbl_guru");
        $number = mysqli_num_rows($sql);  
        if ($number==0) {  
            echo "Data tidak ada..."; 
            //exit; 
        } 
        while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
            $hasil[] = $row;
        } 
        return $hasil;
    }

    function input_data($nama_guru, $email, $alamat, $telepon, $gambar){    
        $result = mysqli_query($this->koneksi,"insert into tbl_guru (nama_guru, email, alamat, telepon, gambar) values 
        ('$nama_guru','$email','$alamat', '$telepon','$gambar')"); 
        if ($result) {
            return true;
        } else {
            return false;
        } 
        $this->koneksi->close(); 
    }	

    function hapus_data($id){ 
        // Ambil nama file gambar yang akan dihapus
        $query = "SELECT gambar FROM tbl_guru WHERE id='$id'";
        $result = mysqli_query($this->koneksi, $query);
        $data = mysqli_fetch_assoc($result);
        
        if ($data) {
            $gambar = $data['gambar'];

            // Hapus data dari database
            $deleteQuery = "DELETE FROM tbl_guru WHERE id='$id'";
            $deleteResult = mysqli_query($this->koneksi, $deleteQuery);  
            if ($deleteResult) {
                // Tentukan path lengkap file gambar
                $filePath = $_SERVER['DOCUMENT_ROOT'] . "/profile/images/guru/" . $gambar; 

                // Cek apakah file gambar ada, lalu hapus
                if (file_exists($filePath)) {
                    unlink($filePath); // Hapus file gambar dari folder
                }

                return true; // Berhasil menghapus data dan file gambar
            } else {
                return false; // Gagal menghapus data dari database
            }
        } else {
            return false; // Gagal menemukan data dengan id yang diberikan
        } 
    }

    function ubah_data($id, $nama_guru, $email , $alamat, $telepon, $gambar){  
        //$id=$_SESSION['id']; 	 
        $result = mysqli_query($this->koneksi,"update  tbl_guru 
        set  nama_guru='$nama_guru', email ='$email', alamat='$alamat', telepon='$telepon', gambar='$gambar', id='$id' where id='$id'"); 
        if ($result) {
            return true;
        } else {
            return false;
        } 
        $this->koneksi->close(); 
    }	

    
    public function cari_data ($id){ 
        $sql = mysqli_query($this->koneksi,"select * from tbl_guru where id='$id'"); 
        $number = mysqli_num_rows($sql);
        if ($number==0) {  
            echo "Data tidak ditemukan..."; 
            exit; 
        } 
        while ($d = mysqli_fetch_array($sql,MYSQLI_ASSOC)) {
            $result[] = $d;
        } 
        return $result;
    } 
}
?>