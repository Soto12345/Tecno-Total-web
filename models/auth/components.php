<?php
//Funcion para la verificacion del usuario
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

//Esta es la funcion para la pagina sin usuario
function nav_without_user()
{
?>
<br>
<br>
<br>
<br>
<br>
<!--Aqui empieza el navbar del usuario (No contiene para agregar productos)-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4 fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="index.php">
            <img src="./img/logo.png" alt="">
            <span class="text-uppercase fw-lighter ms-2">Tecno-Total</span>
        </a>
        <!--Aqui esta el inicio de lo que seran los componentes de la navbar-->
        <div class="collapse navbar-collapse order-lg-1" id="navbarNav">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item active px-2 py-2">
                    <a class="nav-link text-uppercase text-white" href="index.php">Inicio   <span class="sr-only">(current)</span></a>
                </li>
                <!--Aqui trato de poner el dropdown de categorias(Funciona y no tocar)-->
                <li class="nav-item dropdown px-2 py-2">
                    <a class="nav-link dropdown-toggle text-uppercase text-white" href="#" id="navbarDropdownCategoria" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categoria   </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownCategoria">
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "almacenamiento.hdd"; ?>&Token=<?php echo hash_hmac('sha256', 'almacenamiento.hdd', KEY_TOKEN); ?>">HDD</a></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "almacenamiento.ssd"; ?>&Token=<?php echo hash_hmac('sha256', 'almacenamiento.ssd', KEY_TOKEN); ?>">SSD</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "componentes.grafica"; ?>&Token=<?php echo hash_hmac('sha256', 'componentes.grafica', KEY_TOKEN); ?>">Gráficas</a></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "componentes.ram"; ?>&Token=<?php echo hash_hmac('sha256', 'componentes.ram', KEY_TOKEN); ?>">RAM</a></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "componentes.motherboard"; ?>&Token=<?php echo hash_hmac('sha256', 'componentes.motherboard', KEY_TOKEN); ?>">Motherboards</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "dispositivos.teclado"; ?>&Token=<?php echo hash_hmac('sha256', 'dispositivos.teclado', KEY_TOKEN); ?>">Teclados</a></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "dispositivos.monitor"; ?>&Token=<?php echo hash_hmac('sha256', 'dispositivos.monitor', KEY_TOKEN); ?>">Monitor</a></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "dispositivos.mouse"; ?>&Token=<?php echo hash_hmac('sha256', 'dispositivos.mouse', KEY_TOKEN); ?>">Mouse</a></li>
                    </ul>
                </li>
                <li class="nav-item active px-2 py-2">
                    <a class="nav-link text-uppercase text-white" href="index.php?Cart=yes">Carrito(<?php echo (empty($_SESSION['CART'])) ? 0 : count($_SESSION['CART']); ?>)</a>
                </li>
                <!--Este apartado es de dropdowns menu para el inicio de sesion y registro-->
                <li class="nav-item dropdown px-2 py-2">
                    <a class="nav-link dropdown-toggle text-uppercase text-white" href="#" id="navbarDropdownwu" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Iniciar sesion</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="models/forms/login.html">Iniciar sesion</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="models/forms/Register.html">Registrarse</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
}


//Esta es la funcion del usuario
function nav_with_user()
{
?>
<!--Tiene estos saltos de linea porque el navbar esta anclado para seguirte durante toda la pagina, asi no perdemos informacion-->
<br>
<br>
<br>
<br>
<br>
<!--Aqui empieza el navbar del usuario (No contiene para agregar productos)-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4 fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="index.php">
            <img src="./img/logo.png" alt="">
            <span class="text-uppercase fw-lighter ms-2">Tecno-Total</span>
        </a>
        <!--Aqui esta el inicio de lo que seran los componentes de la navbar-->
        <div class="collapse navbar-collapse order-lg-1" id="navbarNav">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item active px-2 py-2">
                    <a class="nav-link text-uppercase text-white" href="index.php">Inicio   <span class="sr-only">(current)</span></a>
                </li>
                <!--Aqui trato de poner el dropdown de categorias(Funciona y no tocar)-->
                <li class="nav-item dropdown px-2 py-2">
                    <a class="nav-link dropdown-toggle text-uppercase text-white" href="#" id="navbarDropdownCategoria" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categoria   </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownCategoria">
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "almacenamiento.hdd"; ?>&Token=<?php echo hash_hmac('sha256', 'almacenamiento.hdd', KEY_TOKEN); ?>">HDD</a></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "almacenamiento.ssd"; ?>&Token=<?php echo hash_hmac('sha256', 'almacenamiento.ssd', KEY_TOKEN); ?>">SSD</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "componentes.grafica"; ?>&Token=<?php echo hash_hmac('sha256', 'componentes.grafica', KEY_TOKEN); ?>">Gráficas</a></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "componentes.ram"; ?>&Token=<?php echo hash_hmac('sha256', 'componentes.ram', KEY_TOKEN); ?>">RAM</a></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "componentes.motherboard"; ?>&Token=<?php echo hash_hmac('sha256', 'componentes.motherboard', KEY_TOKEN); ?>">Motherboards</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "dispositivos.teclado"; ?>&Token=<?php echo hash_hmac('sha256', 'dispositivos.teclado', KEY_TOKEN); ?>">Teclados</a></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "dispositivos.monitor"; ?>&Token=<?php echo hash_hmac('sha256', 'dispositivos.monitor', KEY_TOKEN); ?>">Monitor</a></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "dispositivos.mouse"; ?>&Token=<?php echo hash_hmac('sha256', 'dispositivos.mouse', KEY_TOKEN); ?>">Mouse</a></li>
                    </ul>
                </li>
                <!--Aqui puse el dropdown de el administrador para agregar productos a la pagina (Funciona y no tocar)-->
                <li class="nav-item dropdown px-2 py-2">
                    <a class="nav-link dropdown-toggle text-uppercase text-white" href="#" id="navbarDropdownAdmin" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['usuario'] ?></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?administrator_history=yes">Historial</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="models/user/sign_off.php">Cerrar sesion</a></li>
                    </ul>
                </li>
                <!--Aqui puse la parte del carrito que no estaba por parte del usuario-->
                <li class="nav-item active px-2 py-2">
                    <a class="nav-link text-uppercase text-white" href="index.php?Cart=yes">Carrito(<?php echo (empty($_SESSION['CART'])) ? 0 : count($_SESSION['CART']); ?>)</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
}


