<?php
session_start();
require('models/shooping_cart/cart.php');
require('models/shooping_cart/sign_off_cart.php');
require('models/products/products.php');
require('models/auth/components.php');
require('models/products/category.php');
require('models/products/details.php');
require('models/pay/pay.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Replace the "test" client-id value with your client-id -->
  <script src="https://www.paypal.com/sdk/js?client-id=ARaJ_-lZ2bImQWLMJIrYbZu5_n1Vf0uF6ClGgqduTPpf3uRk3NqMH-BU94qh1DQG1a06xZb6fPQt7RDF&currency=MXN"></script>
  <title>Tecno-Total</title>
</head>

<body>
  <header>
    <?php
    user_verification();
    ?>
  </header>
  <main>
    <?php
    if (isset($_GET['Categoria']) && isset($_GET['Token'])) {
      category();
    } else if (isset($_GET['Id']) && isset($_GET['Token'])) {
      details();
    } else if (isset($_GET['Cart'])) {
      list_cart();
    } else if (isset($_GET['pay'])) {
      pay();
    } else if(isset($_GET['cart_off'])){
      sign_off_cart();
    }else{
      browse_products();
    }
    ?>
  </main>
</body>

</html>