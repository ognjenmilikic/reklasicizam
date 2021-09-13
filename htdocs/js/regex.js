function checkText(element){
    if(element.value == ""){
        element.style.border = "1px solid #FF7276";
    }
    else
        element.style.border = "1px solid #90ee90";
}
function checkEmail(element){
    var pattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/
    var email = element.value;
    if(email.match(pattern)){
        element.style.border = "1px solid #90ee90";
    }
    else
        element.style.border = "1px solid #FF7276";
}
function checkZip(element){
    var pattern = /^\d{5}$/
    var zip = element.value;
    if(zip.match(pattern)){
        element.style.border = "1px solid #90ee90";
    }
    else
        element.style.border = "1px solid #FF7276";
}
function checkPassword(element){
    var pattern = /^[a-zA-Z-0-9]{8,}$/
    var pass = element.value;
    if(pass.match(pattern)){
        element.style.border = "1px solid #90ee90";
    }
    else
        element.style.border = "1px solid #FF7276";
}
function checkPonovljeniPassword(element){
    var pass = document.getElementById('password').value
    if(element.value == pass){
        element.style.border = "1px solid #90ee90";
    }
    else
        element.style.border = "1px solid #FF7276";
}
function checkPhone(element){
    var pattern = /^06\d{7,8}$/
    var phone = element.value;
    if(phone.match(pattern)){
        element.style.border = "1px solid #90ee90";
    }
    else
        element.style.border = "1px solid #FF7276";
}
function validateForm(){
    var mailPattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    var email = document.getElementById('email').value;
    var zipPattern = /^\d{5}$/;
    var zip = document.getElementById('zip').value;
    var passPattern = /^[a-zA-Z-0-9]{8,}$/;
    var pass = document.getElementById('password').value;
    var phonePattern = /^06\d{7,8}$/;
    var phone = document.getElementById('telefon').value;
    var ime = document.getElementById('ime').value;
    var prezime = document.getElementById('prezime').value;
    var grad = document.getElementById('grad').value;
    var adresa = document.getElementById('adresa').value;
    var ponovljeniPass = document.getElementById('ponoviPassword').value;

    if(!(email.match(mailPattern)) || !(zip.match(zipPattern)) || !(pass.match(passPattern)) || !(phone.match(phonePattern)) || ime == "" || prezime == "" || grad == "" || adresa == "" || ponovljeniPass!=pass){
        event.preventDefault();
        $('#error').fadeIn();
    }
}
function validateFormNarudzbina(){
    var zipPattern = /^\d{5}$/;
    var zip = document.getElementById('zip').value;
    var phonePattern = /^06\d{7,8}$/;
    var phone = document.getElementById('telefon').value;
    var ime = document.getElementById('ime').value;
    var prezime = document.getElementById('prezime').value;
    var grad = document.getElementById('grad').value;
    var adresa = document.getElementById('adresa').value;
    if(!(zip.match(zipPattern)) || !(phone.match(phonePattern)) || ime == "" || prezime == "" || grad == "" || adresa == ""){
        event.preventDefault();
        $('#error').fadeIn();
    }
}
function editEnable(id){
    element = document.getElementById(id);
    if(element.readOnly){
        element.removeAttribute('readonly');
        element.classList.remove('form-control-plaintext');
        element.classList.remove('edit-profile-plaintext');
        element.classList.add('form-control');
        if(id == 'password'){
            $('#ponoviPasswordDiv').fadeIn();
    }
    }
    else{
        element.setAttribute('readonly', 'true');
        element.classList.remove('form-control');
        element.classList.add('form-control-plaintext');
        element.classList.add('edit-profile-plaintext');
        if(id == 'password'){
            $('#ponoviPasswordDiv').hide();
    }
    
}
}