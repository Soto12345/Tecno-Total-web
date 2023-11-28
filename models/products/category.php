<?php
require('C:/xampp/htdocs/Tecno-Total-web/models/conf/configuration.php');
function category()
{
    $category = isset($_GET['Categoria']) ? $_GET['Categoria'] : '';
    $token = isset($_GET['Token']) ? $_GET['Token'] : '';
    global $connection;

    if ($category == '' || $token == '') {
        echo "Error de procesamiento";
    } else {
        $temporary_token = hash_hmac('sha256', $category, KEY_TOKEN);
        if ($token == $temporary_token) {
            $sql = "SELECT *FROM producto WHERE categoria='$category'";
            $result = $connection->run_query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $product_id = $row['ID_producto'];
                    $product_name = $row['Nombre_producto'];
                    $product_image = $row['imagen'];
                    $product_description = $row['descripcion'];
                    $product_category = $row['categoria'];
                    $product_price = $row['precio'];
                    $product_stock = $row['Stock'];
                    //cada vez que recorre un arreglo, los productos estaran en formato html
?>
                    <div class="container mt-4">
                        <h1>Resultados:</h1>
                        <h2><?php echo $product_id ?></h2>
                        <h3><?php echo $product_name ?></h3>
                        <img src="<?php echo $product_image ?>" width="100" height="100" class="img-fluid" alt="<?php echo $product_name ?>">
                        <p><?php echo $product_description ?></p>
                        <p><?php echo $product_category ?></p>
                        <p><?php echo $product_price ?></p>
                        <p><?php echo $product_stock ?></p>
                        <a href="index.php?Id=<?php echo $product_id; ?>&Token=<?php echo hash_hmac('sha256', $product_id, KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
                    </div>  
<?php
                }
            }
        } else {
            echo "error en token";
            exit;
        }
    }
}

?>