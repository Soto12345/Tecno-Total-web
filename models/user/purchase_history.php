<?php
function purchase_history()
{
    global $connection;
    $user_name = $_SESSION['usuario'];
    $sql = "SELECT id_ticket,nombre_producto,cantidad,monto,fecha FROM ticket WHERE nombre_usuario='$user_name'";
    $result = $connection->run_query($sql);
?>
    <table>
        <tbody>
            <tr>
                <th>Id ticket</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>monto</th>
                <th>Fecha</th>
                <th>------</th>
            </tr>
            <?php $total = 0; ?>
            <?php while ($fila = mysqli_fetch_assoc($result)) {
                $product_name=$fila['nombre_producto'];
                echo "<tr>";
                echo '<td>' . $fila['id_ticket'] . '</td>';
                echo '<td>' . $fila['nombre_producto'] . '</td>';
                echo '<td>' . $fila['cantidad'] . '</td>';
                echo '<td>$' . $fila['monto'] . '</td>';
                echo '<td>' . $fila['fecha'] . '</td>';
            ?>
                <td>
                <a href="index.php?Comentary=<?php echo $product_name; ?>&Token=<?php echo hash_hmac('sha256', $product_name, KEY_TOKEN); ?>">Reseñar producto</a>
                </td>
            <?php
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