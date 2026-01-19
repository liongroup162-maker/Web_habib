<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit mahasiswa</title>
</head>
<body>

<h2>edit data mahasiswa</h2>

<?php 
include 'koneksi.php';
$nim=$_GET['nim'];

$sql = "SELECT * FROM mahasiswa WHERE NIM = '$nim' ";
$hasil = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($hasil);

?>

<form action="proses_edit.php" METHOD ="POST">
  <label for="NIM">NIM:</label><br>
  <input type="number" id="NIM" name="NIM" value="<?php echo $data['NIM']; ?>" readonly ><br>

  <label for="nama">nama:</label><br>
  <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>"><br>

  <label for="alamat">alamat:</label><br>
  <input type="text" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>"><br>

  <label for="JKL">JKL:</label><br>
  <select id="JKL" name="JKL">
    <option value="<?php echo $data['JKL']; ?>"><?php echo $data['JKL']; ?></option>
    <option value="laki-laki">laki-laki</option>
    <option value="perempuan">perempuan</option><br><br>
  <input type="submit" value="simpan data">
</form> 

    
</body>
</html>