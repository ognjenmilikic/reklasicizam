<?php 
    $mysqli = new mysqli("localhost", "root", "", "reklasicizam");
		if($mysqli->error){
			die("Greska: " . $mysqli->error);
		}
    $upit = "select * from proizvod";
    $rez = $mysqli->query($upit);
    while($red = $rez->fetch_assoc()){
        echo "<tr>
                <th scope=\"row\">" . $red['ProizvodID'] . "</th>
                <td>". $red['NazivProizvoda'] . "</td>
                <td>" . $red['Cena'] . "</td>
                <td>" . $red['Autor'] . "</td>
                <td>". $red['DostupnaKolicina'] ."</td>
                <td><img src=\"". $red['PutanjaDoSlike'] ."\" class=\"img-thumbnail\" width=\"100\" height=\"100\"></td>
                <td><img src=\"". $red['PutanjaDoZumiraneSlike'] ."\" class=\"img-thumbnail\" width=\"100\" height=\"100\"></td>
                <td><button class=\"btn card-product-btn edit-btn\" data-toggle=\"modal\"
                data-target=\"#editModal\" onclick=\"getProductDetails(" . $red['ProizvodID'] . ")\"><i class=\"fas fa-edit\"></i> Izmena</button></td>
                <td><button onclick=\"obrisiProizvod(" . $red['ProizvodID'] . ")\" class=\"btn card-product-btn delete-btn\"><i class=\"far fa-trash-alt\"></i> Brisanje</button></td>
            </tr>";
    }
?>