function loadProducts(pol){
    var tipSorta = $('#sort').children("option:selected").val();
    var autor = $('#autori').children("option:selected").val();
    $.ajax({
        type: "GET",
        url: 'php/showProducts.php',
        data: "pol=" + pol + "&autor=" + autor + "&tipSorta=" + tipSorta,
        success: function(data){
            $('#products-section').hide().html(data).fadeIn();
        }
    })
    $.ajax({
        type: "GET",
        url: 'php/showProductCount.php',
        data: "pol=" + pol + "&autor=" + autor + "&tipSorta=" + tipSorta,
        success: function(data){
            $('#product-count').hide().html(data).fadeIn();
        }
    })
}
function fillAutore(pol){
    $.ajax({
        type: "GET",
        url: 'php/getAutore.php',
        data: "pol=" + pol,
        success: function(data){
            $('#autori').html(data);
        }
    })
}