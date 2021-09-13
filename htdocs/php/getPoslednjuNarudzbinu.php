<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "reklasicizam");
if ($mysqli->error)
    die("Greska: " . $mysqli->error);
    $upit = "SELECT p.NazivProizvoda, p.Cena, n.Velicina, n.Kolicina, n.DatumNarudzbine, n.NarudzbinaID, p.PutanjaDoSlike, n.Realizovano
         FROM narudzbina n JOIN proizvod p on n.ProizvodID=p.ProizvodID join korisnik k on n.KorisnikID=k.KorisnikID
         where k.KorisnikID =" . $_SESSION['id'] . "
         ORDER BY n.DatumNarudzbine desc
         LIMIT 1";
    $rez = $mysqli->query($upit);

if ($red = $rez->fetch_assoc()) {
    if ($red['Realizovano']) {
        $realizovano = 'Da';
    } else
        $realizovano = 'Ne';
    echo "
                  <img class=\"img-fluid float-left\" style=\"width: 50%;\" src=\"" . $red['PutanjaDoSlike'] . "\">
                  <div class=\"float-right big-narudzbine-text\"><b><p>Poslednja narudžbina</b><br><br>
                  Naziv proizvoda: " . $red['NazivProizvoda'] . "<br><br>
                  Cena: " . $red['Cena'] . " RSD<br><br>
                  Veličina: " . $red['Velicina'] . "<br><br>
                  Količina: " . $red['Kolicina'] . "<br><br>
                  Datum i vreme narudžbine: " . $red['DatumNarudzbine'] . "<br><br>
                  Realizovano: " . $realizovano . " </p>";
                  if($realizovano == 'Ne'){
                    echo "<button class='btn btn-lg card-product-btn' onclick='deleteNarudzbinu(" . $red['NarudzbinaID'] . ")'>Obriši ovu narudžbinu</button>
                    </div>";
                  }
} else {
    echo "<p>Nemate nijednu narudžbinu.</p>";
}
