<?php
function user_verification()
{
    session_start();
    if (!isset($_SESSION['usuario'])) {
        nav_without_user();
    } else {
        nav_with_user();
    }
}
function nav_without_user()
{
?>
    <nav>
        <a href="#">Tecno-Total1</a>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="#">Carrito(0)</a></li>
            <li>
                <a href="#">Categoria</a>
                <ul>
                    <li>
                        <a href="#">almacenamiento</a>
                        <ul>
                            <li><a href="#">HDD</a></li>
                            <li><a href="#">SSD</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">componentes</a>
                        <ul>
                            <li><a href="#">graficas</a></li>
                            <li><a href="#">ram</a></li>
                            <li><a href="#">motherboards</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Dispositivos externos</a>
                        <ul>
                            <li><a href="#">Teclados</a></li>
                            <li><a href="#">Monitor</a></li>
                            <li><a href="#">Mouse</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Iniciar sesion</a>
                <ul>
                    <li><a href="login.html">Iniciar sesion</a></li>
                    <li><a href="Register.html">Registrarse</a></li>
                </ul>
            </li>
        </ul>
    </nav>
<?php
}

function nav_with_user()
{
?>
    <nav>
        <a href="#">Tecno-Total</a>
        <ul>
            <li><a href="index_user.php">Inicio</a></li>
            <li><a href="#">Carrito(0)</a></li>
            <li>
                <a href="#">Categoria</a>
                <ul>
                    <li>
                        <a href="#">almacenamiento</a>
                        <ul>
                            <li><a href="#">HDD</a></li>
                            <li><a href="#">SSD</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">componentes</a>
                        <ul>
                            <li><a href="#">graficas</a></li>
                            <li><a href="#">ram</a></li>
                            <li><a href="#">motherboards</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Dispositivos externos</a>
                        <ul>
                            <li><a href="#">Teclados</a></li>
                            <li><a href="#">Monitor</a></li>
                            <li><a href="#">Mouse</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><?php echo $_SESSION['usuario'] ?></a>
                <ul>
                    <li><a href="models/user/sign_off.php">Cerrar sesion</a></li>
                </ul>
            </li>
        </ul>
    </nav>
<?php
}

?>