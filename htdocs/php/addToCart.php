<?php
session_start();
$id = $_POST['id'];
$kolicina = $_POST['kolicina'];
$velicina = $_POST['velicina'];
$mysqli = new mysqli("localhost", "root", "", "reklasicizam");
if($mysqli->error){
    die("Greska: " . $mysqli->error);
}
$upit = "select DostupnaKolicina from proizvod where proizvodid = '" . $id . "'";
$rez = $mysqli->query($upit);
$red = $rez->fetch_assoc();
if(!$red['DostupnaKolicina']){
    echo "<div class=\"alert alert-danger\" role=\"alert\">
           Ovaj proizvod nije dostupan u magacinu trenutno. Probajte kroz koji dan.
           </div>";
}
else{
    if(isset($_SESSION['cart'][$id])){
        echo "<div class=\"alert alert-danger\" role=\"alert\">
           Proizvod je već u korpi.
           </div>";
    }
    else{
        $_SESSION['cart'][$id]['kolicina'] = $kolicina;
        $_SESSION['cart'][$id]['velicina'] = $velicina;
        echo "<div class=\"alert alert-success\" role=\"alert\">
           Proizvod je dodat u korpu!
           </div>";
    }
}

