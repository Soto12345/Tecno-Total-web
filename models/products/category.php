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

<div class="col-md-3">
    <div class="card">
        <h3 class="card-title"><?php echo $product_name ?></h3>
        <img class="img-fluid" src="<?php echo $product_image ?>">
        <div class="card-body" >
            <p class="card-text"><?php echo $product_description ?></p>
            <p class = "card-text">Stock: <?php echo $product_stock?></p>
            <h5>Precio: $<?php echo $product_price ?></h5>
            <button style="background-color:black" class="btn"><a style="text-decoration:none" href="index.php?Id=<?php echo $product_id; ?>&Token=<?php echo hash_hmac('sha256', $product_id, KEY_TOKEN); ?>">Detalles</a></button>
        </div>
    </div>
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