<?php
    $mysqli = new mysqli("localhost", "root", "", "reklasicizam");
    if($mysqli->error){
        die("Greska: " . $mysqli->error);
    }
    $upit = "delete from proizvod where proizvodid=" . $_GET['id'];
    $rez = $mysqli->query($upit);
?>