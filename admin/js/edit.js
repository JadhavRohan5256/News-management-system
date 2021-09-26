$(document).ready(function(){
$('#form').html(function(){
 $('#form1').hide();
});
});
// password eyes function

function passwordEyes(){
let open = document.getElementById('open1');
let close = document.getElementById('close1');
let password = document.getElementById('password1');
if(password.type == 'password'){
password.type ='text';
open.style.display = 'block';
close.style.display= 'none';
}else{
password.type ='password';
open.style.display = 'none';
close.style.display= 'block';
}
}
function password(){
let open = document.getElementById('open');
let close = document.getElementById('close');
let password = document.getElementById('password');
if(password.type == 'password'){
password.type ='text';
open.style.display = 'block';
close.style.display= 'none';
}else{
password.type ='password';
open.style.display = 'none';
close.style.display= 'block';
}
}
