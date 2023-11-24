<?php
require('models/conf/utilities.php');
global $connection;
if (isset($_POST['btnAdd'])) {
    $product_id = Get_id();
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $product_image = $_POST['product_image'];
    $product_stock = $_POST['product_stock'];
    $sql_verification = "SELECT *FROM producto WHERE Nombre_producto='$product_name' ";
    $result_verification = $connection->run_query($sql_verification);
    $sql_insert = "INSERT INTO producto(ID_producto,Nombre_producto,imagen,descripcion,categoria,precio,Stock) VALUES('$product_id','$product_name','$product_image','$product_description','$product_category','$product_price','$product_stock')";
    if (mysqli_num_rows($result_verification) > 0) {
        echo "<script>alert('este producto ya existe')</script>";
    } else {
        $connection->run_query($sql_insert);
        echo "<script>alert('producto agregado correctamente')</script>";
    }
}

if (isset($_POST['btnUpdate'])) {
    $product_name=$_POST['product_name'];
    $new_product_name = $_POST['new_product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $product_image = $_POST['product_image'];
    $product_stock = $_POST['product_stock'];
    $sql_update = "UPDATE producto SET Nombre_producto='$new_product_name',descripcion='$product_description',precio='$product_price',categoria='$product_category',imagen='$product_image',Stock='$product_stock' WHERE Nombre_producto='$product_name'";
    $connection->run_query($sql_update);
    echo "<script>alert('producto modificado correctamente')</script>";
}

if(isset($_POST['btnDelete'])){
    global $connection;
    $product_name=$_POST['product_name'];
    $sql_delete="DELETE FROM producto WHERE Nombre_producto='$product_name'";
    $connection->run_query($sql_delete);
    echo "<script>alert('producto borrado correctamente')</script>";
}
?>