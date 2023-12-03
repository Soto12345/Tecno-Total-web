<?php
function pay()
{
    $total = 0;
    foreach ($_SESSION['CART'] as $index => $product) {
        $total = $total + ($product['product_stock'] * $product['product_price']);
    }
?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Cuenta para prueba:</h5>
                <p class="card-text">sb-sh1ji27450968@business.example.com</p>
                <h5 class="card-title">Contraseña de la cuenta:</h5>
                <p class="card-text">iBI3!Pl2</p>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <h1 class="card-title text-white bg-primary p-2">¡ETAPA DE PAGO!</h1>
                <hr>
                <p class="card-text">
                    En esta etapa se realizará el pago de:
                    <h3>$<?php echo number_format($total, 2) ?></h3>
                </p>

                <!-- Contenedor para centrar los botones -->
                <div class="d-flex justify-content-center">
                    <div id="paypal-button-container"></div>
                </div>
                <script>
                    paypal.Buttons({
                        style: {
                            color: 'blue',
                            shape: 'pill',
                            label: 'pay'
                        },
                        createOrder: function(data, actions) {
                            return actions.order.create({
                                purchase_units: [{
                                    amount: {
                                        value: <?php echo $total ?>
                                    },
                                }]
                            });
                        },
                        onApprove: function(data, actions) {
                            actions.order.capture().then(function(detalles) {
                                console.log(detalles);
                                console.log(data);
                                alert("PAGO EXITOSO");
                                alert("PAGO EN PROCESO, POR FAVOR ESPERE");
                                window.location = "models/pay/ticket.php?paymentID=" + data.paymentID;
                            });
                        },
                        onCancel: function(data) {
                            alert("Pago cancelado");
                            console.log(data);
                        },
                        onError: function(err) {
                            // Manejo de errores
                            console.error(err);
                        }
                    }).render('#paypal-button-container');
                </script>
            </div>
        </div>
    </div>
<?php
}
?>
