<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 06/11/2017
 * Time: 11:03
 */

//session_start(); //solicito trabajar con la session
include '../Functions/Authentication.php';

if (!IsAuthenticated()){
    header('Location:../index.php');
}

include '../Model/USUARIO_Model.php';
include '../View/USUARIO_SHOWALL_View.php';
include '../View/USUARIO_SEARCH_View.php';
include '../View/USUARIO_ADD_View.php';
include '../View/USUARIO_EDIT_View.php';
include '../View/USUARIO_DELETE_View.php';
include '../View/USUARIO_SHOWCURRENT_View.php';
include '../View/MESSAGE_View.php';
//include '../View/Register_View.php';


function get_data_form(){

    $login = $_REQUEST['login'];
    $password = $_REQUEST['password'];
    $DNI = $_REQUEST['DNI'];
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $telefono = $_REQUEST['telefono'];
    $email = $_REQUEST['email'];
    $FechaNacimiento = $_REQUEST['FechaNacimiento'];
    $fotopersonal = $_REQUEST['fotopersonal'];
    $sexo = $_REQUEST['sexo'];

    $USUARIO = new USUARIO_Model(
        $login,
        $password,
        $DNI,
        $nombre,
        $apellidos,
        $telefono,
        $email,
        $FechaNacimiento,
        $fotopersonal,
        $sexo);

    return $USUARIO;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}


Switch ($_REQUEST['action']){
    case 'ADD':
        if (!$_POST){
            new USUARIO_ADD();
        }
        else{
            $USUARIO = get_data_form();
            $respuesta = $USUARIO->ADD();
            new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');
        }
        break;
    case 'DELETE':
        if (!$_POST){
            $USUARIO = new USUARIO_Model($_REQUEST['login'], '', '', '', '', '', '', '', '');
            $valores = $USUARIO->RellenaDatos();
            new USUARIO_DELETE($valores);
        }
        else{
            $USUARIO = get_data_form();
            $respuesta = $USUARIO->DELETE();
            new MESSAGE($respuesta, '../Controller/USUARIO_Controller.php');
        }
        break;
    case 'EDIT':
        //echo 'entro en edit'; echo $_REQUEST['password']; echo '--';
        if (!$_POST){

            $USUARIO = new USUARIO_Model($_REQUEST['login'], '', '', '', '', '', '', '', '');
            $valores = $USUARIO->RellenaDatos();
            new USUARIO_EDIT($valores);
        }
        else{

            $USUARIO = get_data_form();

            $respuesta = $USUARIO->EDIT();
            new MESSAGE($respuesta, '../Controller/USUARIO_Controller.php');
        }

        break;
    case 'SEARCH':
        if (!$_POST){
            new USUARIO_SEARCH();
        }
        else{
            $USUARIO = get_data_form();
            $datos = $USUARIO->SEARCH();
            $lista = array('login','password','fechnacuser','grupopracticasuser','emailuser','nombreuser','apellidosuser','cursoacademicouser','titulacionuser');
            new USUARIO_SHOWALL($lista, $datos, '../index.php');
        }
        break;
    case 'SHOWCURRENT':
        $USUARIO = new USUARIO_Model($_REQUEST['login'], '', '', '', '', '', '', '', '');
        $valores = $USUARIO->RellenaDatos();
        new USUARIO_SHOWCURRENT($valores);
        break;
    default:
        if (!$_POST){
            $USUARIO = new USUARIO_Model('','', '', '', '', '', '', '', '');
        }
        else{
            $USUARIO = get_data_form();
        }
        $datos = $USUARIO->SEARCH();
        $lista = array('login','password','fechnacuser','grupopracticasuser','emailuser','nombreuser','apellidosuser','cursoacademicouser','titulacionuser');
        new USUARIO_SHOWALL($lista, $datos, '../index.php');

}