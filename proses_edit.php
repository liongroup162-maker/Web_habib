<?php

include 'koneksi.php';

$nim=$_POST['NIM'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$jkl=$_POST['JKL'];

$sql= "UPDATE mahasiswa SET  nama = '$nama', alamat='$alamat', JKL='$jkl' WHERE NIM ='$nim' ";

if ($conn->query($sql) === TRUE) {
    header ( 'location:form.php' );
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();

?>