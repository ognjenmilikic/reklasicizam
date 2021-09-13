function loadNarudzbine(){
    $.ajax({
        type: "GET",
        url: "php/getPoslednjuNarudzbinu.php",
        success: function(data){
            $('#poslednjaNarudzbina').html(data);
        }
    })
    $.ajax({
        type: "GET",
        url: "php/getNarudzbine.php",
        success: function(data){
            $('#poslednjeNarudzbine').html(data);
        }
    })
}
function deleteNarudzbinu(id){
    if(confirm('Da li ste sigurni da želite da obrišete ovu narudžbinu?')){
        $.ajax({
            type: "GET",
            url: "php/obrisiNarudzbinu.php",
            data: "id=" + id,
            success: function(data){
                loadNarudzbine();
        }
        })
    }
}