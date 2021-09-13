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
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <title>Admin panel - Reklasicizam</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stil.css">
</head>

<body onload="viewData()">
<div class="container-fluid">
    <?php include 'php/header.php' ?>
    <?php
    if ((!isset($_SESSION['role'])) || ($_SESSION['role'] != "admin")) {
        echo "<div class=\"row section-1\">
                    <div class=\"col-md-12 pisac-section data-aos=\"fade-up\"\" style=\"padding:2%\">
                        <div class=\"alert alert-danger\" role=\"alert\">
                            <h4 class=\"alert-heading\">Greška</h4>
                            <p>Nemate pravo pristupa ovoj stranici.</p>
                        </div>
                    </div>
                  </div>
                 <div class=\"row section-1\">
                    <div class=\"col-md-2 pisac-section data-aos=\"fade-up\"\" style=\"padding: 2%\">
                        <button onclick=\"goBack()\" class=\"btn btn-md card-product-btn\">Nazad</button>
                    </div>
                </div>";
        echo "<script type=\"text/javascript\" src=\"js/checkout.js\"></script>";
        include 'php/footer.php';
        exit();
    }
    ?>
    <div class="row section-1">
        <div class="col-md-12 pisac-section" data-aos="fade-right">
            <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="proizvodi-tab" data-toggle="tab" href="#proizvodi" role="tab"
                       aria-controls="proizvodi" aria-selected="true">proizvodi</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="narudzbine-tab" data-toggle="tab" href="#narudzbine" role="tab"
                       aria-controls="narudzbine" aria-selected="false">narudžbine</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="podaci-tab" data-toggle="tab" href="#podaci" role="tab"
                       aria-controls="podaci" aria-selected="false">moji podaci</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="proizvodi" role="tabpanel"
                     aria-labelledby="proizvodi-tab">
                    <div class="row row-cols-1 section-2 justify-content-md-center" style="border-radius: .25rem;">
                        <div class="col pisac-section-2" style="border-radius: .25rem; padding-bottom:0;"
                             data-aos="fade-up">
                            <p class="h2 float-left">Proizvodi</p>
                            <button class="btn btn-lg card-product-btn float-right" data-toggle="modal"
                                    data-target="#insertModal"><i class="far fa-plus-square"></i> Dodaj
                            </button>
                        </div>
                        <div class="col-md-11 pisac-section-2 d-flex align-items-center" style="border-radius: .25rem;"
                             data-aos="fade-up">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Naziv proizvoda</th>
                                    <th scope="col">Cena</th>
                                    <th scope="col">Autor</th>
                                    <th scope="col">Dostupna količina</th>
                                    <th scope="col">Slika</th>
                                    <th scope="col">Zumirana slika</th>
                                    <th scope="col">Izmena</th>
                                    <th scope="col">Brisanje</th>
                                </tr>
                                </thead>
                                <tbody id="tabelaProizvoda">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="narudzbine" role="tabpanel" aria-labelledby="narudzbine-tab">
                    <div class="row section-2 row-cols-1" style="border-radius: .25rem;">
                        <div class="col pisac-section-2" style="border-radius: .25rem; padding-bottom:0;">
                            <p class="h2">Nerealizovane narudžbine registrovanih korisnika</p>
                            <hr>
                        </div>
                        <div class="col pisac-section-2 d-flex align-items-center" style="border-radius: .25rem;"
                             data-aos="fade-up">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th scope="col">ID narudžbine</th>
                                    <th scope="col">Naziv Proizvoda</th>
                                    <th scope="col">Cena</th>
                                    <th scope="col">Veličina</th>
                                    <th scope="col">Količina</th>
                                    <th scope="col">Datum i vreme narudžbine</th>
                                    <th scope="col">Ime</th>
                                    <th scope="col">Prezime</th>
                                    <th scope="col">Grad</th>
                                    <th scope="col">Zip</th>
                                    <th scope="col">Adresa</th>
                                    <th scope="col">Telefon</th>
                                </tr>
                                </thead>
                                <tbody id="tabelaNarudzbinaReg">
                                </tbody>
                            </table>
                        </div>
                        <div class="col pisac-section-2" style="border-radius: .25rem; padding-bottom:0;">
                            <p class="h2">Nerealizovane narudžbine neregistrovanih korisnika</p>
                            <hr>
                        </div>
                        <div class="col pisac-section-2 d-flex align-items-center" style="border-radius: .25rem;"
                             data-aos="fade-up">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th scope="col">ID narudžbine</th>
                                    <th scope="col">Naziv Proizvoda</th>
                                    <th scope="col">Cena</th>
                                    <th scope="col">Veličina</th>
                                    <th scope="col">Količina</th>
                                    <th scope="col">Datum i vreme narudžbine</th>
                                    <th scope="col">Ime</th>
                                    <th scope="col">Prezime</th>
                                    <th scope="col">Grad</th>
                                    <th scope="col">Zip</th>
                                    <th scope="col">Adresa</th>
                                    <th scope="col">Telefon</th>
                                </tr>
                                </thead>
                                <tbody id="tabelaNarudzbinaNeReg">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="podaci" role="tabpanel" aria-labelledby="podaci-tab">
                    <div class="row section-2 justify-content-md-center">
                        <div class="col-md-6 pisac-section-2" data-aos="fade-up">
                            <div class="alert alert-danger" role="alert" style="display:none;" id="error">
                                <h4 class="alert-heading">Greška!</h4>
                                <p>Pogrešno ste uneli podatke, dešava se i najboljima.</p>
                                <hr style="border-top: 1px solid #f1b0b7;">
                                <p class="mb-0">Podaci moraju da ispunjavaju sledeće uslove:<br>
                                    1. Sva polja moraju biti popunjena.<br>
                                    2. Password mora imati bar 8 karaktera, tu spadaju mala i velika slova i
                                    brojevi.<br>
                                    3. Password i ponovljeni password moraju da se poklapaju.<br>
                                    4. E-mail mora biti u odgovarajućem formatu (primer@gmail.com).<br>
                                    5. Zip kod mora biti tačan.<br>
                                    6. Broj telefona mora biti u formatu 06********
                                </p>
                            </div>
                            <form action="uspesnapromenapodataka.php" method="POST" onsubmit="validateForm()"
                                  class="form-section-2">
                                <div class="form-group row">
                                    <label for="ime" class="col-sm-2 col-form-label">Ime:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext edit-profile-plaintext"
                                               name="ime" id="ime" readonly value="<?php echo $_SESSION['ime'] ?>"
                                               onblur="checkText(this)">
                                    </div>
                                    <button type="button" class="btn btn-sm card-product-btn col-sm-1"
                                            onclick="editEnable('ime')"><i class="fas fa-edit"></i></button>
                                </div>
                                <div class="form-group row">
                                    <label for="prezime" class="col-sm-2 col-form-label">Prezime:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext edit-profile-plaintext"
                                               name="prezime" id="prezime" readonly
                                               value="<?php echo $_SESSION['prezime'] ?>" onblur="checkText(this)">
                                    </div>
                                    <button type="button" class="btn btn-sm card-product-btn col-sm-1"
                                            onclick="editEnable('prezime')"><i class="fas fa-edit"></i></button>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email:</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control-plaintext edit-profile-plaintext"
                                               name="email" id="email" readonly
                                               value="<?php echo $_SESSION['email'] ?>" onblur="checkEmail(this)">
                                    </div>
                                    <button type="button" class="btn btn-sm card-product-btn col-sm-1"
                                            onclick="editEnable('email')"><i class="fas fa-edit"></i></button>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Password:</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control-plaintext edit-profile-plaintext"
                                               name="password" id="password" readonly
                                               value="<?php echo $_SESSION['password'] ?>"
                                               onblur="checkPassword(this)">
                                    </div>
                                    <button type="button" class="btn btn-sm card-product-btn col-sm-1"
                                            onclick="editEnable('password')"><i class="fas fa-edit"></i></button>
                                </div>
                                <div class="form-group row" id="ponoviPasswordDiv" style="display:none">
                                    <label for="ponoviPassword" class="col-sm-2 col-form-label">Ponovi
                                        password:</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="ponoviPassword"
                                               id="ponoviPassword" value="<?php echo $_SESSION['password'] ?>"
                                               onblur="checkPonovljeniPassword(this)">
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="adresa" class="col-sm-2 col-form-label">Adresa:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext edit-profile-plaintext"
                                               name="adresa" id="adresa" readonly
                                               value="<?php echo $_SESSION['adresa'] ?>" onblur="checkText(this)">
                                    </div>
                                    <button type="button" class="btn btn-sm card-product-btn col-sm-1"
                                            onclick="editEnable('adresa')"><i class="fas fa-edit"></i></button>
                                </div>
                                <div class="form-group row">
                                    <label for="grad" class="col-sm-2 col-form-label">Grad:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext edit-profile-plaintext"
                                               name="grad" id="grad" readonly value="<?php echo $_SESSION['grad'] ?>"
                                               onblur="checkText(this)">
                                    </div>
                                    <button type="button" class="btn btn-sm card-product-btn col-sm-1"
                                            onclick="editEnable('grad')"><i class="fas fa-edit"></i></button>
                                </div>
                                <div class="form-group row">
                                    <label for="zip" class="col-sm-2 col-form-label">Zip:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext edit-profile-plaintext"
                                               name="zip" id="zip" readonly value="<?php echo $_SESSION['zip'] ?>"
                                               onblur="checkZip(this)">
                                    </div>
                                    <button type="button" class="btn btn-sm card-product-btn col-sm-1"
                                            onclick="editEnable('zip')"><i class="fas fa-edit"></i></button>
                                </div>
                                <div class="form-group row">
                                    <label for="telefon" class="col-sm-2 col-form-label">Telefon:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext edit-profile-plaintext"
                                               name="telefon" id="telefon" readonly
                                               value="<?php echo $_SESSION['telefon'] ?>" onblur="checkPhone(this)">
                                    </div>
                                    <button type="button" class="btn btn-sm card-product-btn col-sm-1"
                                            onclick="editEnable('telefon')"><i class="fas fa-edit"></i></button>
                                </div>
                                <button type="submit" class="btn btn-primary card-product-btn">Potvrdi izmenu
                                    podataka
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dodaj novi proizvod</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nazivProizvoda">Naziv proizvoda</label>
                            <input type="text" class="form-control" id="nazivProizvoda">
                        </div>
                        <div class="form-group">
                            <label for="cena">Cena</label>
                            <input type="text" class="form-control" id="cena">
                        </div>
                        <div class="form-group">
                            <label for="dostupnaKolicina">Dostupna količina</label>
                            <input type="text" class="form-control" id="dostupnaKolicina">
                        </div>
                        <div class="form-group">
                            <label for="autor">Autor</label>
                            <input type="text" class="form-control" id="autor">
                        </div>
                        <div class="form-group">
                            <label for="slika">Slika</label>
                            <input type="file" class="form-control" id="slika">
                        </div>
                        <div class="form-group">
                            <label for="zumiranaSlika">Zumirana slika</label>
                            <input type="file" class="form-control" id="zumiranaSlika">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary card-product-btn" data-dismiss="modal">Izađi
                        </button>
                        <button type="submit" class="btn btn-primary card-product-btn-2" onclick="saveChanges()">Dodaj
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Izmeni detalje o proizvodu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_nazivProizvoda">Naziv proizvoda</label>
                            <input type="text" class="form-control" id="edit_nazivProizvoda">
                            <input type="hidden" id="edit_productId">
                        </div>
                        <div class="form-group">
                            <label for="edit_cena">Cena</label>
                            <input type="text" class="form-control" id="edit_cena">
                        </div>
                        <div class="form-group">
                            <label for="edit_dostupnaKolicina">Dostupna količina</label>
                            <input type="text" class="form-control" id="edit_dostupnaKolicina">
                        </div>
                        <div class="form-group">
                            <label for="edit_autor">Autor</label>
                            <input type="text" class="form-control" id="edit_autor">
                        </div>
                        <div class="form-group">
                            <label for="edit_slika">Slika</label>
                            <input type="file" class="form-control" id="edit_slika">
                        </div>
                        <div class="form-group">
                            <label for="postojecaSlika">Postojeća slika</label>
                            <img src="" id="postojecaSlika" class="img-thumbnail" width="60" height="60">
                        </div>
                        <div class="form-group">
                            <label for="edit_zumiranaSlika">Zumirana slika</label>
                            <input type="file" class="form-control" id="edit_zumiranaSlika">
                        </div>
                        <div class="form-group">
                            <label for="postojecaZumiranaSlika">Postojeća zumirana slika</label>
                            <img src="" id="postojecaZumiranaSlika" class="img-thumbnail" width="60" height="60">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary card-product-btn" data-dismiss="modal">Izađi
                        </button>
                        <button type="submit" class="btn btn-primary card-product-btn-2" onclick="editProduct()">Potvrdi
                            izmenu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'php/footer.php' ?>
</div>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script type="text/javascript" src="js/adminpanel.js"></script>
<script type="text/javascript" src="js/regex.js"></script>
<script type="text/javascript" src="js/confirmDelete.js"></script>
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