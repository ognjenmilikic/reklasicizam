<?php 
    if($_GET['reg']){
        $mysqli = new mysqli("localhost", "root", "", "reklasicizam");
		if($mysqli->error){
			die("Greska: " . $mysqli->error);
		}
    $upit = "SELECT n.NarudzbinaID, p.NazivProizvoda, p.Cena, n.Velicina, n.Kolicina, n.DatumNarudzbine,
    k.Ime, k.Prezime, k.Grad, k.PostanskiBroj, k.Adresa, k.Telefon
    from narudzbina n join korisnik k on n.KorisnikID = k.KorisnikID join proizvod p on n.ProizvodID = p.ProizvodID
    where n.Realizovano = 0
    ";
    $rez = $mysqli->query($upit);
    while($red = $rez->fetch_assoc()){
        echo "<tr>
                <th scope=\"row\">" . $red['NarudzbinaID'] . "</th>
                <td>". $red['NazivProizvoda'] . "</td>
                <td>" . $red['Cena'] . "</td>
                <td>". $red['Velicina'] ."</td>
                <td>". $red['Kolicina'] ."</td>
                <td>". $red['DatumNarudzbine'] ."</td>
                <td>". $red['Ime'] ."</td>
                <td>". $red['Prezime'] ."</td>
                <td>". $red['Grad'] ."</td>
                <td>". $red['PostanskiBroj'] ."</td>
                <td>". $red['Adresa'] ."</td>
                <td>". $red['Telefon'] ."</td>
                <td><button onclick=\"realizujNarudzbinu(" . $red['NarudzbinaID'] . ", 1)\" class=\"btn card-product-btn edit-btn\"><i class=\"fas fa-check\"></i> Označi kao realizovano</button></td>
            </tr>";
        } 
    }
    else{
        $mysqli = new mysqli("localhost", "root", "", "reklasicizam");
		if($mysqli->error){
			die("Greska: " . $mysqli->error);
		}
    $upit = "SELECT n.narudzbinaBezRegistracijeID, p.NazivProizvoda, p.Cena, n.Velicina, n.Kolicina, n.DatumNarudzbine,
    n.Ime, n.Prezime, n.Grad, n.PostanskiBroj, n.Adresa, n.Telefon
    from narudzbinabezregistracije n join proizvod p on n.ProizvodID = p.ProizvodID
    where n.Realizovano = 0
    ";
    $rez = $mysqli->query($upit);
    while($red = $rez->fetch_assoc()){
        echo "<tr>
                <th scope=\"row\">" . $red['narudzbinaBezRegistracijeID'] . "</th>
                <td>". $red['NazivProizvoda'] . "</td>
                <td>" . $red['Cena'] . "</td>
                <td>". $red['Velicina'] ."</td>
                <td>". $red['Kolicina'] ."</td>
                <td>". $red['DatumNarudzbine'] ."</td>
                <td>". $red['Ime'] ."</td>
                <td>". $red['Prezime'] ."</td>
                <td>". $red['Grad'] ."</td>
                <td>". $red['PostanskiBroj'] ."</td>
                <td>". $red['Adresa'] ."</td>
                <td>". $red['Telefon'] ."</td>
                <td><button onclick=\"realizujNarudzbinu(" . $red['narudzbinaBezRegistracijeID'] . ", 0)\" class=\"btn card-product-btn edit-btn\"><i class=\"fas fa-check\"></i> Označi kao realizovano</button></td>
            </tr>";
        } 
    }
?>