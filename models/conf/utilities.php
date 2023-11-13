<?php
function Get_id()
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    // Mezcla los caracteres al azar
    $mix_characters = str_shuffle($characters);

    // Toma los primeros $longitud caracteres de la cadena mezclada
    $random_string = substr($mix_characters, 0, 20);

    return $random_string;
}

function Encrypt_password($password)
{
    $hash = password_hash($password, PASSWORD_BCRYPT);
    return $hash;
}

function Verify_password($password, $hash)
{
    return password_verify($password, $hash);
}

?>