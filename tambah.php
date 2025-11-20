<?php 
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

     <video autoplay muted loop id="video-bg">
        <source src="bg1.mp4" type="video/mp4">
    </video>

    <div id="content"></div>

    <div class="container-nav">
        <div class="nav">
            <h1>Manajemen Data Alumni</h1>
            <a href="index.php">Kembali</a>
        </div>
    </div>

    <main>
        <div class="container-form">
            <h2>Tambah Data Alumni</h2>
        <form action="tambah.php" method="POST">
            <input type="text" name="Nama_Lengkap" placeholder="Masukkan Nama_Lengkap">
            <input type="text" name="Tahun_Lulus" placeholder="Masukkan Tahun_Lulus">
            <select name="Jurusan">
            <option>Pilihan Jurusan</option>
            <option value="RPL">RPL</option>
            <option value="TKJ">TKJ</option>
            <option value="TJAT">TJAT</option>
            <option value="Animasi">Animasi</option>
        </select>
          <input type="text" name="Pekerjaan_Saat_Ini" placeholder="Masukkan Pekerjaan_Saat_Ini">
        <input type="text" name="Nomor_Telepon" placeholder="Masukkan Nomor_Telepon">
         <input type="text" name="Email" placeholder="Masukkan Email">
        <textarea name="Alamat" placeholder="Masukkan Alamat"></textarea>
        <button name="simpan">Simpan</button>
        
    <?php 
        if(isset($_POST['simpan'])) {
        $sql = "INSERT INTO alumni (
            Nama_Lengkap,Tahun_Lulus,Jurusan,Pekerjaan_Saat_Ini,Nomor_Telepon,Email,Alamat
        ) VALUES 
        (
            '$_POST[Nama_Lengkap]',
            '$_POST[Tahun_Lulus]',
            '$_POST[Jurusan]',
            '$_POST[Pekerjaan_Saat_Ini]',
            '$_POST[Nomor_Telepon]',
            '$_POST[Email]',
            '$_POST[Alamat]'
        )";

        mysqli_query($koneksi,$sql);
        echo "<p>Berhasil! <a href='index.php'>Kembali</a></p>";
        }
    ?>
    </form>
    </div>
    </main>


</body>
</html>