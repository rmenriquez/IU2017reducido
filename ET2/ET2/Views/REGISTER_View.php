<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 08/11/2017
 * Time: 15:09
 */

class Register{
    function __construct(){
        $this->render();
    }

    function render(){

        include 'Header.php'; //header necesita los strings
        ?>
        <div id="formularios">
            <div class="formAlta">
                <h1><?php echo $strings['Registro']; ?></h1>
                <form name = 'Form' action='../Controllers/REGISTER_Controller.php' method='post' onsubmit="return comprobar_registro();"">
                    <label>
                        <?php echo $strings['Login']; ?> <br> <input type = 'text' name = 'login' id = 'login' placeholder = 'Utiliza tu dni' size = '9' value = '' onblur="esNoVacio('login')  && comprobarDni('login')" ><br>
                    </label>
                    <label>
                        <?php echo $strings['Password']; ?> <br> <input type = 'text' name = 'password' id = 'password' placeholder = 'letras y numeros' size = '15' value = '' onblur="esNoVacio('password')  && comprobarLetrasNumeros('password',15)" ><br>
                    </label>
                    <label>
                        <?php echo $strings['DNI']; ?> <br> <input type = 'text' name = 'dni' id = 'dni' placeholder = 'Utiliza tu dni' size = '9' value = '' onblur="esNoVacio('login')  && comprobarDni('login')" ><br>
                    </label>
                    <label>
                        <?php echo $strings['Nombre']; ?> <br> <input type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Solo letras' size = '30' value = '' onblur="esNoVacio('nombre')  && comprobarSoloLetras('nombre',30)" ><br>
                    </label>
                    <label>
                        <?php echo $strings['Apellidos']; ?> <br> <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = 'Solo letras' size = '50' value = '' onblur="esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50)" ><br>
                    </label>
                    <label>
                        <?php echo $strings['Teléfono']; ?> <br> <input type = 'text' name = 'telefono' id = 'telefono' size = '40' value = '' onblur="esNoVacio('email')  && comprobarEmail('email')" ><br>
                    </label>
                    <label>
                        <?php echo $strings['Email']; ?> <br> <input type = 'email' name = 'email' id = 'email' placeholder = 'Utiliza tu dni' size = '9' value = '' onblur="esNoVacio('login')  && comprobarDni('login')" ><br>
                    </label>
                    <label>
                        <?php echo $strings['Fecha de Nacimiento']; ?> <br> <input type = 'date' name = 'fechaNacimiento' id = 'fechaNacimiento' placeholder = 'Utiliza tu dni' size = '9' value = '' onblur="esNoVacio('login')  && comprobarDni('login')" ><br>
                     </label>
                    <label>
                        <?php echo $strings['Foto personal']; ?> <br> <input type = 'file' name = 'fotoPersonal' id = 'fotoPersonal' placeholder = 'Utiliza tu dni' size = '9' value = '' onblur="esNoVacio('login')  && comprobarDni('login')" ><br>
                    </label>
                    <label>
                        <?php echo $strings['Sexo']; ?> <br>  <input type="radio" name="sexo" value="hombre"> <?php echo $strings['Hombre']; ?> &emsp;  <input type="radio" name="sexo" value="mujer"> <?php echo $strings['Mujer']; ?><br>
                    </label>



                        <input type='submit' name='action' value='<?php echo $strings['Registrar']; ?>'>

                </form>


                <a href='../Controllers/INDEX_Controller.php'>Volver </a>
            </div>
        </div>
        <?php
        include 'Footer.php';
    } //fin metodo render
}