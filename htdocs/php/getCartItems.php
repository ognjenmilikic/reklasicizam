<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "reklasicizam");
if($mysqli->error){
    die("Greska: " . $mysqli->error);
}
if(isset($_SESSION['cart']) && count(array_keys($_SESSION['cart'])) > 0){
        $keys = array_keys($_SESSION['cart']);
        $i = 1;
        $ukupnaCena = 0;
        echo "<table class=\"table table-responsive\">
                    <thead>
                    <tr>
                        <th scope=\"col\">Broj</th>
                        <th scope=\"col\">Naziv prozivoda</th>
                        <th scope=\"col\">Cena</th>
                        <th scope=\"col\">Veličina</th>
                        <th scope=\"col\">Količina</th>
                        <th scope=\"col\">Slika</th>
                        <th scope=\"col\">Zumirana slika</th>
                        <th scope=\"col\">Ukloni iz korpe</th>
                    </tr>
                    </thead>
                    <tbody>";
        foreach($keys as $key){
            if($key != 0){
                $upit = "select * from proizvod where proizvodid = " . $key;
                $rez = $mysqli->query($upit);
                $red = $rez->fetch_assoc();
                $nazivProizvoda = $red['NazivProizvoda'];
                $cena = $red['Cena'];
                $slika = $red['PutanjaDoSlike'];
                $zumiranaSlika = $red['PutanjaDoZumiraneSlike'];
                $cena = (int)$red['Cena'] * (int)$_SESSION['cart'][$key]['kolicina'];
                $ukupnaCena+=$cena;
                echo "<tr>
      <th scope=\"row\">" . $i ."</th>
      <td>" . $nazivProizvoda ."</td>
      <td>" . $cena ."</td>
      <td>" . $_SESSION['cart'][$key]['velicina'] ."</td>
      <td>" . $_SESSION['cart'][$key]['kolicina'] ."</td>
      <td><img src=\"" . $slika ."\" class='img-thumbnail' width='100' height='100' </td>
      <td><img src=\"" . $zumiranaSlika ."\" class='img-thumbnail' width='100' height='100' </td>
      <td><button onclick=\"deleteCartItem(" . $red['ProizvodID'] . ")\" class=\"btn card-product-btn delete-btn\"><i class=\"far fa-trash-alt\"></i> Ukloni iz korpe</button></td>
    </tr>";
                $i++;
            }
        }
        echo "<tr><td colspan=\"2\"><b>Ukupna cena narudžbine:<b></td><td><b>" . $ukupnaCena . "<b></td></tr>";
        echo "</tbody></table>";
}
else{
    echo "<p class='h4'>Nema proizvoda u korpi.</p>";
}