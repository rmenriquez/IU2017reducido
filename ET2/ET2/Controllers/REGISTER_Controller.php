<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 08/11/2017
 * Time: 15:05
 */


session_start();
include_once '../Locales/Strings_'.$_SESSION['idioma'].'.php';

//session_start();
if(!isset($_POST['login'])){
    include '../Views/REGISTER_View.php';
    $register = new Register();
}
else{

    include '../Models/USUARIO_Model.php';
    $usuario = new USUARIO_Model($_REQUEST['login'],$_REQUEST['password'], $_REQUEST['DNI'],$_REQUEST['nombre'],
        $_REQUEST['apellidos'],$_REQUEST['telefono'],$_REQUEST['email'],$_REQUEST['FechaNacimiento'], $_REQUEST['fotopersonal'],$_REQUEST['sexo']);
    $respuesta = $usuario->Register();

    if ($respuesta == 'true'){
        $respuesta = $usuario->registrar();
        Include './MESSAGE_View.php';
        new MESSAGE($respuesta, './LOGIN_Controller.php');
    }
    else{
        include './MESSAGE_View.php';
        new MESSAGE($respuesta, './LOGIN_Controller.php');
    }

}

?>

