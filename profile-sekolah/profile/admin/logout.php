<?php
// Mulai sesi
session_start();

// Hapus semua sesi
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghancurkan sesi

// Redirect ke halaman login (atau halaman lain setelah logout)
header("Location: login.php"); // Ganti "login.php" dengan halaman tujuan setelah logout
exit(); // Menghentikan eksekusi lebih lanjut
?>