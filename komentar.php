<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:login.php");
    exit; // tambahkan exit setelah mengarahkan header untuk menghentikan eksekusi skrip
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Komentar</title>
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
    <style>
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        table {
            width: 100%;
        }
        table td {
            padding: 10px;
        }
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 10px 0;
        }
        input[type="submit"] {
            width: 100%;
            background-color: red;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Halaman Komentar</h1>
    <p>Selamat datang <b><?= $_SESSION['namalengkap'] ?></b></p>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="album.php">Album</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <p>
        <form action="tambah_komentar.php" method="post">
            <?php
            include "koneksi.php";
            // Pastikan fotoid ada dalam parameter GET sebelum mengambilnya
            if(isset($_GET['fotoid'])) {
                $fotoid = mysqli_real_escape_string($conn, $_GET['fotoid']);
                $sql = mysqli_query($conn, "SELECT * FROM foto WHERE fotoid='$fotoid'");
                while($data = mysqli_fetch_array($sql)) {
            ?>
            <input type="hidden" name="fotoid" value="<?= $data['fotoid'] ?>">
            <table>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="judulfoto" value="<?= $data['judulfoto'] ?>"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="text" name="deskripsifoto" value="<?= $data['deskripsifoto'] ?>"></td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td><img src="gambar/<?= $data['lokasifile'] ?>" width="200px"></td>
                </tr>
                <tr>
                    <td>Komentar</td>
                    <td><input type="text" name="isikomentar" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tambah"></td>
                </tr>
            </table>
            <?php
                }
            }
            ?>
        </form>
    </p>
    <table width="100%" border="0" cellpadding="5" cellspacing="0">
        <tr>
          
            <th>Nama</th>
            <th>Komentar</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        <?php
        include "koneksi.php";
        if(isset($_GET['fotoid'])) {
            $fotoid = mysqli_real_escape_string($conn, $_GET['fotoid']);
            $sql = mysqli_query($conn, "SELECT * FROM komentarfoto JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
            while($data = mysqli_fetch_array($sql)) {
        ?>
        <tr>
          
            <td><?= $data['namalengkap'] ?></td>
            <td><?= $data['isikomentar'] ?></td>
            <td><?= $data['tanggalkomentar'] ?></td>
            <td><a href="hapus_komentar.php?komentarid=<?= $data['komentarid'] ?>">Hapus</a></td>
        </tr>
        <?php
            }
        }
        ?>
    </table>
</body>
</html>
