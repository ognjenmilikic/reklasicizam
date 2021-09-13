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
    <title>Login - Reklasicizam</title>
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
                          </div>
                    ";
                include 'php/footer.php';
                exit();
            }
            if(isset($_POST['email']) && isset($_POST['password'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $mysqli = new mysqli("localhost", "root", "", "reklasicizam");
                if($mysqli->error)
                    die("Greska: " . $mysqli->error);
                $upit = "select * from korisnik where email = '". $email ."' and password = '". $password ."'";
                $rez = $mysqli->query($upit);
                if(($red = $rez->fetch_assoc())){
                    $_SESSION['id'] = $red['KorisnikID'];
                    $_SESSION['ime'] = $red['Ime'];
                    $_SESSION['prezime'] = $red['Prezime'];
                    $_SESSION['adresa'] = $red['Adresa'];
                    $_SESSION['grad'] = $red['Grad'];
                    $_SESSION['zip'] = $red['PostanskiBroj'];
                    $_SESSION['telefon'] = $red['Telefon'];
                    $_SESSION['email'] = $red['Email'];
                    $_SESSION['password'] = $red['Password'];
                    $_SESSION['role'] = $red['Role'];
                    if($_SESSION['role'] == 'admin'){
                        header('Location: admin.php');
                    }
                    else{
                        header('Location: profil.php');
                    }
                    exit;
                }
                else{
                    echo "<div class=\"row section-1 justify-content-md-center\">
                            <div class=\"col-md-3 pisac-section\" style=\"padding-bottom:0;\">
                                <div class=\"alert alert-danger\" role=\"alert\">
                                    <h4 class=\"alert-heading\">Greška</h4>
                                    <p>Nije pronađen korisnik sa unetim parametrima, pokušajte ponovo.</p>
                                </div>
                            </div>
                          </div>
                    ";
                }
            }
        ?>
        <div class="row section-1 justify-content-md-center">
            <div class="col-md-3 pisac-section" data-aos="fade-up">
                <form action="login.php" method="post">
                    <p class="h4 text-center">Login</p>
                    <hr>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-md card-product-btn form-control">Login</button>
                </form>
            </div>
        </div>
        <?php include 'php/footer.php' ?>
    </div>
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