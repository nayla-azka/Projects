<?php
if (!isset($_SESSION)) {
	session_start(); 
}

include('../function/flogin.php');
$flogin = new flogin();

$op = $_GET['op'];
if ($op == "in") {
	$username = strip_tags(str_replace("'", "", $_POST["username"]));
	$passw = strip_tags(str_replace("'", "", $_POST['passw']));

	if ($flogin->getUserByusername($username, $passw) == true) { 
		$dataku = $flogin->getdataUserByusername($username, $passw); 
		
		$_SESSION['username'] = $dataku[0]['username'];
		$_SESSION['nama_user'] = $dataku[0]['nama_user'];
		$_SESSION['level'] = $dataku[0]['level'];
		$_SESSION['id_user']=$dataku[0]['id_user']; 
		$_SESSION['gambar']=$dataku[0]['gambar']; 
		
		header("location:../index.php");
	} 
} else if ($op == "out") {
	unset($_SESSION['username']);       //Unset the variables stored in session
	unset($_SESSION['password']);
	unset($_SESSION['level']);
	unset($_SESSION['nama_user']);
	unset($_SESSION['gambar']); 

	header("location:../login.php");
} else {
	unset($_SESSION['username']);       //Unset the variables stored in session
	unset($_SESSION['password']);
	unset($_SESSION['level']);
	unset($_SESSION['nama_user']);
	unset($_SESSION['gambar']); 

	header("location:../login.php");
}