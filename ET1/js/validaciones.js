/**
 * Created by aliasme on 26/9/17.
 */

/* Función para confirmar si se desea borrar una entrada en el fomrulario delete */
function preguntar(){
    /* var eliminar almacea el boolean de la contestación de la pregunta del confirm*/
    var eliminar=confirm("¿Deseas eliminar esta entrada?");

    /* Estructura de control que pide otra confirmación de borrado en caso de eliminar=true,
    * y su redirección en caso de aceptarla*/
    if (eliminar){
    //Redireccionamos si das a aceptar
        alert("Estás seguro?");
        alert("Has decidido eliminar la entrada");
    //página web a la que te redirecciona si confirmas la eliminación
        window.location.href = "../EntregaET1.html";
    }else{
    //Mensaje que se muestra si se pulsa cancelar en cualquier caso
        alert('Decidiste no borrar nada');
    }
}

/*Función para comprobar si el campo está vacío*/
function comprobarVacio(campo)
{
    //var respuesta  Variable booleana para almacenar el valor de retorno. Devuelve true si no está vacío, false en otro caso.
    var respuesta = true;

    /* Estructura de control que comprueba si el campo es vacío, nulo y si su longitud es igual a 0.
    * En caso de que se cumplan cualquiera de esas condiciones, se muestra una alerta a modo de aviso
    * de que el campo no puede estar vacío, y se devuelve el foco al campo.*/
    if (campo.value == ""|| campo.value == null || campo.value.length == 0)
    {
        alert("El campo " + campo.name + " no puede estar vacío!");
        campo.focus();
        respuesta = false;

    }
    return respuesta;

}

/* Función que comprueba si en el campo se ha introducido un teléfono español o español con prefijo internacional (0034)*/
function comprobarTelf(campo)
{

    //var respuesta  Variable booleana para almacenar el valor de retorno. Devuelve true si sólo contiene número de teléfono, false en otro caso.
    var respuesta = true;

    // var expresion indica la expresión regular correspondiente a sólo números de teléfono
    var expresion = /(^(0034))?\d{9}$/;

    /* Comprueba si lo introducido en el campo coincide con la expresión regular de un teléfono, en caso contrario
    * salta una alerta y se devuelve el foco al campo
    */
    if (expresion.test(campo.value) == false) {
        alert("El campo " + campo.name + " sólo puede contener números españoles nacionales o internacionales!");
        campo.focus();
        respuesta = false;
    }

    return respuesta;
}


/* Función que comprueba si al entrada del input corresponde con un DNI válido (números concordantes con letra) con formato
* nnnnnnnnL, siendo n números y L letra*/
function comprobarDni(campo){

    //var respuesta Variable booleana para almacenar el valor de retorno. Devuelve true si el DNI es correcto, false en otro caso.
    var respuesta = true;

    //var numero  Variable para almacenar los número del DNI
    var numero;

    //var letr Variable para almacenar la letra introducida en el formulario
    var letr;

    //var letra  Variable para almaccenar la letra obtenida al hacer el módulo del número
    var letra;

    //var expresion indica la expresión regular correspondiente a un DNI
    var expresion = /(\d{8}[A-Z]$)/;

    //var dni  Variable para almacenar el valor del campo del formulario
    var dni = campo.value;

    /* Comprobación de si el DNI introducido es corresponde con la expresión regular. En caso falso,
    se muestra una alerta de formato no válido y se devuelve el foco al campo.
    */
    if(expresion.test(dni) == false){

        alert("Formato DNI no válido! \n Ejemplo: 97835715V");
        respuesta = false;
        campo.focus();

    }
        //Si el formato es correcto, se comprueba si la letra corresponte con el número
        if(expresion.test(dni) == true){
            numero = dni.substr(0,dni.length-1);
            letr = dni.substr(dni.length-1, 1);
            letr.toString().toUpperCase();
            numero = numero % 23;
            letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
            letra = letra.substring(numero, numero+1);
            //Se comprueba si la letra del módulo coincide con la introducida. En caso contrario, se muesta alerta y se devuelve el foco al campo
            if (letra != letr) {
                alert("DNI erroneo, la letra no corresponde!");
                respuesta = false;
                campo.focus();
            }
        }

    return respuesta;
}


