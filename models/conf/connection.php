<?php
class connectionDB
{
    //atributos
    private $host;
    private $user;
    private $password;
    private $database;
    private $connection;
    //constructor
    public function __construct($host, $user, $password, $database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->Connect();
    }
    //funcion para conectar a la base de datos
    public function Connect()
    {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Error en la conexion" . $this->connection->connect_error);
        }
    }
    //funcion para ejecutar consultas para la base de datos
    public function run_query($sql)
    {
        $result = $this->connection->query($sql);
        return $result;
    }
    //funcion para cerrar la conexion de la base de datos
    public function Close_connection()
    {
        $this->connection->close();
    }
}

//datos del host
$host = '64.20.36.19:3306';
$user = 'u32759_xXJdiuUD1m';
$password = '5giDpDG8YfslDAxikk=c@UIW';
$database = 's32759_proyectoweb';
//prueba de conexion
$connection = new connectionDB($host, $user, $password, $database);
?>