<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 07/11/2017
 * Time: 15:34
 */

session_start();
session_destroy();
header('Location:./index.php');