//Esta es la funcion del Navbar del Administrador   
function nav_administrator() {
?> 
<!--Aqui empieza el navbar-->
<!--Tiene estos saltos de linea porque el navbar esta anclado para seguirte durante toda la pagina, asi no perdemos informacion-->
<br>
<br>
<br>
<br>
<br>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4 fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="index.php">
            <img src="./img/logo.png" alt="">
            <span class="text-uppercase fw-lighter ms-2">Tecno-Total</span>
        </a>
        <!--Aqui esta el inicio de lo que seran los componentes de la navbar-->
        <div class="collapse navbar-collapse order-lg-1" id="navbarNav">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item active px-2 py-2">
                    <a class="nav-link text-uppercase text-white" href="index.php">Inicio   <span class="sr-only">(current)</span></a>
                </li>
                <!--Aqui trato de poner el dropdown de categorias(Funciona y no tocar)-->
                <li class="nav-item dropdown px-2 py-2">
                    <a class="nav-link dropdown-toggle text-uppercase text-white" href="#" id="navbarDropdownCategoria" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categoria   </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownCategoria">
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "almacenamiento.hdd"; ?>&Token=<?php echo hash_hmac('sha256', 'almacenamiento.hdd', KEY_TOKEN); ?>">HDD</a></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "almacenamiento.ssd"; ?>&Token=<?php echo hash_hmac('sha256', 'almacenamiento.ssd', KEY_TOKEN); ?>">SSD</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "componentes.grafica"; ?>&Token=<?php echo hash_hmac('sha256', 'componentes.grafica', KEY_TOKEN); ?>">Gráficas</a></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "componentes.ram"; ?>&Token=<?php echo hash_hmac('sha256', 'componentes.ram', KEY_TOKEN); ?>">RAM</a></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "componentes.motherboard"; ?>&Token=<?php echo hash_hmac('sha256', 'componentes.motherboard', KEY_TOKEN); ?>">Motherboards</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "dispositivos.teclado"; ?>&Token=<?php echo hash_hmac('sha256', 'dispositivos.teclado', KEY_TOKEN); ?>">Teclados</a></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "dispositivos.monitor"; ?>&Token=<?php echo hash_hmac('sha256', 'dispositivos.monitor', KEY_TOKEN); ?>">Monitor</a></li>
                        <li><a class="dropdown-item" href="index.php?Categoria=<?php echo "dispositivos.mouse"; ?>&Token=<?php echo hash_hmac('sha256', 'dispositivos.mouse', KEY_TOKEN); ?>">Mouse</a></li>
                    </ul>
                </li>
                <!--Aqui puse el dropdown de el administrador para agregar productos a la pagina (Funciona y no tocar)-->
                <li class="nav-item dropdown px-2 py-2">
                    <a class="nav-link dropdown-toggle text-uppercase text-white" href="#" id="navbarDropdownAdmin" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrador:  <?php echo $_SESSION['usuario'] ?></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?add=yes">Agregar</a></li>
                        <li><a class="dropdown-item" href="index.php?delete=yes">Borrar</a></li>
                        <li><a class="dropdown-item" href="index.php?update=yes">Modificar</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="index.php?administrator_history=yes">Historial</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="models/user/sign_off.php">Cerrar sesion</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
}
?>