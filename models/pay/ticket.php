<?php
require('../conf/connection.php');
session_start();
global $connection;
$Client_ID = 'ARaJ_-lZ2bImQWLMJIrYbZu5_n1Vf0uF6ClGgqduTPpf3uRk3NqMH-BU94qh1DQG1a06xZb6fPQt7RDF';
$Secret = 'EKAUavyoaR8O7PjnC-Ee0XATTUcYCAwHzkfPqWt9MX2ESFaVkuCH6C_uMDNTrTBFGJsJp0QU2UTB81Rt';

// Llamada a la página de PayPal para extraer los datos del comprador
$login = curl_init("https://api-m.sandbox.paypal.com/v1/oauth2/token");
curl_setopt($login, CURLOPT_RETURNTRANSFER, True);
curl_setopt($login, CURLOPT_USERPWD, $Client_ID . ":" . $Secret);
curl_setopt($login, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

// Extracción del token de la venta
$answer_login = curl_exec($login);
$answer_object = json_decode($answer_login);
$access_token = $answer_object->access_token;

// Extracción de los datos del comprador
$order = curl_init("https://api-m.sandbox.paypal.com/v1/checkout/orders/" . $_GET['paymentID']);
curl_setopt($order, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . $access_token));
curl_setopt($order, CURLOPT_RETURNTRANSFER, True);
$answer_data = curl_exec($order);
$object_answer_data = json_decode($answer_data);
curl_close($login);
curl_close($order);

$id_ticket = $object_answer_data->id;
$amount = $object_answer_data->gross_total_amount->value;
$status = $object_answer_data->status;
$date = $object_answer_data->update_time;
$new_date = date('Y-m-d H:i:s', strtotime($date));
$email = $object_answer_data->payer->email_address;
$id_client = $object_answer_data->payer->payer_id;
$name_user = $_SESSION['usuario'];

// Inserción en la tabla ticket
foreach ($_SESSION['CART'] as $index => $product) {
    $product_name = $product['product_name'];
    $product_stock = $product['product_stock'];
    $amount = $product['product_price'];
    $sql = "INSERT INTO ticket(id_ticket,id_client,nombre_usuario,nombre_producto,cantidad,monto,estado,fecha,email) VALUES('$id_ticket','$id_client','$name_user','$product_name','$product_stock','$amount','$status','$new_date','$email')";
    $connection->run_query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>TICKET</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="display-4">¡PROCESO FINALIZADO!</h1>
                <hr class="my-4">
                <strong>Tu lista de compras:</strong>
                <div class="card mt-3">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Status</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                <?php foreach ($_SESSION['CART'] as $index => $product) { ?>
                                    <tr>
                                        <td><?php echo $new_date; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td><?php echo $product['product_name']; ?></td>
                                        <td><?php echo $product['product_stock']; ?></td>
                                        <td>$<?php echo $product['product_price']; ?></td>
                                        <td>$<?php echo number_format($product['product_price'] * $product['product_stock'], 2); ?></td>
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
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="text-center">
                            <a href="../user/sign_off.php" class="btn btn-primary">Finalizar sesión</a>
                            <a href="../../index.php?cart_off=yes" class="btn btn-success">Continuar comprando</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
