<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 07/11/2017
 * Time: 13:13
 */


function IsAuthenticated(){
    if (!isset($_SESSION['login'])){
        return false;
    }
    else{
        return true;
    }
} //end of function IsAuthenticated()