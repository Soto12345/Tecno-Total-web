<?php
function sign_off_cart(){
    $_SESSION['CART']=NULL;
    header('location: index.php');
}
?>