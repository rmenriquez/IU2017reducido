<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 07/11/2017
 * Time: 17:31
 */

//session
session_start();
//incluir funcion autenticacion
include '../Authentication.php';
//si no esta autenticado
if (!IsAuthenticated()){
    header('Location: ./index.php');
}
//esta autenticado
else{
    include '../Views/USUARIO_INDEX_View.php';
    new Index();
}

?>


