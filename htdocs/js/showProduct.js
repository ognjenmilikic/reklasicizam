function showProduct(id){
    $('#rezultatDodavanjaUKorpu').hide();
    $.ajax({
        type: "post",
        url: 'php/getProductDetails.php',
        data: 'id=' + id,
        success: function(data){
            var user = JSON.parse(data);
            $('#id').val(user.ProizvodID);
            $('#nazivProizvoda').html(user.NazivProizvoda);
            $('#cena').html(user.Cena);
            $('#kolicina').attr("max", user.DostupnaKolicina);
            $('#slika').attr({"src": user.PutanjaDoSlike});
        }
    })
}
function addToCart(){
    let id = $('#id').val();
    let velicina = $('#velicina').val();
    let kolicina = $('#kolicina').val();
    $.ajax({
        type: "POST",
        url: 'php/addToCart.php',
        data: "id=" + id + "&velicina=" + velicina + "&kolicina=" + kolicina,
        success: function(data){
            $('#rezultatDodavanjaUKorpu').html(data).fadeIn();
        }
    })
}