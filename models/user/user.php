<?php
require('../conf/connection.php');
require('../conf/utilities.php');

class User_data
{
    //atributos
    private $email_user;
    private $password_user;

    //constructor
    public function __construct()
    {
        $this->email_user = "";
        $this->password_user = "";
    }
    //metodos get y set
    public function setEmail_user($email_user)
    {
        $this->email_user = $email_user;
    }

    public function getEmail_user()
    {
        return $this->email_user;
    }

    public function setPassword_user($password_user)
    {
        $this->password_user = $password_user;
    }

    public function getPassword_user()
    {
        return $this->password_user;
    }
}
//metodo de registrar al usuario
function register_user($email_user, $password_user)
{
    global $connection;
    $random_string = Get_id();
    $hash = Encrypt_password($password_user);
    $sql_verification = "SELECT correo FROM usuario WHERE correo='$email_user'";
    $sql_insert = "INSERT INTO usuario VALUES('$random_string','$email_user',1,'$hash')";
    $result_verification = $connection->run_query($sql_verification);
    //verifica si la solicitud a la base de datos fue enviado con exito
    if ($result_verification) {
        //se verifica si el mismo correo ya ha sido registrado anteriormente
        if (mysqli_num_rows($result_verification)) {
            echo "correo ya existente";
            $connection->Close_connection();
        } else {
            //se registra el usuario si se encuentra que no ha sido registrado
            $connection->run_query($sql_insert);
            $connection->Close_connection();
            header('location: ../forms/login.html');
        }
    } else {
        echo "error en la conexion";
    }
}
//metodo para logear al usuario
function login_user($email_user, $password_user)
{
    global $connection;
    //extraer la contraseña del usuario encriptado
    $sql_encrypted_password = "SELECT contrasena,Tipo_usuario FROM usuario WHERE correo='$email_user'";
    $result = $connection->run_query($sql_encrypted_password);
    //verifica si la solicitud a la base de datos fue enviado con exito
    if ($result) {
        $row = $result->fetch_assoc();
        //verifica que si hay un correo que esta solicitando por el usuario
        if ($row !== NULL && isset($row['contrasena'])) {
            $password_database = $row['contrasena'];
            $type_user = $row['Tipo_usuario'];
            //verifica y desencripta la contraseña y compara si son iguales o no
            if (Verify_password($password_user, $password_database)) {
                session_start();
                $_SESSION['usuario'] = $email_user;
                $_SESSION['Tipo_usuario'] = $type_user;
                header("location: ../../index.php");
            } else {
                echo "usuario o contraseña incorrecta";
            }
        } else {
            echo "este usuario no existe, favor de registrarse";
        }
    } else {
        echo "Error de conexion";
    }
}
?>