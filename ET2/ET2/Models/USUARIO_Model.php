<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 06/11/2017
 * Time: 11:06
 */

class USUARIO_Model
{
    var $login; //declaración atributo login
    var $password; //declaración atributo password
    var $DNI; //declaración atributo DNI
    var $bd; // declaración atributo que contendra el manejador de la bd
    var $nombre;  //declaración atributo nombre
    var $apellidos; //declaración atributo apellidos
    var $telefono; //declaración atributo teléfono
    var $email; //declaración atributo email
    var $FechaNacimiento; //declaración atributo fecha de nacimiento
    var $fotopersonal; //declaración atributo fotopersonal
    var $sexo; //declaración atributo sexo

    // constructor de la clase
    // se inicializa con los valores de los atributos de la tabla
    function __construct($login, $password, $DNI, $nombre, $apellidos, $telefono, $email, $FechaNacimiento, $fotopersonal, $sexo){
        $this->login = $login; //asignamos al atributo login el valor del parametro login
        $this->password = $password; // asignamos al atributo password el valor del parametro password
        $this->DNI = $DNI; // asignamos al atributo DNI el valor del parametro DNI
        $this->nombre = $nombre; // asignamos al atributo nombre el valor del parametro nombre
        $this->apellidos = $apellidos; // asignamos al atributo apellidos el valor del parametro apellidos
        $this->telefono = $telefono; // asignamos al atributo telefono el valor del parametro telefono
        $this->email = $email; // asignamos al atributo email el valor del parametro email
        $this->FechaNacimiento = date_format(date_create($FechaNacimiento), 'd-m-Y'); // asignamos al atributo FechaNacimiento el valor del parametro FechaNacimiento
        include_once '../Access_BD.php'; // incluimos la función de acceso a la bd
        $this->bd = ConectarBD();  //almacenamos la conexión con la bd
    }


