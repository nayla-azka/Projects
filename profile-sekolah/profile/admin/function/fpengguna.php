<?php 
include('database.php'); 

class fpengguna extends  database {   
    function tampil_data() {
        $sql = mysqli_query($this->koneksi,"select * from tbl_user");
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

    function input_data($username, $passw,$nama_user,$level,$gambar){    
        $result = mysqli_query($this->koneksi,"insert into tbl_user (username,passw,nama_user,level,gambar) values 
        ('$username',md5('$passw'),'$nama_user','$level','$gambar')"); 
        if ($result) {
            return true;
        } else {
            return false;
        } 
        $this->koneksi->close(); 
    }	

    function hapus_data($id_user){ 
        // Ambil nama file gambar yang akan dihapus
        $query = "SELECT gambar FROM tbl_user WHERE id_user='$id_user'";
        $result = mysqli_query($this->koneksi, $query);
        $data = mysqli_fetch_assoc($result);
        
        if ($data) {
            $gambar = $data['gambar'];

            // Hapus data dari database
            $deleteQuery = "DELETE FROM tbl_user WHERE id_user='$id_user'";
            $deleteResult = mysqli_query($this->koneksi, $deleteQuery);  
            if ($deleteResult) {
                // Tentukan path lengkap file gambar
                $filePath = $_SERVER['DOCUMENT_ROOT'] . "/profile/images/pengguna/" . $gambar; 

                // Cek apakah file gambar ada, lalu hapus
                if (file_exists($filePath)) {
                    unlink($filePath); // Hapus file gambar dari folder
                }

                return true; // Berhasil menghapus data dan file gambar
            } else {
                return false; // Gagal menghapus data dari database
            }
        } else {
            return false; // Gagal menemukan data dengan id_user yang diberikan
        } 
    }

    function ubah_data($id_user,$username, $passw,$nama_user,$level,$gambar){  
        //$id_user=$_SESSION['id_user']; 	 
        $result = mysqli_query($this->koneksi,"update  tbl_user 
        set  username='$username',passw=md5('$passw'),nama_user='$nama_user',level='$level',gambar='$gambar',id_user='$id_user'  where id_user='$id_user'"); 
        if ($result) {
            return true;
        } else {
            return false;
        } 
        $this->koneksi->close(); 
    }	

    
    public function cari_data ($id_user){ 
        $sql = mysqli_query($this->koneksi,"select * from tbl_user where id_user='$id_user'"); 
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