<?php
$mysqli = new mysqli("localhost", "root", "", "reklasicizam");
if($mysqli->error){
    die("Greska: " . $mysqli->error);
}
$upit = "select distinct autor from proizvod where NazivProizvoda LIKE'%". $_GET['pol'] . "'";
$rez = $mysqli->query($upit);
    echo "<option value='Sve' selected>Sve</option>";
while($red = $rez->fetch_assoc()){
    echo "<option value='" . $red['autor'] . "'>" . $red['autor'] . "</option>";
}