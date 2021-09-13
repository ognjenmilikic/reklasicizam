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
    <title>Registracija - Reklasicizam</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="css/stil.css">
  </head>
  <body>
    <div class="container-fluid">
        <?php include 'php/header.php' ?>
        <?php
            if(isset($_SESSION['id'])){
                echo "<div class=\"row section-1\">
                            <div class=\"col-md-12 pisac-section\" style=\"padding-bottom:0;\">
                                <div class=\"alert alert-danger\" role=\"alert\">
                                    <h4 class=\"alert-heading\">Greška</h4>
                                    <p>Već ste ulogovani.</p>
                                </div>
                            </div>
                            <div class='pisac-section col-md-12'>
                                <button class='btn card-product-btn' onclick='goBack()'>Idi nazad</button>
                            </div>
                          </div>
                          <script type='text/javascript' src='js/checkout.js'></script>
                    ";
                include 'php/footer.php';

                exit();
            }
        ?>
        <div class="row section-1">
            <div class="col-md-12 pisac-section" style="padding-bottom: 0;">
                <p class="h1">Registracija</p>
                <hr>
            </div>
        </div>
        <div class="row section-1 justify-content-md-center">
            <div class="col-md-10 pisac-section" data-aos="fade-up">
                <div class="alert alert-danger" role="alert" style="display:none;" id="error">
                    <h4 class="alert-heading">Greška!</h4>
                    <p>Pogrešno ste uneli podatke, dešava se i najboljima.</p>
                    <hr style="border-top: 1px solid #f1b0b7;">
                    <p class="mb-0">Podaci moraju da ispunjavaju sledeće uslove:<br>
                        1. Sva polja moraju biti popunjena.<br>
                        2. Password mora imati bar 8 karaktera, tu spadaju mala i velika slova i brojevi.<br>
                        3. Password i ponovljeni password moraju da se poklapaju.<br>
                        4. E-mail mora biti u odgovarajućem formatu (primer@gmail.com).<br>
                        5. Zip kod mora biti tačan.<br>
                        6. Broj telefona mora biti u formatu 06********
                    </p>
                </div>
            <form action="uspesnaregistracija.php" method="POST" onsubmit="validateForm()">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="ime">Ime</label>
                        <input type="text" class="form-control" name="ime" id="ime" onblur="checkText(this)">
                        <span></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prezime">Prezime</label>
                        <input type="text" class="form-control" name="prezime" id="prezime" onblur="checkText(this)">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" onblur="checkEmail(this)">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" onblur="checkPassword(this)">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ponoviPassword">Ponovi password</label>
                        <input type="password" class="form-control" id="ponoviPassword" onblur="checkPonovljeniPassword(this)">
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
                        <input type="text" class="form-control" name="telefon" id="telefon" onblur="checkPhone(this)">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary card-product-btn">Registruj se</button>
            </form>
            </div>
        </div>
        <?php include 'php/footer.php' ?>
    </div>
    <script type="text/javascript" src="js/regex.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
  		AOS.init();
	</script>
	<script src="https://kit.fontawesome.com/961183c6b9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  </body>
</html>