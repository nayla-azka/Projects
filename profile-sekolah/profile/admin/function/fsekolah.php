<?php 
include('database.php'); 

class fsekolah extends  database {   
	function tampil_data() {
		$sql = mysqli_query($this->koneksi,"select * from tbl_sekolah");
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

	function ubah_data($id, $nama_sekolah, $motto ,$alamat, $telepon, $wa, $instagram, $facebook, $twitter, $youtube, $email, $gambar){  
		//$id=$_SESSION['id']; 	 
		$result = mysqli_query($this->koneksi,"update  tbl_sekolah 
		set  nama_sekolah='$nama_sekolah', motto ='$motto', alamat='$alamat', telepon='$telepon', wa='$wa', instagram='$instagram', facebook='$facebook', 
		twitter='$twitter', youtube='$youtube', email='$email', gambar='$gambar', id='$id' where id='$id'"); 
		if ($result) {
			return true;
		} else {
			return false;
		} 
		$this->koneksi->close(); 
	}	

	
	public function cari_data ($id){ 
		$sql = mysqli_query($this->koneksi,"select * from tbl_sekolah where id='$id'"); 
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