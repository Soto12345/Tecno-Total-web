   <?php
   function list_cart(){
    ?>
    <h1>LISTA DE COMPRAS:</h1>
    <?php if ((empty($_SESSION['CART']))) {
    ?>
        <h2>No hay productos en el carrito</h2>
    <?php
    } else {
    ?>
        <table class="table table-height table-bordered">
            <tbody>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th>---</th>
                </tr>
                <?php $total = 0; ?>
                <?php foreach ($_SESSION['CART'] as $index => $product) { ?>
                    <tr>
                        <td><?php echo $product['product_id']; ?></td>
                        <td><?php echo $product['product_name']; ?></td>
                        <td><img src="<?php echo $product['product_image']; ?>"width="100" height="100"></td>
                        <td><?php echo $product['product_stock']; ?></td>
                        <td>$<?php echo $product['product_price']; ?></td>
                        <td>$<?php echo number_format($product['product_price'] * $product['product_stock'], 2); ?></td>
                        <td>
                            <form action="" method="POST">
                                <input type="hidden" name="product_id" id="product_id" value="<?php echo openssl_encrypt($product['product_id'], COD, KEY_CARRITO); ?>">
                                <button type="submit" class="btn btn-danger" name="btn_eliminar" value="ELIMINAR">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php $total = $total + ($product['product_price'] * $product['product_stock']); ?>
                <?php } ?>
                <tr>
                    <td>
                        <h3>TOTAL</h3>
                    </td>
                    <td>
                        <h3>$<?php echo number_format($total, 2); ?></h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#">PROCEDER A PAGAR</a>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php
    }
    ?>
    <?php
   }
   ?>
   
   
