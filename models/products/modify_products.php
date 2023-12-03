<?php
function update_product()
{
    global $connection;
    $name_verification = "SELECT Nombre_producto FROM producto";
    $result_name = $connection->run_query($name_verification);
?>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Actualizar producto</h1>
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

                <div class="form-group">
                    <label for="new_product_name">Nuevo nombre:</label>
                    <input type="text" class="form-control" name="new_product_name" id="new_product_name" placeholder="Escribe el nuevo nombre" required>
                </div>

                <div class="form-group">
                    <label for="product_description">Nueva descripción:</label>
                    <input type="text" class="form-control" name="product_description" id="product_description" placeholder="Escribe la nueva descripción" required>
                </div>

                <div class="form-group">
                    <label for="product_price">Nuevo precio:</label>
                    <input type="number" class="form-control" name="product_price" id="product_price" placeholder="Escribe el nuevo precio" required>
                </div>

                <div class="form-group">
                    <label for="new_options">Nueva categoría:</label>
                    <select class="form-control" id="new_options" name="product_category" required>
                        <option value="almacenamiento.hdd">Almacenamiento HDD</option>
                        <option value="almacenamiento.ssd">Almacenamiento SSD</option>
                        <option value="componentes.grafica">Componentes Gráficos</option>
                        <option value="componentes.ram">Componentes RAM</option>
                        <option value="componentes.motherboard">Componentes Motherboard</option>
                        <option value="dispositivos.teclado">Dispositivos Teclado</option>
                        <option value="dispositivos.monitor">Dispositivos Monitor</option>
                        <option value="dispositivos.mouse">Dispositivos Mouse</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="product_image">Nueva imagen:</label>
                    <input type="text" class="form-control" name="product_image" id="product_image" placeholder="Agrega la nueva imagen">
                </div>

                <div class="form-group">
                    <label for="product_stock">Nueva cantidad en stock:</label>
                    <input type="number" class="form-control" name="product_stock" id="product_stock" placeholder="Escribe la nueva cantidad en stock" required>
                </div>

                <button name="btnUpdate" type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>

<?php
}
?>
