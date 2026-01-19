<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>

<body>

<h2>input data mahasiswa</h2>

<form action="proses_tambah_mahasiswa.php" METHOD ="POST">
  <label for="NIM">NIM:</label><br>
  <input type="number" id="NIM" name="NIM" value=""><br>

  <label for="nama">nama:</label><br>
  <input type="text" id="nama" name="nama" value=""><br>

  <label for="alamat">alamat:</label><br>
  <input type="text" id="alamat" name="alamat" value=""><br>

  <label for="JKL">JKL:</label><br>
  <select id="JKL" name="JKL">
    <option value=""></option>
    <option value="laki-laki">laki-laki</option>
    <option value="perempuan">perempuan</option><br><br>

  <input type="submit" value="tambah data">
</form> 

<br>

<?php
include 'koneksi.php';
$sql = "SELECT NIM, nama, alamat,JKL FROM mahasiswa ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>NIM</th><th>Nama</th><th>Alamat</th><th>Jenis kelamin</th><th>aksi</th> </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["NIM"]. "</td>
        <td>" . $row["nama"]."</td>
        <td>". $row["alamat"]. "</td>
        <td>" .$row["JKL"]. "</td> 
        <td>
        <a href ='edit.php?nim=" . $row["NIM"]." '> edit </a> |
        <a href ='hapus.php?nim=" . $row["NIM"]." '> hapus </a> 
        </td>
         </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
} 

$conn->close();
?>



<p>data yang di masukan akan di kirim ke "proses_tambah_mahasiswa"</p>

</body>
</html>
