<?php
require('models/products/products.php');
require('models/auth/components.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tecno-Total </title>
</head>

<body>
  <header>
    <?php
      user_verification();
    ?>
  </header>
  <main>
    <?php
    browse_products();
    ?>
  </main>
</body>

</html>