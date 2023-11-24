<?php
function delete_product()
{
    global  $connection;
    $sql_name = "SELECT Nombre_producto FROM producto";
    $result_name = $connection->run_query($sql_name);
?>
    <h1>Eliminar producto</h1>


    <form method="POST">
        <label for="options">nombres:</label>
        <select id="options" name="product_name" required>
            <?php
            while ($fila = mysqli_fetch_assoc($result_name)) {
                $name = $fila['Nombre_producto'];
            ?>
                <option value='<?php echo $name ?>'><?php echo $name ?></option>
            <?php
            }
            ?>

        </select>
        <button name="btnDelete" type="submit">Enviar</button>
    </form>
<?php
}

?>