<?php
function add_products()
{
?>
    <h1>Agregar producto</h1>
    <form method="POST">
        <input type="text" name="product_name" id="product_name" placeholder="Escribe Nombre del producto" required>

        <input type="text" name="product_description" id="product_description" placeholder="Escribe la descripcion del producto" required>

        <input type="number" name="product_price" id="product_price" placeholder="Escribe el precio del producto" required>

        <label for="options">Categoria:</label>
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

        <input type="text" name="product_image" id="product_image" placeholder="agrega el url de la imagen">

        <input type="number" name="product_stock" id="product_stock" placeholder="Escribe la cantidad a poner para el producto" required>

        <button name="btnAdd" type="submit">Enviar</button>
    </form>
<?php
}

?>