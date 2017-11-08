<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 07/11/2017
 * Time: 17:34
 */

class Index{
    function __construct(){
        $this->render();
    }

    function render(){
        include '../Locales/Strings_SPANISH.php';
        include '../Locales/Strings_ENGLISH.php';
        include 'Header.php';
        include 'Footer.php';
    }
}