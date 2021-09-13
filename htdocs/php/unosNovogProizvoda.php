<?php
    $mysqli = new mysqli("localhost", "root", "", "reklasicizam");
    if($mysqli->error){
        die("Greska: " . $mysqli->error);
    }
    if(0 < $_FILES['slika']['error'] || 0 < $_FILES['zumiranaSlika']['error']){
        echo 'Error: ' . $_FILES['slika']['error'] . $_FILES['zumiranaSlika']['error'];
    }
    else{
        $putanjaDoSlike = 'images/' . $_FILES['slika']['name'];
        $putanjaDoZumiraneSlike = 'images/' . $_FILES['zumiranaSlika']['name'];
        move_uploaded_file($_FILES['slika']['tmp_name'], '../' . $putanjaDoSlike);
        move_uploaded_file($_FILES['zumiranaSlika']['tmp_name'], '../' . $putanjaDoZumiraneSlike);
        echo 'file uploaded successfully';
    }
    $nazivProizvoda = $_POST['nazivProizvoda'];
    $cena = $_POST['cena'];
    $dostupnaKolicina = $_POST['dostupnaKolicina'];
    $autor = $_POST['autor'];

    $upit = "insert into proizvod (NazivProizvoda, Cena, DostupnaKolicina, PutanjaDoSlike, PutanjaDoZumiraneSlike, Autor) VALUES
    ('" . $nazivProizvoda . "', '" . $cena . "', '" . $dostupnaKolicina . "', '" . $putanjaDoSlike . "', '" . $putanjaDoZumiraneSlike . "', '" . $autor . "')";

    $rez = $mysqli->query($upit);
?>