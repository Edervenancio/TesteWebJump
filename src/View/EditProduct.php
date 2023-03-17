<?php 
require_once __DIR__ . "../../../vendor/autoload.php";

use Source\Controller\ListarCategoriaInput;
use Source\Controller\ProductController;
use Source\Core\Core;
$inputPopulate = new ProductController();
$listarInput = new ListarCategoriaInput();
$core = new Core();
$core->manageQuery($_GET);



?>

<!doctype html>
<html ⚡>
<head>
  <title>Webjump | Backend Test | Add Product</title>
  <meta charset="utf-8">

<link  rel="stylesheet" type="text/css"  media="all" href="../../assets/css/style.css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
<meta name="viewport" content="width=device-width,minimum-scale=1">
<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
<script async src="https://cdn.ampproject.org/v0.js"></script>
<script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script></head>
  

<!-- Header -->
  <!-- Main Content -->
  <main class="content">
    <h1 class="title new-item">Edit Product</h1>
    
    
  <form method="POST" action="?pagina=product&method=storeProductUpdate&id=<?php echo $_GET['id']?>">
     
    <?php foreach($inputPopulate->show($_GET['id']) as $value){ ?>

      <div class="input-field">
        <label for="name" class="label">Product Id</label>
        <input type="text" id="name" name="id" class="input-text" value="<?php echo $value['id']?>" /> 
      </div>

      <div class="input-field">
        <label for="name" class="label">Product Name</label>
        <input type="text" id="name" name="nome" class="input-text" value="<?php echo $value['nome']?>" /> 
      </div>
      <div class="input-field">
        <label for="price" class="label">Price</label>
        <input type="text" id="price" name="preco" class="input-text"  value="<?php echo $value['preco']?>"/> 
      </div>
      <div class="input-field">
        <label for="quantity" class="label">Quantity</label>
        <input type="text" id="quantity" name="quantidade" class="input-text"  value="<?php echo $value['quantidade']?>"/> 
      </div>

      <div class="input-field">
        <label for="description" class="label">Description</label>
        <textarea id="description" name="descricao"class="input-text"><?php echo $value['descricao']?></textarea>
      </div>
      <?php } ?>
      <div class="input-field">
        <label for="category" class="label">Categories</label>
        <select multiple id="categoria" name='categoria' class="input-text">
         
        <?php

     
foreach ($listarInput->listarTodos() as $value) {
  echo  "<option>" . $value['codigo'] . "</option>";
}
 ?>

      </select>
      </div>
      
      <div class="actions-form">
        <a href="./products.php" class="action back">Back</a>
        <input class="btn-submit btn-action" type="submit" value="Update Product" />
      </div>
      
    </form>
  </main>
  <!-- Main Content -->

  <!-- Footer -->
<footer>
	<div class="footer-image">
	  <img src="../../assets/images/go-jumpers.png" width="119" height="26" alt="Go Jumpers" />
	</div>
	<div class="email-content">
	  <span>go@jumpers.com.br</span>
	</div>
</footer>
 <!-- Footer --></body>
</html>