/* Función que comprueba que lo introducido en el campo se corresponda con una dirección de email válida y de longitud máxima de size*/
function comprobarEmail(campo,size) {


    /* var respuesta  Variable booleana para almacenar el valor de retorno.
     * Devuelve true si el campo una dirección de email con formato y longitud válidos, false en otro caso.
     */
    var respuesta = true;

    /* Expresión regular para un email con formato válido */
    var correo = /^(([^<>()[\]\\.,;:\s@”]+(\.[^<>()[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


        /* Estructura de control que comprueba si campo cumple con la expresión regular. Si no la cumple,
        * se muestra un mensaje de alerta y se devuelve el foco al campo */
        if(correo.test(campo.value) == false) {
            alert("Introduzca un email válido!");
            respuesta = false;
            campo.focus();
        }

    /* Estructura de control que comprueba si campo cumple con la longitud máxima. Si no la cumple,
     * se muestra un mensaje de alerta y se devuelve el foco al campo */
        if(campo.value.length > size){
            alert("Email demasido largo! \nEl email no puede contener más de " + size + " caracteres.");
            respuesta = false;
            campo.focus();
        }
    return respuesta;
}


/* Función encargada de comprobar que en el texto de campo aparezcan letras y/o dígitos, además de otros
* caracteres; y de que cumpla con la condición del tamaño máximo del campo menor o igual que la de size */
function comprobarTexto(campo, size) {


    /* var respuesta  Variable booleana para almacenar el valor de retorno.
     * Devuelve true si el campo contiene letras y/o dígitos entre otros caracteres, false en otro caso.
     */
    var respuesta = true;

    /* Expresión regular para detectar letras y la posibilidad de haber dígitos */
    var expresion = /[\d*\w]/;


    /* Comprobación de si el contenido del campo cumple con la expresión regular anterior.
     * En caso de no cumplir la expresión, muestra una alerta y la variable respuesta adquiere valor false, y se devuelve el foco.
     */
    if(expresion.test(campo.value) == false){
        alert("El campo " + campo.name + " debe contener letras y/o números también!");
        respuesta = false;
        campo.focus();
    }

    /* Comprobación de si el contenido del campo cumple con la longitud máxima indicada en size.
     * En caso de no cumplir la longitud, muestra una alerta y la variable respuesta adquiere valor false
     */
    if(campo.value.length > size){
        alert("El campo " + campo.name + "es demasiado largo!\nMáximo " + size + " caracteres.");
        respuesta = false;
        campo.focus();
    }

    return respuesta;
}


/* Función encargada de comprobar que el parámetro campo cumpla que solo tenga caracteres alfabéticos y cumpla
 * con la longitud máxima dada por size */
function comprobarAlfabetico(campo, size) {

    /*var respuesta  Variable booleana para almacenar el valor de retorno.
    * Devuelve true si el campo contiene únicamente caracteres del alfabeto español, false en otro caso.
    */
    var respuesta = true;

    //Expresión regular para detectar si hay algún caracter que no sea del alfabeto español
    var expresion= /[^a-zA-ZñÑ]/;

    /* Comprobación de si el contenido del campo cumple con la expresión regular anterior.
    * En caso de cumplir la expresión, muestra una alerta y la variable respuesta adquiere valor false, y se devuelve el foco al campo.
    */
    if(expresion.test(campo.value) == true){
        alert("El campo " + campo.name + " sólo puede contener caracteres alfabéticos!");
        respuesta = false;
        campo.focus();
    }

    /* Comprobación de si el contenido del campo cumple con la longitud máxima indicada en size.
     * En caso de no cumplir la longitud, muestra una alerta y la variable respuesta adquiere valor false, y se devuelve el foco al campo.
     */
    if(campo.value.length > size){
        alert("El campo " + campo.name + "es demasiado largo!\nMáximo " + size + " caracteres.");
        respuesta = false;
        campo.focus();
    }

    return respuesta;
}


/* Función que comprueba si el contenido de campo es un número entero comprendido entre valormenor y valormayor */
function comprobarEntero(campo, valormenor, valormayor) {

    /* var respuesta  Variable booleana para almacenar el valor de retorno.
     * Devuelve true si el campo contiene únicamente número entero, false en otro caso.
     */
    var respuesta = true;

    /* Expresión regular que detecta cualquier caracter que no sea un dígito*/
    var expresion = /[^\d]/;


    /* Comprobación de que el contenido de campo cumpla con la expresión regular. En caso afirmativo,
    * en el campo hay caracteres que no corresponder unicamente a número entero, en ese caso, se muestra un mensaje
    * de alerta y se devuelve el foco al campo, y respuesta torna a false*/
    if (expresion.test(campo.value) == true) {
        alert("El campo " + campo.name + " sólo puede números enteros!");
        campo.focus();
        respuesta = false;
    }

    /* Comprobación de que el contenido de campo cumpla con el valor mínimo. Si la comprobación es true,
    * el valor es menor que el menor posible y salta una alerta, se devuelve el foco al campo y respuesta torna false.*/
    if(campo.value < valormenor){
        alert("El campo " + campo.name + " no puede ser menor que "+ valormenor + "!");
        campo.focus();
        respuesta = false;
    }

    /* Comprobación de que el contenido de campo cumpla con el valor máximo. Si la comprobación es true,
     * el valor es mayor que el mayor posible y salta una alerta, se devuelve el foco al campo y respuesta torna false.*/
    if(campo.value > valormayor){
        alert("El campo " + campo.name + " no puede ser mayor que "+ valormayor + "!");
        campo.focus();
        respuesta = false;
    }

    return respuesta;

}

/* Comprobación de que en el select del campo no se haya dejado la opción fijada por defecto. En caso de tener la opción por defecto,
*  se muestra una alerta.*/
function comprobarSelect(campo){
    if(campo.value == 0) {
        alert("Debe Seleccionar un grupo reducido");
        return false;
    }
}


/* Función que comprueba si el contenido de campo es un número real comprendido entre valormenor y valormayor y con el número de decimales dado */

function comprobarReal(campo, decimales, valormenor,valormayor) {

    /* var respuesta  Variable booleana para almacenar el valor de retorno.
     * Devuelve true si el campo contiene únicamente número real, false en otro caso.
     */
    var respuesta = true;

    /* Expresión regular que detecta un número real con el punto (.) como separador decimal
    */
    var expresion = /-?\d+(\.\d+)?$/;

    /* Comprobación de que el contenido de campo cumpla con la expresión regular. En caso negativo,
     * en el campo hay caracteres que no corresponder a un número real, en ese caso, se muestra un mensaje
     * de alerta y se devuelve el foco al campo, y respuesta torna a false*/
    if (expresion.test(campo.value) == false) {
        alert("El campo " + campo.name + " sólo puede tener números reales positivos o negativos con el . como separador decimal!");
        campo.focus();
        respuesta = false;
    }

    /* Comprobación de que el contenido de campo cumpla con la expresión regular. En caso afirmativo,
     * existe un número decimal, en ese caso, se comprueba que cumpla con el número de decimales indicado */
    if(expresion.test(campo.value) == true){
        /* var posDec variable para almacenar la posición del punto decimal */
        var posDec = campo.value.indexOf(".");
        /* var decs variable para almacenar los decimales del número introducido en campo */
        var decs = campo.value.substring(posDec);
        /* var numDecs variable para almacenar el número de decimales del número introducido en campo */
        var numDecs = decs.length-1;

        /* Comprobación de que el número de decimales del número de campo sea menor o igual. En caso contrario,
         * el número de decimales de campo es mayor que el indicado y se muestra un mensaje de alerta, se devuelve
          * el foco al campo y la respuesta torna a false. En caso contrario, se comprueba que el número introducido en campo
          * esté entre valormenor y valormayor*/
        if(numDecs > decimales){
            alert("El campo " + campo.name + " sólo puede tener números reales con máximo " + decimales + " decimales!");
            campo.focus();
            respuesta = false;
        }else{
            /* var numCampo variable que almacena el valor del campo*/
            var numCampo = parseFloat(campo.value);
            /* var valorMen variable que almacena el valor de valormenor */
            var valorMen = parseFloat(valormenor.valueOf());
            /* var valorMay variable que almacena el valor de valormenor */
            var valorMay = parseFloat(valormayor.valueOf());
            /* Comprobación de que numCampo sea mayor o igual que valorMen, en caso contrario, se muestra un mensaje de alerta,
             * se devuelve el foco al campo y respuesta torna a false */
            if(numCampo < valorMen){
                alert("El número del campo " + campo.name + " es menor que " + valormenor + " !");
                campo.focus();
                respuesta = false;
            }
            /* Comprobación de que numCampo sea menor o igual que valorMen, en caso contrario, se muestra un mensaje de alerta,
             * se devuelve el foco al campo y respuesta torna a false */
            if(numCampo > valorMay){
                alert("El número del campo " + campo.name + " es mayor que " + valormayor + " !");
                campo.focus();
                respuesta = false;
            }
        }
    }

    return respuesta;
}


/* Función que valida todos los campos de formulario antes de enviarlo */
function validarForm(formulario) {

    /* var respuesta  Variable booleana para almacenar el valor de retorno.
     * Devuelve true si todos los campos de formulario están cumplimentados correctamente,
     * false en otro caso.
     */
    var respuesta = true;

    /* Bucle para el recorrido completo de todos los campos de formulario */
    for(var i =0; i < formulario.length; i++){
        /* var input variable para almacenar el campo correspondiente en el turno del bucle */
        var input = formulario[i];
        /* Estructura que comprueba si el input es required en el html. En caso de ser requerido se comprueba si está vacío */
        if(input.required){
            /* Comprobación de si el campo está vacío. En caso de estar vacío, respuesta torna a false. */
            if(!comprobarVacio(input)){
                respuesta =false;
            }
        }

        /* Estructura de control que comprueba para cada input de cada turno el nombre que tenga, y en función del nombre
         * se procede a las comprobaciones adicionales de cada campo (Explicadas en cada una de las mismas anteriormente) */
        switch (input.name){
            case "login": if(!comprobarAlfabetico(input,25)){
                respuesta = false;
            }
                break;
            case "pass": if(!comprobarTexto(input,20)){
                respuesta = false;
            }
                break;
            case "DNI": if(comprobarDni(input)){
                respuesta = false;
            }
                break;
            case "Nombre": if(!comprobarTexto(input,30)){
                respuesta = false;
            }
                break;
            case "Apellidos": if(!comprobarTexto(input,50)){
                respuesta = false;
            }
                break;
            case "Telefono": if(!comprobarTelf(input)){
                respuesta = false;
            }
                break;
            case "Mail": if(!comprobarEmail(input, 60)){
                respuesta = false;
            }
                break;
            case "grupo": if(!comprobarSelect(input)){
                respuesta = false;
            }
                break;
            case "Curso": if(!comprobarEntero(input, 1,10)){
                respuesta = false;
            }
                break;
            case "Titulacion": if(!comprobarTexto(input, 60)){
                respuesta = false;
            }
                break;
        }

    }
    return respuesta;

}