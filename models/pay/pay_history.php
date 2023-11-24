<?php
function pay_history_administrator()
{
    global $connection;
    $sql = "SELECT id_ticket,id_client,nombre_usuario,nombre_producto,cantidad,monto,estado,fecha,email FROM ticket";
    $result = $connection->run_query($sql);
?>
    <table>
        <tbody>
            <tr>
                <th>Id ticket</th>
                <th>Id Cliente</th>
                <th>Nombre</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Monto</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Email</th>
            </tr>
            <?php $total = 0; ?>
            <?php while ($fila = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo '<td>' . $fila['id_ticket'] . '</td>';
                echo '<td>' . $fila['id_client'] . '</td>';
                echo '<td>' . $fila['nombre_usuario'] . '</td>';
                echo '<td>' . $fila['nombre_producto'] . '</td>';
                echo '<td>' . $fila['cantidad'] . '</td>';
                echo '<td>$' . $fila['monto'] . '</td>';
                echo '<td>' . $fila['estado'] . '</td>';
                echo '<td>' . $fila['fecha'] . '</td>';
                echo '<td>' . $fila['email'] . '</td>';
                echo "</tr>";
                $total = $total + ($fila['monto'] * $fila['cantidad']);
            } ?>
            <tr>
                <td>
                    <h3>TOTAL:</h3>
                </td>
                <td>
                    <h3>$<?php echo number_format($total, 2); ?></h3>
                </td>
            </tr>
        </tbody>
    </table>
<?php
}
?>