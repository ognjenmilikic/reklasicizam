<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="css/stil.css">
	<link rel="icon" type="image/png" href="images/favicon.png"/>
	<title>Reklasicizam</title>
</head>
<body>
	<div class="container-fluid">
		<?php include 'php/header.php' ?>
		<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  			<div class="carousel-inner">
    			<div class="carousel-item active">
      				<img src="images/home-background.png" class="d-block w-100" alt="carousel-cover-1" data-interval="10000">
    			</div>
    			<div class="carousel-item">
      				<img src="images/home-background-2.png" class="d-block w-100" alt="carousel-cover-2" data-interval="2000">
    			</div>
    			<div class="carousel-item">
      				<img src="images/home-background-3.png" class="d-block w-100" alt="carousel-cover-3" data-interval="2000">
    			</div>
  			</div>
  			<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    			<span class="sr-only">Previous</span>
  			</a>
  			<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    			<span class="carousel-control-next-icon" aria-hidden="true"></span>
    			<span class="sr-only">Next</span>
  			</a>
		</div>
		<?php
			$mysqli = new mysqli("localhost", "root", "", "reklasicizam");
			if($mysqli->error){
				die("Greska: " . $mysqli->error);
			}
			$idAndric="";
			$nazivAndric="";
			$cenaAndric="";
			$putanjaDoSlikeAndric="";
			$putanjaDoZumiraneSlikeAndric="";

			$upit = "select * from proizvod where NazivProizvoda like 'Andrić%'";
			
			$rez = $mysqli->query($upit);

			if(!($red=$rez->fetch_assoc())){
				$nazivAndric = "greska";
				$cenaAndric = "0";
				$putanjaDoSlikeAndric="";
				$putanjaDoZumiraneSlikeAndric="";
				$idAndric="";
			}
			else{
				$idAndric = $red['ProizvodID'];
				$nazivAndric = $red['NazivProizvoda'];
				$cenaAndric = $red['Cena'] . " RSD";
				$putanjaDoSlikeAndric= $red['PutanjaDoSlike'];
				$putanjaDoZumiraneSlikeAndric= $red['PutanjaDoZumiraneSlike'];
			}
		?>
		<div class="row section-1">
			<div class="col-md-6 d-flex align-items-center" data-aos="fade-right">
				<div class="row">
					<div class="col-md-6 pisac-section d-flex align-items-center">
						<img src="images/andric-cover.png" class="img-fluid float-left img-shadow" alt="andric">
					</div>
					<div class="col-md-6 pisac-section d-flex align-items-center">
						<blockquote class="blockquote text-right">
  							<p class="mb-0">Toliko je bilo u životu stvari kojih smo se bojali. A nije trebalo. Trebalo je naručiti Reklasicizam majicu.</p>
  							<footer class="blockquote-footer">Ivo Andrić <cite title="Source Title">Znakovi pored puta</cite></footer>
						</blockquote>
					</div>
				</div>
			</div>
			<div class="col-md-6 pisac-section d-flex align-items-center" data-aos="fade-left">
				<div class="card mx-auto product-card img-shadow" style="width: 70%;">
  					<img class="card-img-top" src="<?php echo $putanjaDoSlikeAndric ?>" alt="andric majica" onmouseover="productCardHover(this, '<?php echo $putanjaDoZumiraneSlikeAndric ?>');" onmouseout="productCardUnhover(this, '<?php echo $putanjaDoSlikeAndric ?>');">
  					<div class="card-body text-center">
					    <h5 class="card-title"><?php echo $nazivAndric; ?></h5>
    					<p class="card-text"><?php echo $cenaAndric; ?></p>
    					<button class="btn btn-primary card-product-btn" onclick="showProduct(<?php echo $idAndric ?>)" data-toggle="modal" data-target="#productModal">Naruči</button>
  					</div>
				</div>
			</div>
		</div>
		<?php 
			$idNjegos="";
			$nazivNjegos="";
			$cenaNjegos="";
			$putanjaDoSlikeNjegos="";
			$putanjaDoZumiraneSlikeNjegos="";

			$upit = "select * from proizvod where NazivProizvoda like 'Njegoš%'";
			
			$rez = $mysqli->query($upit);

			if(!($red=$rez->fetch_assoc())){
				$idNjegos="";
				$nazivNjegos = "greska";
				$cenaNjegos = "0";
				$putanjaDoSlikeNjegos="";
				$putanjaDoZumiraneSlikeNjegos="";
			}
			else{
				$idNjegos= $red['ProizvodID'];
				$nazivNjegos = $red['NazivProizvoda'];
				$cenaNjegos = $red['Cena'] . " RSD";
				$putanjaDoSlikeNjegos = $red['PutanjaDoSlike'];
				$putanjaDoZumiraneSlikeNjegos = $red['PutanjaDoZumiraneSlike'];
			}
		?>
		<div class="row section-2">
			<div class="col-md-6 pisac-section-2 d-flex align-items-center" data-aos="fade-right">
				<div class="card mx-auto product-card-2 img-shadow" style="width: 70%;">
  					<img class="card-img-top" src="<?php echo $putanjaDoSlikeNjegos ?>" alt="njegos majica" onmouseover="productCardHover(this, '<?php echo $putanjaDoZumiraneSlikeNjegos ?>');" onmouseout="productCardUnhover(this, '<?php echo $putanjaDoSlikeNjegos ?>');">
  					<div class="card-body text-center">
					    <h5 class="card-title"><?php echo $nazivNjegos; ?></h5>
    					<p class="card-text"><?php echo $cenaNjegos; ?></p>
    					<button class="btn btn-primary card-product-btn-2" onclick="showProduct(<?php echo $idNjegos ?>)" data-toggle="modal" data-target="#productModal">Naruči</button>
  					</div>
				</div>
			</div>
			<div class="col-md-6 d-flex align-items-center" data-aos="fade-left">
				<div class="row">
					<div class="col-md-6 pisac-section-2 d-flex align-items-center">
						<blockquote class="blockquote text-left">
  							<p class="mb-0">Tvrd je orah voćka čudnovata, ne slomi ga, al majicu kupi!</p>
  							<footer class="blockquote-footer">Petar II Petrović Njegoš <cite title="Source Title">Gorski vijenac</cite></footer>
						</blockquote>
					</div>
					<div class="col-md-6 pisac-section-2 d-flex align-items-center">
						<img src="images/njegos-cover.png" class="img-fluid float-right img-shadow" alt="crnjanski">
					</div>
				</div>
			</div>
		</div>
		<?php 
		    $idCrnjanski="";
			$nazivCrnjanski="";
			$cenaCrnjanski="";
			$putanjaDoSlikeCrnjanski="";
			$putanjaDoZumiraneSlikeCrnjanski="";

			$upit = "select * from proizvod where NazivProizvoda like 'Crnjanski%'";
			
			$rez = $mysqli->query($upit);

			if(!($red=$rez->fetch_assoc())){
				$idCrnjanski="";
				$nazivCrnjanski = "greska";
				$cenaCrnjanski = "0";
				$putanjaDoSlikeCrnjanski="";
				$putanjaDoZumiraneSlikeCrnjanski="";
			}
			else{
				$idCrnjanski= $red['ProizvodID'];
				$nazivCranjanski = $red['NazivProizvoda'];
				$cenaCrnjanski = $red['Cena'] . " RSD";
				$putanjaDoSlikeCrnjanski= $red['PutanjaDoSlike'];
				$putanjaDoZumiraneSlikeCrnjanski= $red['PutanjaDoZumiraneSlike'];
			}
		?>
		<div class="row section-1">
			<div class="col-md-6 d-flex align-items-center" data-aos="fade-right">
				<div class="row">
					<div class="col-md-6 pisac-section d-flex align-items-center">
						<img src="images/crnjanski-cover.png" class="img-fluid float-left img-shadow" alt="crnjanski">
					</div>
					<div class="col-md-6 pisac-section d-flex align-items-center">
						<blockquote class="blockquote text-right">
  							<p class="mb-0">Ja nisam više željan da me ko voli, nego da svi zavole lišće i kupe Reklasicizam majicu.</p>
  							<footer class="blockquote-footer">Miloš Crnjanski <cite title="Source Title">Dnevnik o Čarnojeviću</cite></footer>
						</blockquote>
					</div>
				</div>
			</div>
			<div class="col-md-6 pisac-section d-flex align-items-center" data-aos="fade-left">
				<div class="card mx-auto product-card img-shadow" style="width: 70%;">
  					<img class="card-img-top" src="<?php echo $putanjaDoSlikeCrnjanski ?>" alt="crnjanski majica" onmouseover="productCardHover(this,'<?php echo $putanjaDoZumiraneSlikeCrnjanski ?>');" onmouseout="productCardUnhover(this,'<?php echo $putanjaDoSlikeCrnjanski ?>');">
  					<div class="card-body text-center">
					    <h5 class="card-title"><?php echo $nazivCranjanski; ?></h5>
    					<p class="card-text"><?php echo $cenaCrnjanski; ?></p>
    					<button class="btn btn-primary card-product-btn" onclick="showProduct(<?php echo $idCrnjanski ?>)" data-toggle="modal" data-target="#productModal">Naruči</button>
  					</div>
				</div>
			</div>
		</div>
		<?php include 'php/onamasection.php' ?>
		<?php include 'php/socialsection.php' ?>
		<?php include 'php/footer.php' ?>
	</div>
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Proizvod</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="rezultatDodavanjaUKorpu"></div>
                        <div class="col-md-6" data-aos="fade-right">
                            <div class="card mx-auto product-card img-shadow" style="width: 70%;">
                                <img id="slika" class="card-img-top" src="">
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-left">
                            <h4 id="nazivProizvoda"><span class="text-muted" id="cena"></span>
                            </h4>
                                <input type="hidden" id="id" name="id" value="">
                                <div class="form-group">
                                    <label for="velicina" class="h5" style="margin-top:5%;">Veličina</label>
                                    <select class="form-control form-control-lg" id="velicina" name="velicina">
                                        <option>XS</option>
                                        <option>S</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XL</option>
                                        <option>XXL</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kolicina" class="h5" style="margin-top:5%;">Količina</label>
                                    <input type="number" id="kolicina" class="form-control form-control-lg" step="1" min="1" max="" name="kolicina" value="1" inputmode="numeric">
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn card-product-btn" data-dismiss="modal">Izađi</button>
                    <button type="button" class="btn card-product-btn-2" onclick="addToCart()">Stavi u korpu</button>
                </div>
            </div>
        </div>
    </div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
  		AOS.init();
	</script>
	<script src="https://kit.fontawesome.com/961183c6b9.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/productCardHover.js"></script>
	<script type="text/javascript" src="js/showProduct.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>
</html>