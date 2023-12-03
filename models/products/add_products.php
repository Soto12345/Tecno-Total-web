<?php
function add_products()
{
?>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Agregar producto</h1>
            <form method="POST">
                <div class="form-group">
                    <label for="product_name">Nombre del producto:</label>
                    <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Escribe el nombre del producto" required>
                </div>

                <div class="form-group">
                    <label for="product_description">Descripción del producto:</label>
                    <input type="text" class="form-control" name="product_description" id="product_description" placeholder="Escribe la descripción del producto" required>
                </div>

                <div class="form-group">
                    <label for="product_price">Precio del producto:</label>
                    <input type="number" class="form-control" name="product_price" id="product_price" placeholder="Escribe el precio del producto" required>
                </div>

                <div class="form-group">
                    <label for="options">Categoría:</label>
                    <select class="form-control" id="options" name="product_category" required>
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
                    <label for="product_image">URL de la imagen:</label>
                    <input type="text" class="form-control" name="product_image" id="product_image" placeholder="Agrega el URL de la imagen">
                </div>

                <div class="form-group">
                    <label for="product_stock">Cantidad en stock:</label>
                    <input type="number" class="form-control" name="product_stock" id="product_stock" placeholder="Escribe la cantidad en stock" required>
                </div>

                <button name="btnAdd" type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
<?php
}
?>
