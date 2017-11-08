/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 07/11/2017
 * Time: 16:54
 */

<div id="menu">
            <h3><?php echo $strings['Menú de gestiones'] ?></h3>
            <ul>
                <li class="nivel1 primera" tabindex="1"><span class="nivel1"><?php echo $strings['Gestión de Usuarios'] ?></span>
                    <ul>
                        <li class="primera"><a href="../Controllers/USUARIO_CONTROLLER.php"><?php echo $strings['Ver Usuarios']?></a></li>
                        <li><a href="../Controllers/USUARIO_CONTROLLER.php"><?php echo $strings['Añadir usuario']?></a></li>
                        <li><a href="../Controllers/USUARIO_CONTROLLER.php"><?php echo $strings['Buscar usuario']?></a></li>
                    </ul>
                </li>
            </ul>
        </div>