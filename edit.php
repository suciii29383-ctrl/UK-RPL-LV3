<?php 
session_start();
include 'koneksi.php';
$id_alumni = $_GET['id_alumni'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM alumni WHERE id_alumni=$id_alumni"));
if(isset($_POST['perbarui'])) {
    $sql = "UPDATE alumni SET
    Nama_Lengkap='$_POST[Nama_Lengkap]',Tahun_Lulus='$_POST[Tahun_Lulus]',Jurusan='$_POST[Jurusan]',Pekerjaan_Saat_Ini='$_POST[Pekerjaan_Saat_Ini]',
    Nomor_Telepon='$_POST[Nomor_Telepon]',Email='$_POST[Email]',Alamat='$_POST[Alamat]' WHERE id_alumni=$id_alumni";
    mysqli_query($koneksi,$sql);
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Alumni</title>
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
            <h2>Edit Data Tambahan</h2>
            <form method="post">
           <input type="text" name="Nama_Lengkap" value="<?= $data['Nama_Lengkap']?>" placeholder="Masukkan Nama_Lengkap" required>
           <input type="text" name="Tahun_Lulus" value="<?= $data['Tahun_Lulus'] ?>" placeholder="Masukkan Tahun_Lulus" required>
         <select name="Jurusan" value="<?= $data['jurusan'] ?>">
            <option>Pilihan Jurusan</option>
            <option value="RPL">RPL</option>
            <option value="TKJ">TKJ</option>
            <option value="TJAT">TJAT</option>
            <option value="Animasi">Animasi</option>
        </select>
        <input type="date" name="Pekerjaan_Saat_Ini" value="<?= $data['Pekerjaan_Saat_Ini'] ?>" placeholder="Masukan Pekerjaan_Saat_Ini" required>
         <input type="text" name="Nomor_Telepon" value="<?= $data['Nomor_Telepon']?>" placeholder="Masukkan Nomor_Telepon" required>
        <input type="text" name="Email" value="<?= $data['Email'] ?>" placeholder="Masukan Email" required>
        <textarea name="Alamat" placeholder="Masukkan Alamat"><?= $data['Alamat'] ?></textarea>
        <button name="perbarui">Perbarui</button>
        
    </form>
    </div>
    </main>

</body>
</html>