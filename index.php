<?php 
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data Alumni</title>
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
            <a href="tambah.php">+ Tambah</a>
        </div>
    </div>


     <!-- FORM PENCARIAN -->
      <div class="container-pencarian">
          <form method="GET" class="pencarian">
              <h2>Cari</h2> 
              <input type="text" name="cari" placeholder="Cari Nama / Jurusan / Email..."
              value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
              <button type="submit" >Cari</button>
            </form>
        </div>
    
    <div class="container-tb">    
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Tahun lulus</th>
            <th>Jurusan</th>
            <th>Pekerjaan Saat Ini</th>
            <th>Nomor Telepon</th>
            <th>Email</th>
            <th>Almat</th>
            <th>Action</th>
        </tr>

         <?php
        // PENCARIAN
        if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
            $result = mysqli_query($koneksi, "SELECT * FROM alumni 
                WHERE Nama_Lengkap LIKE '%$cari%' 
                OR Tahun_Lulus LIKE '%$cari%' 
                OR Jurusan LIKE '%$cari%' 
                OR Pekerjaan_Saat_Ini LIKE '%$cari%' 
                OR Nomor_Telepon LIKE '%$cari%' ");
        } else {
            $result = mysqli_query($koneksi, "SELECT * FROM alumni");
        }
        ?>

   <?php
while ($data = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>{$data['Id_Alumni']}</td>
    <td>{$data['Nama_Lengkap']}</td>
    <td>{$data['Tahun_Lulus']}</td>
    <td>{$data['Jurusan']}</td>
    <td>{$data['Pekerjaan_Saat_Ini']}</td>
    <td>{$data['Nomor_Telepon']}</td>
    <td>{$data['Email']}</td>
    <td>{$data['Alamat']}</td>
    <td>
    <a class='btn-edit' href='edit.php?id_alumni={$data['Id_Alumni']}'>Edit</a>
    <a class='btn-hapus' href='hapus.php?id_alumni={$data['Id_Alumni']}' onclick=\"return confirm('Yakin ingin hapus?')\">Hapus</a>
    </td>
    </tr>";
}
?>

    </table>
    </div>
    
</body>
</html>