<?php
session_start();
require('models/shooping_cart/cart.php');
require('models/products/products.php');
require('models/auth/components.php');
require('models/products/category.php');
require('models/products/details.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    } else if(isset($_GET['Cart'])){
      list_cart();
    }else{
      browse_products();
    }
    ?>
  </main>
</body>

</html>