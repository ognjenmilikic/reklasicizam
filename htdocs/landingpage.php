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
    <title>Hvala Vam! - Reklasicizam</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stil.css">
</head>

<body>
    <div class="container-fluid">
        <?php include 'php/header.php' ?>
        <div class="row section-1">
            <div class="col-md-12 pisac-section" data-aos="fade-up" style="padding:2%">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Uspešna narudžbina!</h4>
                    <p>Hvala na poverenju, sigurni smo da će ti nova majica stajati top! U suprotnom uvek možeš da zameniš ;)</p><br>
                    <?php
                        if(isset($_SESSION['id'])){
                            $role = $_SESSION['role'];
                            if($role == 'admin'){
                                echo "<p>Da pogledaš detalje narudžbine, idi na <a href=\"admin.php\">svoj profil</a></p>";
                            }
                            else{
                                echo "<p>Da pogledaš detalje narudžbine, idi na <a href=\"profil.php\">svoj profil</a></p>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php include 'php/socialsection.php' ?>
        <?php include 'php/footer.php' ?>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://kit.fontawesome.com/961183c6b9.js" crossorigin="anonymous"></script>
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