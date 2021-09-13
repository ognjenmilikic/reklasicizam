<?php
$mysqli = new mysqli("localhost", "root", "", "reklasicizam");
if($mysqli->error){
    die("Greska: " . $mysqli->error);
}
if($_GET['autor'] != ""){
    if($_GET['autor'] == 'Sve'){
        $upit = "select COUNT(*) from proizvod where NazivProizvoda LIKE'%". $_GET['pol'] . "'";
    }
    else{
        $upit = "select COUNT(*)  from proizvod where NazivProizvoda LIKE'%". $_GET['pol'] . "' and Autor LIKE '". $_GET['autor'] . "'";
    }
}
else{
    $upit = "select COUNT(*) from proizvod where NazivProizvoda LIKE'%". $_GET['pol'] . "'";
}
$rez1 = $mysqli->query($upit);
$productcount = $rez1->fetch_assoc();
echo $productcount['COUNT(*)'] . " proizvoda";
