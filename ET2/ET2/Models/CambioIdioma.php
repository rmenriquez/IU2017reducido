<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 07/11/2017
 * Time: 16:23
 */
const IDIOMA = 'idioma';

function setLanguage($language){
    $_SESSION[IDIOMA] = $language;
}

session_start();
setLanguage($_GET['idioma']);

echo  $_SERVER["HTTP_REFERER"];
header('Location:' . $_SERVER["HTTP_REFERER"]);
die();
?>