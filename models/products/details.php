<?php
require('models/conf/cart_configuration.php');
require('models/shooping_cart/cart_process.php');
function details()
{
    $id = isset($_GET['Id']) ? $_GET['Id'] : '';
    $token = isset($_GET['Token']) ? $_GET['Token'] : '';

    if ($id == '' || $token == '') {
        echo "Error de procesamiento";
        exit;
    } else {
        $temporary_token = hash_hmac('sha256', $id, KEY_TOKEN);
        if ($token == $temporary_token) {
            global $connection;
            $sql_count = "SELECT count(ID_producto)FROM producto WHERE ID_producto='$id'";
            $result_count = $connection->run_query($sql_count);
            if ($result_count) {
                $sql_details = "SELECT *FROM producto WHERE ID_producto='$id' LIMIT 1";
                $result_details = $connection->run_query($sql_details);
                $row = $result_details->fetch_array();
                $product_id = $row['ID_producto'];
                $product_name = $row['Nombre_producto'];
                $product_description = $row['descripcion'];
                $product_price = $row['precio'];
                $product_image = $row['imagen'];
                $product_stock = $row['Stock'];
                $product_category = $row['categoria'];
?>
                <div>
                    <h2><?php echo $product_id ?></h2>
                    <h3><?php echo $product_name ?></h3>
                    <img src="<?php echo $product_image ?>" width="100" height="100">
                    <p><?php echo $product_description ?></p>
                    <p><?php echo $product_category ?></p>
                    <p><?php echo $product_price ?></p>
                    <p><?php echo $product_stock ?></p>
                    <?php
                    if (!isset($_SESSION['usuario'])) {
                    ?>
                        <form action="" method="post">
                            <input type="hidden" name="product_id" id="product_id" value="<?php echo openssl_encrypt($product_id, COD, KEY_CARRITO); ?>">
                            <input type="hidden" name="product_name" id="product_name" value="<?php echo openssl_encrypt($product_name, COD, KEY_CARRITO); ?>">
                            <input type="hidden" name="product_price" id="product_price" value="<?php echo openssl_encrypt($product_price, COD, KEY_CARRITO); ?>">
                            <input type="hidden" name="product_image" id="product_image" value="<?php echo openssl_encrypt($product_image, COD, KEY_CARRITO); ?>">
                            <input type="hidden" name="product_category" id="product_category" value="<?php echo openssl_encrypt($product_category, COD, KEY_CARRITO); ?>">
                            <input type="hidden" name="product_stock" id="product_stock" value="<?php echo 1 ?>">
                            <button type="submit" name="btn_accion" value="AGREGAR">AGREGAR</button>
                        </form>
                        <?php
                    } else {
                        if ($_SESSION['Tipo_usuario'] == 1) {
                        ?>
                            <form action="" method="post">
                                <input type="hidden" name="product_id" id="product_id" value="<?php echo openssl_encrypt($product_id, COD, KEY_CARRITO); ?>">
                                <input type="hidden" name="product_name" id="product_name" value="<?php echo openssl_encrypt($product_name, COD, KEY_CARRITO); ?>">
                                <input type="hidden" name="product_price" id="product_price" value="<?php echo openssl_encrypt($product_price, COD, KEY_CARRITO); ?>">
                                <input type="hidden" name="product_image" id="product_image" value="<?php echo openssl_encrypt($product_image, COD, KEY_CARRITO); ?>">
                                <input type="hidden" name="product_category" id="product_category" value="<?php echo openssl_encrypt($product_category, COD, KEY_CARRITO); ?>">
                                <input type="hidden" name="product_stock" id="product_stock" value="<?php echo 1 ?>">
                                <button type="submit" name="btn_accion" value="AGREGAR">AGREGAR</button>
                            </form>
                    <?php
                        }
                    }
                    ?>
                </div>
<?php
            } else {
                echo "producto no encontrado";
                exit;
            }
        } else {
            echo "Error de procesamiento";
            exit;
        }
    }
}
?>