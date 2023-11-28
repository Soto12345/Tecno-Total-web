<?php
session_start();
require('models/shooping_cart/cart.php');
require('models/shooping_cart/sign_off_cart.php');
require('models/products/products.php');
require('models/auth/components.php');
require('models/products/category.php');
require('models/products/details.php');
require('models/pay/pay.php');
require('models/products/process_product.php');
require('models/products/add_products.php');
require('models/products/modify_products.php');
require('models/products/delete_products.php');
require('models/pay/pay_history.php');
require('models/user/purchase_history.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!--Importando las librerias de boostrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Replace the "test" client-id value with your client-id -->
  <script src="https://www.paypal.com/sdk/js?client-id=ARaJ_-lZ2bImQWLMJIrYbZu5_n1Vf0uF6ClGgqduTPpf3uRk3NqMH-BU94qh1DQG1a06xZb6fPQt7RDF&currency=MXN"></script>
  <!--Link hacia los css correspondientes-->
  <link rel="stylesheet" href="css\component.css"> 
  <link rel="stylesheet" href="css\product.css"> 
  <title>Tecno-Total</title>
</head>

<body>
<!--Aqui pego los archivos completos de la libreria de Boostrap-->

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
    }else if(isset($_GET['add'])){
      add_products();
    }else if(isset($_GET['delete'])){
      delete_product();
    }else if(isset($_GET['update'])){
      update_product();
    }else if(isset($_GET['administrator_history'])){
      pay_history_administrator();
    }else if(isset($_GET['purchase_history'])){
      purchase_history();
    }else{
      browse_products();
    }
    ?>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eKJ1jzgDP4l96e3r3LxAInYUz9gqJofY9qAC8hJ+9a3Hi2ymYVCkUOQbYdMHJk1" crossorigin="anonymous"></script>
</body>

</html>