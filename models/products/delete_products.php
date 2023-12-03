<?php
function delete_product()
{
    global  $connection;
    $sql_name = "SELECT Nombre_producto FROM producto";
    $result_name = $connection->run_query($sql_name);
?>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Eliminar producto</h1>

            <form method="POST">
                <div class="form-group">
                    <label for="options">Nombres:</label>
                    <select class="form-control" id="options" name="product_name" required>
                        <?php
                        while ($fila = mysqli_fetch_assoc($result_name)) {
                            $name = $fila['Nombre_producto'];
                        ?>
                            <option value='<?php echo $name ?>'><?php echo $name ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <button name="btnDelete" type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
<?php
}
?>
