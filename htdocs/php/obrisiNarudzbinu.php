<?php
$mysqli = new mysqli("localhost", "root", "", "reklasicizam");
if ($mysqli->error)
    die("Greska: " . $mysqli->error);
$upit = "delete from narudzbina where narudzbinaid = " . $_GET['id'];
$rez = $mysqli->query($upit);
