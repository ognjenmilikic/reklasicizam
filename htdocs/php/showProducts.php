<?php
$mysqli = new mysqli("localhost", "root", "", "reklasicizam");
if($mysqli->error){
    die("Greska: " . $mysqli->error);
}
    if($_GET['autor'] == 'Sve'){
        $upit = "select * from proizvod where NazivProizvoda LIKE'%". $_GET['pol'] . "'";
    }
    else{
        $upit = "select * from proizvod where NazivProizvoda LIKE'%". $_GET['pol'] . "' and Autor LIKE '". $_GET['autor'] . "'";
    }
    if($_GET['tipSorta'] != 'izaberi'){
        if($_GET['tipSorta'] == 'rastuce'){
            $upit.= " ORDER BY cena asc";
        }
        else{
            $upit.= " ORDER BY cena desc";
        }
    }
$rez = $mysqli->query($upit);
$totalProducts = mysqli_num_rows($rez);
$rowNmbr = $totalProducts/3;
for($i = 0; $i<$rowNmbr; $i++){
    echo "<div class=\"row section-1\">";
    for($j=0; $j<3; $j++){
        if($red = $rez->fetch_assoc()){
            echo "<div class=\"col-md-4 pisac-section\">
            <div class=\"card mx-auto product-card img-shadow\" style=\"width: 80%;\">
                <img class=\"card-img-top\" src=\"". $red['PutanjaDoSlike'] . "\" onmouseover=\"productCardHover(this, '" . $red['PutanjaDoZumiraneSlike'] . "');\" onmouseout=\"productCardUnhover(this, '" . $red['PutanjaDoSlike'] . "');\">
                <div class=\"card-body text-center\">
                    <h5 class=\"card-title\">" . $red['NazivProizvoda'] . "</h5>
                    <p class=\"card-text\">" . $red['Cena'] . " RSD</p>
                    <button class=\"btn btn-primary card-product-btn\" onclick=\"showProduct(". $red['ProizvodID'] .")\" data-toggle=\"modal\" data-target=\"#productModal\">Naruči</button>
                </div>
            </div>
      </div>
    ";
        }
        else{
            break;
        }
    }
    echo "</div>";
}


while($red = $rez->fetch_assoc()){
   
}
