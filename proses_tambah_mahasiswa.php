<?php
include 'koneksi.php';

$nim=$_POST['NIM'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$jkl=$_POST['JKL'];

$sql = "INSERT INTO mahasiswa (NIM, nama, alamat,JKL) VALUES ('$nim', '$nama', '$alamat','$jkl')";

if ($conn->query($sql) === TRUE) {
  header ( 'location:form.php' );
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>    