<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 06/11/2017
 * Time: 11:29
 */

class MESSAGE
{
    private $string;
    private $volver;

    function __construct($string, $volver){
        $this->string = $string;
        $this->volver = $volver;
        $this->render();
    }

    function render(){

        include './Strings_'.$_SESSION['idioma'].'.php';
        include './Header.php';
        ?>
        <br>
        <br>
        <br>
        <p>
        <H3>
            <?php
            echo $strings[$this->string];
            ?>
        </H3>
        </p>
        <br>
        <br>
        <br>

        <?php

        echo '<a href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>";
        include './Footer.php';
    } //fin metodo render
}