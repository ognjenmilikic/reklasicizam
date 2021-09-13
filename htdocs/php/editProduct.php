<?php
$mysqli = new mysqli("localhost", "root", "", "reklasicizam");
if($mysqli->error){
    die("Greska: " . $mysqli->error);
}
    if(isset($_FILES['novaSlika']['name'])){
        $putanjaDoSlike = 'images/' . $_FILES['novaSlika']['name'];
        move_uploaded_file($_FILES['novaSlika']['tmp_name'], '../' . $putanjaDoSlike);
    }
    else{
        $putanjaDoSlike = $_POST['putanjaDoSlike'];
    }
    if(isset($_FILES['novaZumiranaSlika']['name'])){
        $putanjaDoZumiraneSlike = 'images/' . $_FILES['novaZumiranaSlika']['name'];
        move_uploaded_file($_FILES['novaZumiranaSlika']['tmp_name'], '../' . $putanjaDoZumiraneSlike);
    }
    else{
        $putanjaDoZumiraneSlike = $_POST['putanjaDoZumiraneSlike'];
    }
    $id = $_POST['id'];
    $nazivProizvoda = $_POST['nazivProizvoda'];
    $cena = $_POST['cena'];
    $dostupnaKolicina = $_POST['dostupnaKolicina'];
    $autor = $_POST['autor'];

    $upit = "update proizvod set NazivProizvoda='" . $nazivProizvoda . "', Cena='" . $cena . "', DostupnaKolicina='" 
    . $dostupnaKolicina . "', PutanjaDoSlike='" . $putanjaDoSlike . "', PutanjaDoZumiraneSlike='" . $putanjaDoZumiraneSlike . "', Autor='" . $autor . "' where ProizvodID = " . $id;

    $rez = $mysqli->query($upit);
?>