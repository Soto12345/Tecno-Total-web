<?php
    require ('user.php');
    $user=new User_data();
    $user->setEmail_user($_POST['email_user']);
    $user->setPassword_user($_POST['password_user']);
    $password_database=login_user($user->getEmail_user(),$user->getPassword_user());
?>