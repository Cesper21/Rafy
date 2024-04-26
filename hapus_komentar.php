<?php
session_start();

if(!isset($_SESSION['userid'])){
    header("location:login.php");
    exit; // Menghentikan eksekusi skrip
}

// Pastikan komentarid ada dalam parameter GET sebelum menghapusnya
if(isset($_GET['komentarid'])) {
    include "koneksi.php";
    
    $komentarid = $_GET['komentarid'];
    $query = "DELETE FROM komentarfoto WHERE komentarid=?";
    
    // Persiapkan statement
    $stmt = mysqli_prepare($conn, $query);
    
    // Bind parameter
    mysqli_stmt_bind_param($stmt, "i", $komentarid);
    
    // Eksekusi statement
    if(mysqli_stmt_execute($stmt)) {
        // Redirect kembali ke halaman sebelumnya setelah menghapus
        header("location:" . $_SERVER['HTTP_REFERER']);
        exit; // Menghentikan eksekusi skrip
    } else {
        echo "Gagal menghapus komentar.";
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
} else {
    echo "Komentar tidak ditemukan.";
}
?>
