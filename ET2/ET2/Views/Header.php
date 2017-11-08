<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 07/11/2017
 * Time: 13:23
 */

    include_once '../Authentication.php';

    if(!isset($_SESSION['idioma'])){
        $_SESSION['idioma'] = 'SPANISH';
    }else{
        include '../Locales/Strings_' . $_SESSION['idioma'] . '.php';
    }
?>
<html xmlns="http://www.w3.org/1999/html" lang="es">
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <script language="JavaScript" src="../Functions/validaciones.js"></script>
    <script language="JavaScript" src="../Functions/tcal.js"></script>
    <link rel="stylesheet" href="../Locales/style.css">
    <link rel="stylesheet" href="../Locales/tcal.css" >
    <title>ET2</title>
</head>
<body>
<header id="header_main">
    <h1> <?php echo $strings['Gestión de usuarios']?> </h1>
    <div id="presentacion">
        <div class="user">
            <?php if(IsAuthenticated()){ ?>
            <p class="login"> <?php echo $strings['Hola'] . ' ' . $_SESSION['login']?></p>
            <p class="logout"><a href="../Desconection.php"><img src="Locales/img/logout-512.png" height="40px" width="40px"></a></p>
            <?php }else{
                echo $strings['Usuario no autenticado'];?>
                <a href="../Controllers/REGISTER_Controller.php"><?php echo $strings['Registrar'] ?></a>
           <?php } ?>
        </div>
        <div class="icon">
            <a href="../Views/default.php"><img src="../Locales/img/indice.png" height="120px" width="120px"></a>
        </div>
        <div class="navIdioma">
            <ul>
                <li><a href="../Models/CambioIdioma.php?idioma=SPANISH"><img class="idioma" src="../Locales/img/spanish_flag.jpg" alt="<?php echo $strings['ESPAÑOL']?>"></a></li>
                <li><a href="../Models/CambioIdioma.php?idioma=ENGLISH"><img class="idioma" src="../Locales/img/england_flag.jpg" alt="<?php echo $strings['INGLES']?>"></a></li>
            </ul>
        </div>
    </div>
</header>
<div class="contenidoPpal">
    <div class="contenido">