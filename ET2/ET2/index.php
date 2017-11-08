<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 07/11/2017
 * Time: 15:34
 */

//entrada a la aplicacion

//se va usar la session de la conexion
session_start();

//funcion de autenticacion
include 'Authentication.php';

//si no ha pasado por el login de forma correcta
if (!IsAuthenticated()){
    header('Location: Controllers/LOGIN_Controller.php');
}
//si ha pasado por el login de forma correcta
else{
    header('Location: Controllers/INDEX_Controller.php');
}