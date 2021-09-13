function hideSectionTwo(){
    $('#checkout-step-2').hide();
}
function showStepTwo(){
    $('#checkout-step-1').hide();
    $('#checkout-step-2').fadeIn();
}
function showStepOne(){
    $('#checkout-step-2').hide();
    $('#checkout-step-1').fadeIn();
}
function submitNarudzbinu(){
    window.location.href = "uspesnanarudzbina.php";
}
function goBack(){
    window.history.back();
}
function getCartItems(){
    $.ajax({
        type: "GET",
        url: 'php/getCartItems.php',
        success: function(data){
            $('#sadrzajKorpe').hide().html(data).fadeIn();
        }
    })
}
function deleteCartItem(id){
    $.ajax({
        type: "get",
        url: 'php/deleteCartItem.php',
        data: "id=" + id,
        success: function(data){
            getCartItems();
        }
    })
}