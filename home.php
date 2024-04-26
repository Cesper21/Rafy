<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
</head>
<body>
    <h1><p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p></h1>
    <style>
        nav {
            background-color: black;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        nav ul {
            list-style: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: white;
            font-size: 20px;
            text-decoration: none;
            text-transform: capitalize;
        }
        nav ul li a:hover {
            color: crimson;
            transition: all .3s ease-in-out;
        }
        h1 {
            text-align: center;
            margin-top: 30px;
        }
    </style>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="album.php">Album</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</body>
</html>