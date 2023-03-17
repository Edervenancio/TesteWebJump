<?php

require_once __DIR__ . "../../../vendor/autoload.php";

use Source\Controller\ProductController;
use Source\Controller\ShowProductController;

$show = new ProductController();

?>

<!doctype html>
<html lang='pt-br'>

<head>
  <title>Webjump | Backend Test | Products</title>
  <meta charset="utf-8">

  <link rel="stylesheet" type="text/css" media="all" href="../../assets/css/style.css" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
  <meta name="viewport" content="width=device-width,minimum-scale=1">
  <style amp-boilerplate>
    body {
      -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
      -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
      -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
      animation: -amp-start 8s steps(1, end) 0s 1 normal both
    }

    @-webkit-keyframes -amp-start {
      from {
        visibility: hidden
      }

      to {
        visibility: visible
      }
    }

    @-moz-keyframes -amp-start {
      from {
        visibility: hidden
      }

      to {
        visibility: visible
      }
    }

    @-ms-keyframes -amp-start {
      from {
        visibility: hidden
      }

      to {
        visibility: visible
      }
    }

    @-o-keyframes -amp-start {
      from {
        visibility: hidden
      }

      to {
        visibility: visible
      }
    }

    @keyframes -amp-start {
      from {
        visibility: hidden
      }

      to {
        visibility: visible
      }
    }
  </style><noscript>
    <style amp-boilerplate>
      body {
        -webkit-animation: none;
        -moz-animation: none;
        -ms-animation: none;
        animation: none
      }
    </style>
  </noscript>
  <script async src="https://cdn.ampproject.org/v0.js"></script>
  <script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
  <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
</head>


<body>
  <table class="data-grid">
    <tr class="data-row">

      <th class="data-grid-th">
        <span class="data-grid-cell-content">Name</span>
      </th>
      <th class="data-grid-th">
        <span class="data-grid-cell-content">SKU</span>
      </th>
      <th class="data-grid-th">
        <span class="data-grid-cell-content">Price</span>
      </th>
      <th class="data-grid-th">
        <span class="data-grid-cell-content">Quantity</span>
      </th>
      <th class="data-grid-th">
        <span class="data-grid-cell-content">Categories</span>
      </th>
    </tr>
    <tr class="data-row">
      <?php


      foreach ($show->show($_GET['id']) as $value) { ?>

        <td class="data-grid-td">
          <span class="data-grid-cell-content"><?php echo $value['nome'] ?></span>
        </td>


        <td class="data-grid-td">
          <span class="data-grid-cell-content"><?php echo $value['sku'] ?></span>
        </td>

        <td class="data-grid-td">
          <span class="data-grid-cell-content"><?php echo $value['preco'] ?></span>
        </td>

        <td class="data-grid-td">
          <span class="data-grid-cell-content"><?php echo $value['quantidade'] ?></span>
        </td>

        <td class="data-grid-td">
          <span class="data-grid-cell-content"><?php echo $value['categoria'] ?></span>
        </td>
      <?php } ?>



    </tr>

  </table>
  </main>
  <footer>
</body>

</html>