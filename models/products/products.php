<?php
require('C:/xampp/htdocs/Tecno-Total-web/models/conf/connection.php');
class Product_DB
{
    //atributos
    private $product_name;
    private $product_price;
    private $stock;
    private $category;

    public function __construct()
    {
        $this->product_name = "";
        $this->product_price = 0;
        $this->stock = 0;
    }
    //setters
    public function setProduct_name($product_name)
    {
        $this->product_name = $product_name;
    }
    public function setProduct_price($product_price)
    {
        $this->product_price = $product_price;
    }
    public function setStock($stock)
    {
        $this->stock = $stock;
    }
    public function setCategory($category)
    {
        $this->category = $category;
    }
    //getters
    public function getProduct_name()
    {
        return $this->product_name;
    }
    public function getProduct_price()
    {
        return $this->product_price;
    }
    public function getStock()
    {
        return $this->stock;
    }
    public function getCategory()
    {
        return $this->category;
    }
}

function browse_products()
{
    global $connection;
    $sql = "SELECT *FROM producto";
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


<!--TODO: Tratar de acomodar bien las cards-->
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
    } else {
        echo "error en la conexion";
    }
}
?>