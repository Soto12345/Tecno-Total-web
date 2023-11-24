<?php

function update_product()
{
    global $connection;
    $name_verification = "SELECT Nombre_producto FROM producto";
    $result_name = $connection->run_query($name_verification);
?>
    <h1>actualizar producto</h1>
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

        <input type="text" name="new_product_name" id="product_name" placeholder="Escribe el nuevo nombre" required>

        <input type="text" name="product_description" id="product_description" placeholder="Escribe nueva descripcion" required>

        <input type="number" name="product_price" id="product_price" placeholder="Escribe precio nuevo" required>

        <label for="options">nueva categoria:</label>
        <select id="options" name="product_category" required>
            <option value="almacenamiento.hdd">almacenamiento-hdd</option>
            <option value="almacenamiento.ssd">almacenamiento-ssd</option>
            <option value="componentes.grafica">componentes-grafica</option>
            <option value="componentes.ram">componentes-ram</option>
            <option value="componentes.motherboard">componentes-motherboard</option>
            <option value="dispositivos.teclado">dispositivos-teclado</option>
            <option value="dispositivos.monitor">dispositivos-monitor</option>
            <option value="dispositivos.mouse">dispositivos-mouse</option>
        </select>

        <input type="text" name="product_image" id="product_image" placeholder="agrega nueva imagen">

        <input type="number" name="product_stock" id="product_stock" placeholder="escribe cantidad nueva" required>

        <button name="btnUpdate" type="submit">Enviar</button>
    </form>

<?php
}
?>