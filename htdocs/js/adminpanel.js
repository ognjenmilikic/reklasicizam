function viewData(){
    $.ajax({
        type: "GET",
        url: "php/puniTabeluProizvodima.php",
        success: function(data){
            $('#tabelaProizvoda').hide().html(data).fadeIn();
        }
    })
    $.ajax({
        type: "GET",
        url: "php/puniTabeluNarudzbina.php?reg=1",
        success: function(data){
            $('#tabelaNarudzbinaReg').hide().html(data).fadeIn();
        }
    })
    $.ajax({
        type: "GET",
        url: "php/puniTabeluNarudzbina.php?reg=0",
        success: function(data){
            $('#tabelaNarudzbinaNeReg').hide().html(data).fadeIn();
        }
    })
}
function realizujNarudzbinu(id, reg){
    if (confirm("Da li ste sigurni da želite da označite kao realizovanu narudžbinu broj " + id)) {
        $.ajax({
            type: "GET",
            url: "php/realizujNarudzbinu.php?id=" + id + "&reg=" + reg,
            success: function(response){
                viewData();
            }
        })
      }
}
function obrisiProizvod(id){
    if(confirm("Da li ste sigurni da želite da obrišete proizvod sa šifrom " + id)){
        $.ajax({
            type: "GET",
            url: "php/obrisiProizvod.php?id=" + id,
            success: function(data){
                viewData();
            }
        })
    }
}
function saveChanges(){
    var nazivProizvoda = document.getElementById('nazivProizvoda').value;
    var cena = document.getElementById('cena').value;
    var dostupnaKolicina = document.getElementById('dostupnaKolicina').value;
    var autor = document.getElementById('autor').value;
    var slika = $('#slika').prop('files')[0];
    var zumiranaSlika = $('#zumiranaSlika').prop('files')[0];
    var form_data = new FormData();
    form_data.append('slika', slika);
    form_data.append('zumiranaSlika', zumiranaSlika);
    form_data.append('nazivProizvoda', nazivProizvoda);
    form_data.append('cena', cena);
    form_data.append('dostupnaKolicina', dostupnaKolicina);
    form_data.append('autor', autor);
    $.ajax({
        url: "php/unosNovogProizvoda.php",
        cache: false,
        contentType: false,
        processData: false,
        type: "POST",
        data: form_data,
        success: function(data){
            viewData();
        }
    })
}
function getProductDetails(id){
    $.ajax({
        type: "POST",
        url: "php/getProductDetails.php",
        data: "id=" + id,
        success: function(data){
            var user = JSON.parse(data);
            $('#edit_productId').val(id);
            $('#edit_nazivProizvoda').val(user.NazivProizvoda);
            $('#edit_cena').val(user.Cena);
            $('#edit_dostupnaKolicina').val(user.DostupnaKolicina);
            $('#edit_autor').val(user.Autor);
            $('#postojecaSlika').attr({"src": user.PutanjaDoSlike});
            $('#postojecaZumiranaSlika').attr({"src": user.PutanjaDoZumiraneSlike});
        }
    })
}
function editProduct(){
    var id = $('#edit_productId').val();
    var nazivProizvoda = $('#edit_nazivProizvoda').val();
    var cena = $('#edit_cena').val();
    var dostupnaKolicina = $('#edit_dostupnaKolicina').val();
    var autor = $('#edit_autor').val();
    var putanjaDoSlike = $('#postojecaSlika').attr('src');
    var putanjaDoZumiraneSlike = $('#postojecaZumiranaSlika').attr('src');
    var novaSlika = $('#edit_slika').prop('files')[0];
    var novaZumiranaSlika = $('#edit_zumiranaSlika').prop('files')[0];
    var form_data = new FormData();
    form_data.append('id', id);
    form_data.append('novaSlika', novaSlika);
    form_data.append('novaZumiranaSlika', novaZumiranaSlika);
    form_data.append('putanjaDoSlike', putanjaDoSlike);
    form_data.append('putanjaDoZumiraneSlike', putanjaDoZumiraneSlike);
    form_data.append('nazivProizvoda', nazivProizvoda);
    form_data.append('cena', cena);
    form_data.append('dostupnaKolicina', dostupnaKolicina);
    form_data.append('autor', autor);
    $.ajax({
        url: "php/editProduct.php",
        cache: false,
        contentType: false,
        processData: false,
        type: "POST",
        data: form_data,
        success: function(data){
            viewData();
        }
    })
}


