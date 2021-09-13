<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <title>Korpa - Reklasicizam</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stil.css">
</head>

<body onload="hideSectionTwo(); getCartItems()">
<!-- komentar -->
    <div class="container-fluid">
        <?php include 'php/header.php' ?>
        <div class="row row-cols-1 checkout-row justify-content-md-center" id="checkout-step-1" data-aos="fade-left">
            <div class="col-md-8 checkout-section text-center" id="sadrzajKorpe">
            </div>
            <div class="col checkout-section" style="padding-top: 0; margin-top: 0;">
                <button class="btn btn-primary checkout-btn float-right" onclick="showStepTwo()">Sledeći korak <i
                        class="fas fa-chevron-right"></i></button>
            </div>
        </div>
        <?php
                    if(isset($_SESSION['id'])){
                ?>
        <div class="row checkout-row" id="checkout-step-2" style="display: none;">
            <div class="col checkout-section">
                <h1>Vaši podaci</h1>
                <hr>
            </div>
            <div class="w-100"></div>
            <div class="col checkout-section" style="padding-top: 0;">
                <h3>Ime: <?php echo $_SESSION['ime'] ?></h3>
                <h3>Prezime: <?php echo $_SESSION['prezime'] ?></h3>
                <h3>Telefon: <?php echo $_SESSION['telefon'] ?></h3>
            </div>
            <div class="col checkout-section" style="padding-top: 0;">
                <h3>Grad: <?php echo $_SESSION['grad'] ?></h3>
                <h3>Zip: <?php echo $_SESSION['zip'] ?></h3>
                <h3>Adresa: <?php echo $_SESSION['adresa'] ?></h3>
            </div>
            <div class="w-100"></div>
            <div class="col checkout-section" style="padding-top: 0; margin-top: 2%;">
                <button class="btn btn-primary checkout-btn float-left" onclick="showStepOne()"><i
                        class="fas fa-chevron-left"></i> Prethodni korak</button>
                <button class="btn btn-primary checkout-btn float-right" onclick="submitNarudzbinu()">Naruči <iclass="fas fa-chevron-right"></i></button>
            </div>
        </div>
        <?php }
                    else{
                ?>

        <div class="row checkout-row justify-content-md-center" id="checkout-step-2" style="display: none;">
            <div class="col checkout-section" style="padding-bottom: 0;">
                <h1>Vaši podaci</h1>
                <hr>
            </div>
            <div class="w-100"></div>
            <div class="alert alert-danger col-md-11" role="alert" id="error" style="display: none;">
                <h4 class="alert-heading">Greška!</h4>
                <p>Pogrešno ste uneli podatke, dešava se i najboljima.</p>
                <hr style="border-top: 1px solid #f1b0b7;">
                <p class="mb-0">Podaci moraju da ispunjavaju sledeće uslove:<br>
                    1. Sva polja moraju biti popunjena.<br>
                    2. Zip kod mora biti tačan.<br>
                    3. Broj telefona mora biti u formatu 06********
                </p>
            </div>
            <div class="w-100"></div>
            <form action="uspesnanarudzbina.php" method="POST" onsubmit="validateFormNarudzbina()" class="col">
                <div class="col checkout-section" style="padding-top: 0;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ime">Ime</label>
                            <input type="text" class="form-control" name="ime" id="ime" onblur="checkText(this)">
                            <input type="hidden" name="id" value="">
                            <input type="hidden" name="kolicina" value="">
                            <input type="hidden" name="velicina" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="prezime">Prezime</label>
                            <input type="text" class="form-control" name="prezime" id="prezime"
                                onblur="checkText(this)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="adresa">Adresa</label>
                        <input type="text" class="form-control" name="adresa" id="adresa" onblur="checkText(this)">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="grad">Grad</label>
                            <input type="text" class="form-control" name="grad" id="grad" onblur="checkText(this)">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" name="zip" id="zip" onblur="checkZip(this)">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="telefon">Telefon</label>
                            <input type="text" class="form-control" name="telefon" id="telefon"
                                onblur="checkPhone(this)">
                        </div>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col checkout-section" style="padding-top: 0; margin-top: 2%;">
                    <button class="btn btn-primary checkout-btn float-left" type="button" onclick="showStepOne()"><i
                            class="fas fa-chevron-left"></i> Prethodni korak</button>
                    <button class="btn btn-primary checkout-btn float-right" type="submit">Naruči <i
                            class="fas fa-chevron-right"></i></button>
                </div>
            </form>
        </div>
        <?php } ?>
        <?php include 'php/footer.php' ?>
    </div>
    <script type="text/javascript" src="js/checkout.js"></script>
    <script type="text/javascript" src="js/regex.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://kit.fontawesome.com/961183c6b9.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/productCardHover.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>

</html>
