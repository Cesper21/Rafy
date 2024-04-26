<?php
include "koneksi.php";
session_start();

if(isset($_POST['fotoid'], $_POST['judulfoto'], $_POST['deskripsifoto'], $_POST['albumid'])) {
    $fotoid = $_POST['fotoid'];
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $albumid = $_POST['albumid'];

    if($_FILES['lokasifile']['name']!=""){
        $rand = rand();
        $ekstensi =  array('png','jpg','jpeg','gif');
        $filename = $_FILES['lokasifile']['name'];
        $ukuran = $_FILES['lokasifile']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        
        if(!in_array($ext,$ekstensi) ) {
            header("location:foto.php");
            exit; 
        } else {
            if($ukuran < 1044070){		
                $xx = $rand.'_'.$filename;
                move_uploaded_file($_FILES['lokasifile']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
                $stmt = mysqli_prepare($conn, "UPDATE foto SET judulfoto=?, deskripsifoto=?, lokasifile=?, albumid=? WHERE fotoid=?");
                mysqli_stmt_bind_param($stmt, "ssssi", $judulfoto, $deskripsifoto, $xx, $albumid, $fotoid);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                header("location:foto.php");
                exit; 
            } else {
                header("location:foto.php");
                exit;
            }
        }
    } else {
        $stmt = mysqli_prepare($conn, "UPDATE foto SET judulfoto=?, deskripsifoto=?, albumid=? WHERE fotoid=?");
        mysqli_stmt_bind_param($stmt, "ssii", $judulfoto, $deskripsifoto, $albumid, $fotoid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location:foto.php");
        exit; 
    }
} else {
    echo "Data tidak lengkap.";
}
?>