    /** Inserta en la tabla de dela bd los valores de los atributos del objeto. Tambien comprueba si el login (clave) está vacío y si ya existe en la tabla **/
    function add(){
        if (($this->login <> '')){ // si el atributo clave de la entidad no esta vacio

            // construimos el sql para buscar esa clave en la tabla
            $sql = "SELECT * FROM USUARIOS WHERE (login = '$this->login')";

            if (!$result = $this->mysqli->query($sql)){ // si da error la ejecución de la query
                return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd). Devolvemos un mensaje que el controlador manejara
            }
            else { // si la ejecución de la query no da error
                if ($result->num_rows == 0){ // miramos si el resultado de la consulta es vacio (no existe el login)
                    //construimos la sentencia sql de inserción en la bd
                    $sql = "INSERT INTO USUARIO (
					login,
					password,
					DNI,
					nombre,
					apellidos,
					telefono,
					email,
					FechaNacimiento,
					fotopersonal,
					sexo) 
						VALUES (
					'$this->login',
						'$this->password',
						'$this->DNI',
						'$this->nombre',
						'$this->apellidos',
						'$this->telefono',
						'$this->email',
						'$this->FechaNacimiento',
						'$this->fotopersonal',
						'$this->sexo')
						";

                    if (!$this->mysqli->query($sql)) { // si da error en la ejecución del insert devolvemos mensaje
                        return 'Error en la inserción';
                    }
                    else{ //si no da error en la insercion devolvemos mensaje de exito
                        return 'Inserción realizada con éxito'; //operacion de insertado correcta
                    }

                }
                else // si ya existe ese valor de clave en la tabla devolvemos el mensaje correspondiente
                    return 'Ya existe ese login en la base de datos'; // ya existe
            }
        }
        else{ // si el atributo clave de la bd es vacio solicitamos un valor en un mensaje
            return 'Introduzca un valor'; // introduzca un valor para el usuario
        }
    }

    function search(){ 	// construimos la sentencia de busqueda con LIKE y los atributos de la entidad
        $sql = "select login,
					password,
					DNI,
					nombre,
					apellidos,
					telefono,
					email,
					FechaNacimiento,
					fotopersonal,
					sexo
       			from USUARIO 
    			where 
    				(
    				(login LIKE '%$this->login%') &&
	 				(password LIKE '%$this->password%') &&
	 				(DNI LIKE '%$this->DNI%') &&
	 				(nombre LIKE '%$this->nombre%') &&
	 				(apellidos LIKE '%$this->apellidos%') &&
	 				(telefono LIKE '%$this->telefono%') &&
	 				(email LIKE '%$this->email%') &&
	 				(FechaNacimiento LIKE '%$this->FechaNacimiento%') &&
	 				(fotopersonal LIKE '%$this->fotopersonal%') &&
	 				(sexo LIKE '%$this->sexo%') 
    				)";
        // si se produce un error en la busqueda mandamos el mensaje de error en la consulta
        if (!($resultado = $this->mysqli->query($sql))){
            return 'Error en la consulta sobre la base de datos';
        }
        else{ // si la busqueda es correcta devolvemos el recordset resultado
            return $resultado;
        }
    } // fin metodo SEARCH

    /** Comprueba que existe el login que se va a borrar, si existe se borra, sino, se manda un aviso de que no existe ese login **/
    function delete(){	// se construye la sentencia sql de busqueda con los atributos de la clase
        $sql = "SELECT * FROM USUARIO WHERE (login = '$this->login')";
        // se ejecuta la query
        $result = $this->mysqli->query($sql);
        // si existe una tupla con ese valor de clave
        if ($result->num_rows == 1)
        {
            // se construye la sentencia sql de borrado
            $sql = "DELETE FROM USUARIO WHERE (login = '$this->login')";
            // se ejecuta la query
            $this->mysqli->query($sql);
            // se devuelve el mensaje de borrado correcto
            return "Borrado correctamente";
        } // si no existe el login a borrar se devuelve el mensaje de que no existe
        else
            return "No existe ese login";
    } // fin metodo DELETE


    function edit(){
        // se construye la sentencia de busqueda de la tupla en la bd
        $sql = "SELECT * FROM USUARIO WHERE (login = '$this->login')";
        // se ejecuta la query
        $result = $this->mysqli->query($sql);
        // si el numero de filas es igual a uno es que lo encuentra
        if ($result->num_rows == 1)
        {	// se construye la sentencia de modificacion en base a los atributos de la clase
            $sql = "UPDATE USUARIO SET 
					login = '$this->login',
					password = '$this->password',
					DNI = '$this->DNI',
					nombre= '$this->nombre'
					apellidos= '$this->apellidos',
					telefono= '$this->telefono',
					email= '$this->email',
					FechaNacimiento = '$this->FechaNacimiento',
					fotopersonal = '$this->fotopersonal',
					sexo= '$this->sexo'
				WHERE ( login = '$this->login'
				)";
            // si hay un problema con la query se envia un mensaje de error en la modificacion
            if (!($resultado = $this->mysqli->query($sql))){
                return 'Error en la modificación';
            }
            else{ // si no hay problemas con la modificación se indica que se ha modificado
                return 'Modificado correctamente';
            }
        }
        else // si no se encuentra la tupla se manda el mensaje de que no existe la tupla
            return 'No existe el login en la base de datos';
    } // fin del metodo EDIT


    /** Esta función obtiene todos los atributos del usuario **/
    function getDatos(){
        $sql = "SELECT * FROM USUARIO WHERE (login = '$this->login')";
        // Si la busqueda no da resultados, se devuelve el mensaje de que no existe
        if (!($resultado = $this->mysqli->query($sql))){
            return 'No existe en la base de datos'; //
        }
        else{ // si existe se devuelve la tupla resultado
            $result = $resultado->fetch_array();
            return $result;
        }
    }


    // funcion buscartuplaporlogin()
    // utiliza el atributo login de la clase para realizar una busqueda en la tabla
    // devuelve false sino existe ese login
    // devuelve la tupla correspondiente a ese login
    function buscartuplaporlogin(){

        $sql = "select * from datos where login = '".$this->login."'"; //construimos la sentencia sql
        $resultado = $this->bd->query($sql); //ejecutamos la sql contra la bd y almacenamos el recordset resultado
        if ($resultado->num_rows > 0){ // si el recordset no esta vacio
            $result = $resultado->fetch_array(); // recuperamos la tupla del recordset y la almacenamos en $result
            return $result; // la función devuelve la tupla
        }
        else {  // si el recorset esta vacio
            return false; // devuelve false
        }
    } //fin metodo buscar tupla

}