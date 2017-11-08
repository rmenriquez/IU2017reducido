<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 06/11/2017
 * Time: 11:10
 */

function ConnectDB()
{
    $mysqli = new mysqli("localhost", 'useriu', 'useriu', 'IU2');

    if ($mysqli->connect_errno) {
        include './MESSAGE_View.php';
        new MESSAGEView("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error, './index.php');
        return false;
    } else{
        return $mysqli;
    }

}