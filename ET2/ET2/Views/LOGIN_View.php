<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 07/11/2017
 * Time: 17:42
 */

class Login{

    function __construct(){
        $this->render();
    }

    function render(){

        include '../Views/Header.php';
        include '../Locales/style.css';
        ?>
        <div id="formularios">
            <div class="formLogin">
                <h1><?php echo $strings['Login']; ?></h1>
                <form name = 'Form' action='../Controllers/LOGIN_Controller.php' method='post' onsubmit="return comprobar_login();">

                    <label>
                        <?php echo $strings['Login']; ?> <br> <input type = 'text' name = 'login' id = 'login' placeholder = 'Utiliza tu dni' size = '9' value = '' onblur="esNoVacio('login')  && comprobarDni('login')" ><br>
                    </label>
                    <label>
                        <?php echo $strings['Password']; ?> <br> <input type = 'text' name = 'password' id = 'password' placeholder = 'letras y numeros' size = '15' value = '' onblur="esNoVacio('password')  && comprobarLetrasNumeros('password',15)" ><br>
                    </label>

                    <input type='submit' name='action' value='Login'>

                </form>
            </div>
        </div>

        <?php
        include 'Footer.php';
    } //fin metodo render

} //fin Login

?>