<?php
function pay()
{
    $total = 0;
        foreach ($_SESSION['CART'] as $index => $product) {
            $total = $total + ($product['product_stock'] * $product['product_price']);
        }
?>
    <h5>cuenta para prueba: sb-sh1ji27450968@business.example.com</h5>
    <h5>contraseña de la cuenta: iBI3!Pl2</h5>
    <h1>!ETAPA DE PAGO¡</h1>
    <hr>
    <p>
        En esta etapa se realizara el pago de:
    <h3>$<?php echo number_format($total, 2) ?></h3>
    <div id="paypal-button-container"></div>
    </p>
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
<?php
}
?>