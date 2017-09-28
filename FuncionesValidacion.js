/**
 * Created by RaquelMarcos on 26/9/17.
 */

/*Función para comprobar si el campo es vacío*/
function comprobarVacio(campo){
    //var respuesta  Variable booleana para almacenar el valor de retorno. Devuelve true si está vacío, false en otro caso.
    var respuesta = true;

    //Comprobación de si el campo está vacío, nulo o no tiene caracteres
    if(campo.value == "" || campo.value == null || campo.value.length == 0){
        alert("El campo " + campo.name + " no puede estar vacío!");
    }
    respuesta = false;

    return respuesta;
}

function comprobarTelf(campo, tam)
{
    //var respuesta  Variable booleana para almacenar el valor de retorno. Devuelve true si sólo contiene números, false en otro caso.
    var respuesta = true;

    // var expresion indica la expresión regular correspondiente a sólo números
    var expresion = /(^(0034))?\d{9}$/;

    //Comprueba si lo introducido en el campo coincide con la expresión regular de un teléfono
    if (expresion.test(campo.value) == false) {
        alert("El campo " + campo.name + " sólo puede contener números!");
        respuesta = false;
    }
    //Comprueba si lo introducido en el campo supera la longitud permitida
    if(campo.value.length > tam){
        alert("El campo " + campo.name + " no puede tener más de " + tam + "dígitos!");
        respuesta = false;
    }

    return respuesta;
}

function comprobarDni(carnet){
    //var respuesta Variable booleana para almacenar el valor de retorno. Devuelve true si el DNI es correcto, false en otro caso.
    var respuesta = true;

    //var numero  Variable para almacenar los número del DNI
    var numero;

    //var letr Variable para almacenar la letra introducida en el formulario
    var letr;

    //var letra  Variable para almaccenar la letra obtenida al hacer el módulo del número
    var letra;

    //var expresion indica la expresión regular correspondiente a un DNI
    var expresion = /^\d{8}[A-Z]$/;

    //var dni  Variable para almacenar el valor del campo del formulario
    var dni = carnet.value;

    //Comprobación de si el DNI/NIF introducido es corresponde con la expresión regular
    if(!expresion.test(dni)){
        alert("Formato DNI no válido! \nCompruebe que la letra del DNI esté en mayúscula");
        respuesta = false;
    }else{
        //Si el formato es correcto, se comprueba si la letra corresponte con el número
        if(expresion.test(dni) == true){
            numero = dni.substr(0,dni.length-1);
            letr = dni.substr(dni.length-1, 1);
            numero = numero % 23;
            letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
            letra = letra.substring(numero, numero+1);
            //Se comprueba si la letra del módulo coincide con la introducida
            if (letra != letr) {
                alert("DNI erroneo, la letra no corresponde!");
                respuesta = false;
            }
        }
    }

    return respuesta;
}


function validarEmail(mail,tam) {
    var respuesta = true;
    var correo = /^(([^<>()[\]\\.,;:\s@”]+(\.[^<>()[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (correo.test(mail.value) == false || mail.value.length > tam){
        if(correo.test(mail.value) == false) {
            alert("Introduzca un email válido!");
            respuesta = false;
        }else{
            alert("Email demasido largo! \nEl email no puede contener más de " + tam + " caracteres.");
            respuesta = false;
        }
    }
    return respuesta;
}

function comprobarTexto(campo, tam) {

    var respuesta = true;

    var expresion = /[\d\@\%\$\#]+/;

    if(expresion.test(campo.value) == true){
        alert("El campo " + campo.name + " no puede contener números ni los siguientes caracteres:\n @ # $ % # ");
        respuesta = false;
    }

    if(campo.value.length > tam){
        alert("El campo " + tam + "es demasiado largo!\nMáximo " + tam + " caracteres.");
        respuesta = false;
    }
    return respuesta;
}