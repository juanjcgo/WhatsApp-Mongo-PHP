function validar(){
    if(!validar_celular() || !validar_contras()){
        return  validar_celular(), validar_contras();
    }
    return true;
}


function validar_celular(){
    var celular = document.formulario.celular.value;
    var error = document.getElementById('error_celular');
    var validar = /^[0-9]{1,10}/

    if(celular === ""){
        error.textContent = 'Ingrese el numero de celular';
        return false;
    }
    if(celular.length < 6){
        error.textContent = 'El numero de celular minimo es de 6 caracteres';
        return false;
    }
    if(!validar.test(celular)){
        error.textContent = 'El usuario solo puede contener numeros y letras';
        return false;
    }
}

function validar_contras(){
    var contras = document.formulario.contras.value;
    var error = document.getElementById('error_password');
    var validar = /^[0-9]{1,12}/

    if(contras === ""){
        error.textContent = 'Ingrese la contraseña';
        return false;
    }
    if(contras.length < 6){
        error.textContent = 'La contraseña minimo debe ser de 6 caracteres';
        return false;
    }
    if(!validar.test(contras)){
        error.textContent = 'La contraseña debe contener solo numeros';
        return false;
    }
}
