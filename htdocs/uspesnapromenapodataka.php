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
    <title>Uspešna promena podataka - Reklasicizam</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="css/stil.css">
  </head>
  <body>
      <div class="container-fluid">
        <?php include 'php/header.php' ?>
    <?php
        if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
            $urlprofila = 'admin.php';
        }
        else{
            $urlprofila = 'profil.php';
        }
        if(!(isset($_POST['ime']))){
            echo "<div class=\"row section-1\">
            <div class=\"col-md-12 pisac-section\" style=\"padding:2%\">
                <div class=\"alert alert-danger\" role=\"alert\">
                    <h4 class=\"alert-heading\">Greška</h4>
                    <p>Nažalost došlo je do greške prilikom rada sa bazom podataka, pokušajte ponovo.</p>
                </div>
            </div>
        </div>
        <div class=\"row section-1\">
            <div class=\"col-md-2 pisac-section\" style=\"padding: 2%\">
                <a href=\"" . $urlprofila . "\" class=\"btn btn-md card-product-btn\">Vrati se na profil</a>
            </div>
        </div>";
        include 'php/footer.php';
            exit();
        }
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $adresa = $_POST['adresa'];
        $grad = $_POST['grad'];
        $zip = $_POST['zip'];
        $telefon = $_POST['telefon'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $mysqli = new mysqli("localhost", "root", "", "reklasicizam");
        if($mysqli->error){
            die("Greska: " . $mysqli->error);
        }
        $upit = "update korisnik set ime ='" . $ime . "', prezime='" . $prezime . "', adresa='" . $adresa . "', grad='" . $grad . "', postanskibroj='" . $zip . "', telefon='" . $telefon . "', email='" . $email . "',password='" . $password . "' where korisnikid =" . $_SESSION['id'];
        if($mysqli->query($upit) == TRUE){
            echo "<div class=\"row section-1\">
            <div class=\"col-md-12 pisac-section\" data-aos=\"fade-up\" style=\"padding:2%\">
                <div class=\"alert alert-success\" role=\"alert\">
                    <h4 class=\"alert-heading\">Uspešna promena podataka!</h4>
                </div>
            </div>
        </div>
        <div class=\"row section-1 data-aos=\"fade-up\"\">
            <div class=\"col-md-2 pisac-section\" style=\"padding: 2%\">
                <a href=\"" . $urlprofila . "\" class=\"btn btn-md card-product-btn\">Vrati se na profil</a>
            </div>
        </div>";
        $_SESSION['ime'] = $_POST['ime'];
        $_SESSION['prezime'] = $_POST['prezime'];
        $_SESSION['grad'] = $_POST['grad'];
        $_SESSION['adresa'] = $_POST['adresa'];
        $_SESSION['zip'] = $_POST['zip'];
        $_SESSION['telefon'] = $_POST['telefon'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        }
        else{
            echo "<div class=\"row section-1\">
                    <div class=\"col-md-12 pisac-section data-aos=\"fade-up\"\" style=\"padding:2%\">
                        <div class=\"alert alert-danger\" role=\"alert\">
                            <h4 class=\"alert-heading\">Greška</h4>
                            <p>Nažalost došlo je do greške prilikom rada sa bazom podataka, pokušajte ponovo.</p>
                        </div>
                    </div>
                  </div>
            <div class=\"row section-1\">
            <div class=\"col-md-2 pisac-section data-aos=\"fade-up\"\" style=\"padding: 2%\">
                <a href=\"" . $urlprofila . "\" class=\"btn btn-md card-product-btn\">Vrati se na profil</a>
            </div>
        </div>";
        }
    ?>
        <?php include 'php/footer.php' ?>
    </div>
    <script type="text/javascript" src="js/redirectToProfile.js"></script>
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