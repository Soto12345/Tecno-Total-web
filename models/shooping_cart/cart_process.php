<?php
if (isset($_POST['btn_accion'])) {
    if (is_string(openssl_decrypt($_POST['product_id'], COD, KEY_CARRITO))) {
        $product_id = openssl_decrypt($_POST['product_id'], COD, KEY_CARRITO);
    } else {
        echo "ERROR por id";
    }
    if (is_string(openssl_decrypt($_POST['product_name'], COD, KEY_CARRITO))) {
        $product_name = openssl_decrypt($_POST['product_name'], COD, KEY_CARRITO);
    } else {
        echo "ERROR por nombre";
    }
    if (is_numeric($_POST['product_stock'])) {
        $product_stock = $_POST['product_stock'];
    } else {
        echo "ERROR por stock";
    }
    if (is_numeric(openssl_decrypt($_POST['product_price'], COD, KEY_CARRITO))) {
        $product_price = openssl_decrypt($_POST['product_price'], COD, KEY_CARRITO);
    } else {
        echo "ERROR por precio";
    }
    if (is_string(openssl_decrypt($_POST['product_category'], COD, KEY_CARRITO))) {
        $product_category = openssl_decrypt($_POST['product_category'], COD, KEY_CARRITO);
    } else {
        echo "ERROR por categoria";
    }
    if (is_string(openssl_decrypt($_POST['product_image'], COD, KEY_CARRITO))) {
        $product_image = openssl_decrypt($_POST['product_image'], COD, KEY_CARRITO);
    } else {
        echo "ERROR por categoria";
    }
    //comprobacion si esta vacio el carrito o no
    if (!isset($_SESSION['CART'])) {
        $product = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_stock' => $product_stock,
            'product_price' => $product_price,
            'product_category' => $product_category,
            'product_image' => $product_image
        );
        $_SESSION['CART'][0] = $product;
    } else {
        //Se evalua si el id ya esta dentro del arreglo, si asi es, entonces no se agrega .
        $products_id = array_column($_SESSION['CART'], "product_id");
        if (in_array($product_id, $products_id)) {
            echo "<script>alert(' El producto ya ha sido seleccionado')</script>";
        } else {
            $number_products = count($_SESSION['CART']);
            $product = array(
                'product_id' => $product_id,
                'product_name' => $product_name,
                'product_stock' => $product_stock,
                'product_price' => $product_price,
                'product_category' => $product_category,
                'product_image' => $product_image
            );
            $_SESSION['CART'][$number_products] = $product;
            echo "<script>alert('producto agregado al carrito')</script>";
        }
    }
}

if (isset($_POST['btn_eliminar'])) {
    if (is_string(openssl_decrypt($_POST['product_id'], COD, KEY_CARRITO))) {
        $ID = openssl_decrypt($_POST['product_id'], COD, KEY_CARRITO);

        foreach ($_SESSION['CART'] as $index => $product) {

            if ($product['product_id'] == $ID) {

                unset($_SESSION['CART'][$index]);
                $_SESSION['CART'] = array_values($_SESSION["CART"]);
            }
        }
    } else {
        echo "<script>alert('!UPS...... id incorrecto');</script>";
    }
}
?>