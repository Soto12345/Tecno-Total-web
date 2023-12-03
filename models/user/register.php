<?php
    require ('user.php');

    $user=new User_data();
    $user->setEmail_user($_POST['email_user']);
    $user->setPassword_user($_POST['password_user']);
    register_user($user->getEmail_user(),$user->getPassword_user());
    //retorna otra vez a la pagina de registro
    //header('location: ../forms/Register.html');
    exit();
?>