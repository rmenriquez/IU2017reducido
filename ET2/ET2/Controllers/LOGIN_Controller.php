<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 07/11/2017
 * Time: 17:41
 */

session_start();
if(!isset($_REQUEST['login']) && !(isset($_REQUEST['password']))){
    include '../Views/LOGIN_View.php';
    $login = new Login();
}
else{

    include '../Access_BD.php';
    include '../Models/USUARIO_Model.php';
    $usuario = new USUARIO_Model($_REQUEST['login'],$_REQUEST['password'],'','','','','','','','');
    $respuesta = $usuario->login();

    if ($respuesta == 'true'){
        session_start();
        $_SESSION['login'] = $_REQUEST['login'];
        header('Location:./index.php');
    }
    else{
        include '../Views/MESSAGE_View.php';
        new MESSAGE($respuesta, './LOGIN_Controller.php');
    }

}

?>