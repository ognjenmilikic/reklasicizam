<?php
$mysqli = new mysqli("localhost", "root", "", "reklasicizam");
if($mysqli->error){
    die("Greska: " . $mysqli->error);
}
$id = $_POST['id'];
$response = array();
$upit = 'select * from proizvod where proizvodid=' . $id;
$rez = $mysqli->query($upit);
$red = $rez->fetch_assoc();
echo json_encode($red);
?>