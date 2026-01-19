<?php
$nilai = 158;
if($nilai >= 200){
 echo "Rp. 80,-/lembar";
}elseif ($nilai >= 100){
 echo "Rp. 100,-/lembar";
}elseif($nilai >=50){
 echo "Rp. 150,-/lembar";
}else{
 echo "Nilai Sangat Kurang";
}
?>