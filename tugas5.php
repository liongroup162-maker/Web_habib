<?php
$bln = date("M");
switch($bln)
{
case "Jan" : $namaBln = "Januari";
$hari  = 31;
break;
case "Feb" : $namaBln = "Februari";
$hari  = 29;
break;
case "Mar" : $namaBln = "Maret";
$hari  = 31;
break;
case "Apr" : $namaBln = "April";
$hari  = 30;
break;
case "May" : $namaBln = "Mei";
$hari  = 31;
break;
case "Jun" : $namaBln = "Juni";
$hari  = 30;
break;
case "Jul" : $namaBln = "Juli";
$hari  = 31;
break;
case "Aug" : $namaBln = "Agustus";
$hari  = 31;
break;
case "Sep" : $namaBln = "September";
$hari  = 30;
break;
case "Oct" : $namaBln = "Oktober";
$hari  = 31;
break;
case "Nov" : $namaBln = "November";
$hari  = 30;
break;
case "Dec" : $namaBln = "Desember";
$hari  = 31;
break;
}
echo "Nama bulan sekarang adalah : $namaBln dan jumlah hari : $hari ";
?>