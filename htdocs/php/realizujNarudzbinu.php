<?php
    $mysqli = new mysqli("localhost", "root", "", "reklasicizam");
    if($mysqli->error){
        die("Greska: " . $mysqli->error);
    }
    $idNarudzbine = $_GET['id'];
    if($_GET['reg']){
        $upit = "update narudzbina set realizovano = 1 where narudzbinaid =" . $idNarudzbine;
    }
    else{
        $upit = "update narudzbinabezregistracije set realizovano = 1 where narudzbinaBezRegistracijeID =" . $idNarudzbine;
    }
    $rez = $mysqli->query($upit);
?>