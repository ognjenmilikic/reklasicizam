<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <title>Muška kolekcija - Reklasicizam</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stil.css">
</head>
<body onload="loadProducts('M'); fillAutore('M');">
<div class="container-fluid">
    <?php include 'php/header.php' ?>
    <div class="row section-1">
        <div class="col-md-12 pisac-section" data-aos="fade-up" style="padding-bottom: 0;">
            <h1 class="display-4">Muška kolekcija</h1>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <p class="lead" id="product-count"></p>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="sort" class="col-sm-6 col-form-label">Sortirajte po ceni:</label>
                        <div class="col-sm-6">
                            <select id="sort" class="form-control" onchange="loadProducts('M')">
                                <option value="izaberi" selected>Izaberi</option>
                                <option value="rastuce">Rastuće</option>
                                <option value="opadajuce">Opadajuće</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="autori" class="col-sm-6 col-form-label">Filtrirajte po autorima:</label>
                        <div class="col-sm-6">
                            <select id="autori" class="form-control" onchange="loadProducts('M')">
                                <option value="Sve" selected>Sve</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="products-section">
    </div>
    </div>
    <?php include 'php/footer.php' ?>
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
</div>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="https://kit.fontawesome.com/961183c6b9.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/productCardHover.js"></script>
<script type="text/javascript" src="js/showProduct.js"></script>
<script type="text/javascript" src="js/loadProducts.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>
</html>