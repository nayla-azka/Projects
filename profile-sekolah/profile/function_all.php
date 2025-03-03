<?php 
include('admin/function/database.php'); 

class function_all  extends  database {   
	function input_data_contact($name,$email,$message){  
		$result = mysqli_query($this->koneksi,"insert into tbl_contacts (name,email,message) values ('$name','$email','$message')"); 
		if ($result) {
			return true;    
		} else {
			return false; 
		}  
		$this->koneksi->close(); 
	}	

	function jumpengunjung(){
		$sql = mysqli_query($this->koneksi,"SELECT count(*) as jumlah FROM tbl_pengunjung");
		$number = mysqli_num_rows($sql);  
		if ($number==0) {  
			echo "Data tidak ada...";  
			return [];
			//exit; 
		} 
		while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
			$hasil[] = $row;
		} 
		return $hasil;
	} 

	function cek_pengunjung($ip_address)     {
		$sql = mysqli_query($this->koneksi,"SELECT ip_address FROM tbl_pengunjung where ip_address='$ip_address'");
		$number = mysqli_num_rows($sql);  
		if ($number==0) {  
			echo "Data tidak ada...";  
			return [];
			//exit; 
		} 
		while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
			$hasil[] = $row;
		} 
		return $hasil;
	} 
	

	function input_data_pengunjung($ip_address,$tanggal_kunjungan,$user_agent){    
		$result = mysqli_query($this->koneksi,"insert into tbl_pengunjung (ip_address, tanggal_kunjungan, user_agent) values 
		('$ip_address', '$tanggal_kunjungan', '$user_agent')"); 
		if ($result) {
			return true;
		} else {
			return false;
		} 
		$this->koneksi->close(); 
	}

	function jumlah_fasilitas(){
		$sql = mysqli_query($this->koneksi,"SELECT COUNT(*) AS jumlah FROM tbl_fasilitas");
		$number = mysqli_num_rows($sql);  
		if ($number==0) {  
			echo "Data tidak ada...";  
			return [];
			//exit; 
		} 
		while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
			$hasil[] = $row;
		} 
		return $hasil;
	} 


	function jumlah_prestasi(){
		$sql = mysqli_query($this->koneksi,"SELECT COUNT(*) AS jumlah FROM tbl_artikel WHERE category='Prestasi'");
		$number = mysqli_num_rows($sql);  
		if ($number==0) {  
			echo "Data tidak ada...";  
			return [];
			//exit; 	
		} 
		while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
			$hasil[] = $row;
		} 
		return $hasil;
	} 


	function jumlah_guru(){
		$sql = mysqli_query($this->koneksi,"SELECT COUNT(*) AS jumlah FROM tbl_guru");
		$number = mysqli_num_rows($sql);  
		if ($number==0) {  
			echo "Data tidak ada...";  
			return [];
			//exit; 
		} 
		while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
			$hasil[] = $row;
		} 
		return $hasil;
	} 

	function tampil_data_sekolah(){
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
	
	function tampil_data_profil_visi(){
		$sql = mysqli_query($this->koneksi,"select * from tbl_profil where jenis='Visi'");
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

	function tampil_data_profil_sambutan(){
		$sql = mysqli_query($this->koneksi,"select * from tbl_profil where jenis='Sambutan'");
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

	function tampil_data_profil_sambutan_det(){
		$sql = mysqli_query($this->koneksi,"select * from tbl_profil where jenis='Sambutan'");
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

	function tampil_data_profil_sejarah(){
		$sql = mysqli_query($this->koneksi,"select * from tbl_profil where jenis='Sejarah'");
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

	function tampil_data_fasilitas(){
		$sql = mysqli_query($this->koneksi,"select * from tbl_fasilitas");
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


	function tampil_data_guru(){
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


	function tampil_data_slide(){
		$sql = mysqli_query($this->koneksi,"select * from tbl_slide");
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


	function tampil_data_prestasi(){
		$sql = mysqli_query($this->koneksi,"select * from tbl_artikel where category='Prestasi'");
		$number = mysqli_num_rows($sql);  
		if ($number==0) {  
			echo "Data tidak ada..."; 
			exit; 
		} 
		while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
			$hasil[] = $row;
		} 
		return $hasil;
	}

	function tampil_data_prestasi_det($id){  
		$sql = mysqli_query($this->koneksi,"select * from tbl_artikel where id='$id'");
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

	function tampil_data_artikel(){
		$sql = mysqli_query($this->koneksi,"select * from tbl_artikel");
		$number = mysqli_num_rows($sql);  
		if ($number==0) {  
			echo "Data tidak ada..."; 
			exit; 
		} 
		while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
			$hasil[] = $row;
		} 
		return $hasil;
	}


	
	function tampil_data_artikel_det($id){  
		$sql = mysqli_query($this->koneksi,"select * from tbl_artikel where id='$id'");
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
}
?>