<?php
function user_verification()
{
   
    if (!isset($_SESSION['usuario'])) {
        nav_without_user();
    } else {
        if ($_SESSION['Tipo_usuario'] == 1) {
            nav_with_user();
        } else {
            nav_administrator();
        }
    }
}

function nav_without_user()
{
?>
    <nav>
        <a href="#">Tecno-Total</a>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="index.php?Cart=yes">Carrito(<?php echo (empty($_SESSION['CART']))?0:count($_SESSION['CART']);?>)</a></li>
            <li>
                <a href="#">Categoria</a>
                <ul>
                    <li>
                        <a href="#">almacenamiento</a>
                        <ul>
                            <li><a href="index.php?Categoria=<?php echo "almacenamiento.hdd"; ?>&Token=<?php echo hash_hmac('sha256', 'almacenamiento.hdd', KEY_TOKEN); ?>">HDD</a></li>
                            <li><a href="index.php?Categoria=<?php echo "almacenamiento.ssd"; ?>&Token=<?php echo hash_hmac('sha256', 'almacenamiento.ssd', KEY_TOKEN); ?>">SSD</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">componentes</a>
                        <ul>
                            <li><a href="index.php?Categoria=<?php echo "componentes.grafica"; ?>&Token=<?php echo hash_hmac('sha256', 'componentes.grafica', KEY_TOKEN); ?>">graficas</a></li>
                            <li><a href="index.php?Categoria=<?php echo "componentes.ram"; ?>&Token=<?php echo hash_hmac('sha256', 'componentes.ram', KEY_TOKEN); ?>">ram</a></li>
                            <li><a href="index.php?Categoria=<?php echo "componentes.motherboard"; ?>&Token=<?php echo hash_hmac('sha256', 'componentes.motherboard', KEY_TOKEN); ?>">motherboards</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Dispositivos externos</a>
                        <ul>
                            <li><a href="index.php?Categoria=<?php echo "dispositivos.teclado"; ?>&Token=<?php echo hash_hmac('sha256', 'dispositivos.teclado', KEY_TOKEN); ?>">Teclados</a></li>
                            <li><a href="index.php?Categoria=<?php echo "dispositivos.monitor"; ?>&Token=<?php echo hash_hmac('sha256', 'dispositivos.monitor', KEY_TOKEN); ?>">Monitor</a></li>
                            <li><a href="index.php?Categoria=<?php echo "dispositivos.mouse"; ?>&Token=<?php echo hash_hmac('sha256', 'dispositivos.mouse', KEY_TOKEN); ?>">Mouse</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Iniciar sesion</a>
                <ul>
                    <li><a href="models/forms/login.html">Iniciar sesion</a></li>
                    <li><a href="models/forms/Register.html">Registrarse</a></li>
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
            <li><a href="index.php">Inicio</a></li>
            <li><a href="index.php?Cart=yes">Carrito(<?php echo (empty($_SESSION['CART']))?0:count($_SESSION['CART']);?>)</a></li>
            <li>
                <a href="#">Categoria</a>
                <ul>
                    <li>
                        <a href="#">almacenamiento</a>
                        <ul>
                            <li><a href="index.php?Categoria=<?php echo "almacenamiento.hdd"; ?>&Token=<?php echo hash_hmac('sha256', 'almacenamiento.hdd', KEY_TOKEN); ?>">HDD</a></li>
                            <li><a href="index.php?Categoria=<?php echo "almacenamiento.ssd"; ?>&Token=<?php echo hash_hmac('sha256', 'almacenamiento.ssd', KEY_TOKEN); ?>">SSD</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">componentes</a>
                        <ul>
                            <li><a href="index.php?Categoria=<?php echo "componentes.grafica"; ?>&Token=<?php echo hash_hmac('sha256', 'componentes.grafica', KEY_TOKEN); ?>">graficas</a></li>
                            <li><a href="index.php?Categoria=<?php echo "componentes.ram"; ?>&Token=<?php echo hash_hmac('sha256', 'componentes.ram', KEY_TOKEN); ?>">ram</a></li>
                            <li><a href="index.php?Categoria=<?php echo "componentes.motherboard"; ?>&Token=<?php echo hash_hmac('sha256', 'componentes.motherboard', KEY_TOKEN); ?>">motherboards</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Dispositivos externos</a>
                        <ul>
                            <li><a href="index.php?Categoria=<?php echo "dispositivos.teclado"; ?>&Token=<?php echo hash_hmac('sha256', 'dispositivos.teclado', KEY_TOKEN); ?>">Teclados</a></li>
                            <li><a href="index.php?Categoria=<?php echo "dispositivos.monitor"; ?>&Token=<?php echo hash_hmac('sha256', 'dispositivos.monitor', KEY_TOKEN); ?>">Monitor</a></li>
                            <li><a href="index.php?Categoria=<?php echo "dispositivos.mouse"; ?>&Token=<?php echo hash_hmac('sha256', 'dispositivos.mouse', KEY_TOKEN); ?>">Mouse</a></li>
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
function nav_administrator()
{
?>
    <nav>
        <a href="#">Tecno-Total</a>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li>
                <a href="#">Categoria</a>
                <ul>
                    <li>
                        <a href="#">almacenamiento</a>
                        <ul>
                            <li><a href="index.php?Categoria=<?php echo "almacenamiento.hdd"; ?>&Token=<?php echo hash_hmac('sha256', 'almacenamiento.hdd', KEY_TOKEN); ?>">HDD</a></li>
                            <li><a href="index.php?Categoria=<?php echo "almacenamiento.ssd"; ?>&Token=<?php echo hash_hmac('sha256', 'almacenamiento.ssd', KEY_TOKEN); ?>">SSD</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">componentes</a>
                        <ul>
                            <li><a href="index.php?Categoria=<?php echo "componentes.grafica"; ?>&Token=<?php echo hash_hmac('sha256', 'componentes.grafica', KEY_TOKEN); ?>">graficas</a></li>
                            <li><a href="index.php?Categoria=<?php echo "componentes.ram"; ?>&Token=<?php echo hash_hmac('sha256', 'componentes.ram', KEY_TOKEN); ?>">ram</a></li>
                            <li><a href="index.php?Categoria=<?php echo "componentes.motherboard"; ?>&Token=<?php echo hash_hmac('sha256', 'componentes.motherboard', KEY_TOKEN); ?>">motherboards</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Dispositivos externos</a>
                        <ul>
                            <li><a href="index.php?Categoria=<?php echo "dispositivos.teclado"; ?>&Token=<?php echo hash_hmac('sha256', 'dispositivos.teclado', KEY_TOKEN); ?>">Teclados</a></li>
                            <li><a href="index.php?Categoria=<?php echo "dispositivos.monitor"; ?>&Token=<?php echo hash_hmac('sha256', 'dispositivos.monitor', KEY_TOKEN); ?>">Monitor</a></li>
                            <li><a href="index.php?Categoria=<?php echo "dispositivos.mouse"; ?>&Token=<?php echo hash_hmac('sha256', 'dispositivos.mouse', KEY_TOKEN); ?>">Mouse</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Administrador:<?php echo $_SESSION['usuario'] ?></a>
                <ul>
                    <li><a href="models/user/sign_off.php">Cerrar sesion</a></li>
                </ul>
            </li>
        </ul>
    </nav>
<?php
}
?>