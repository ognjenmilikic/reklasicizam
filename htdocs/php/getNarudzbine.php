<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "reklasicizam");
if ($mysqli->error)
    die("Greska: " . $mysqli->error);
$upit2 = "select COUNT(*) from narudzbina where KorisnikID =" . $_SESSION['id'];
$rez2 = $mysqli->query($upit2);
if ($red2 = $rez2->fetch_assoc()) {
    $upit = "SELECT p.NazivProizvoda, p.Cena, n.Velicina, n.Kolicina, n.DatumNarudzbine, p.PutanjaDoSlike, n.Realizovano
         FROM narudzbina n JOIN proizvod p on n.ProizvodID=p.ProizvodID join korisnik k on n.KorisnikID=k.KorisnikID
         where k.KorisnikID =" . $_SESSION['id'] . "
         ORDER BY n.DatumNarudzbine desc
         LIMIT 4";
    $rez = $mysqli->query($upit);
    $i = 0;
    while ($red[$i] = $rez->fetch_assoc()) {
        $i++;
    }
}

if ($red2['COUNT(*)']) {
    if (($red2['COUNT(*)']) > 4) {
        $brRedova = 4;
    } else {
        $brRedova = $red2['COUNT(*)'];
    }
    for ($i = 0; $i < $brRedova; $i++) {
        if ($red[$i]['Realizovano']) {
            $realizovano = 'Da';
        } else
            $realizovano = 'Ne';
        echo "<div class=\"col pisac-section-2 d-flex align-items-center\" style=\"border-radius: .25rem;\" data-aos\"fade-up\">
                      <img class=\"img-fluid float-left\" style=\"width:50%\" src=\"" . $red[$i]['PutanjaDoSlike'] . "\">
                      <p class=\"float-right big-narudzbine-text\">Naziv proizvoda: " . $red[$i]['NazivProizvoda'] . " <br><br>
                      Cena: " . $red[$i]['Cena'] . " RSD <br><br>
                      Veličina: " . $red[$i]['Velicina'] . " <br><br>
                      Količina: " . $red[$i]['Kolicina'] . " <br><br>
                      Datum i vreme narudžbine: " . $red[$i]['DatumNarudzbine'] . "<br><br>
                      Realizovano: " . $realizovano . "</p>
                      </div>";
    }
} else {
    echo " <div class=\"col pisac-section-2\" style=\"border-radius: .25rem;\">
                      <p>Nemate nijednu narudžbinu.</p>
                      </div>
              ";
}
