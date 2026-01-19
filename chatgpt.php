<?php
// Fungsi untuk menghitung luas alas
function luasAlas($r) {
    return pi() * pow($r, 2); // π * r^2
}

// Fungsi untuk menghitung sisi selimut kerucut
function sisiSelimut($r, $t) {
    return sqrt(pow($r, 2) + pow($t, 2)); // sqrt(r^2 + t^2)
}

// Fungsi untuk menghitung luas permukaan kerucut
function luasPermukaan($r, $t) {
    $s = sisiSelimut($r, $t); // Hitung sisi selimut
    return pi() * $r * ($r + $s); // π * r * (r + s)
}

// Input jari-jari alas dan tinggi kerucut
$r = 5; // Contoh jari-jari alas
$t = 12; // Contoh tinggi kerucut

// Hitung luas alas
$luasAlas = luasAlas($r);

// Hitung luas permukaan
$luasPermukaan = luasPermukaan($r, $t);

// Tampilkan hasil
echo "Jari-jari alas: " . $r . " cm\n <br> "; 
echo "Tinggi kerucut: " . $t . " cm\n <br> ";
echo "Luas alas kerucut: " . number_format($luasAlas, 2) . " cm²\n  <br> " ;
echo "Luas permukaan kerucut: " . number_format($luasPermukaan, 2) . " cm²\n  <br> ";
?>
