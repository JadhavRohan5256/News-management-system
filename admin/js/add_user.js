function passwordEyes(){
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
function eyes(){
    let  conopen = document.getElementById('conopen');
    let conclose = document.getElementById('conclose');
    let con_pass = document.getElementById('confirmPassword');
    if(con_pass.type == 'password'){
        con_pass.type ='text';
        conopen.style.display = 'block';
        conclose.style.display= 'none';
    }else{
        con_pass.type ='password';
        conopen.style.display = 'none';
        conclose.style.display= 'block';
    }
}