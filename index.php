<?php 

require_once __DIR__ . "./vendor/autoload.php";

use Source\Core\Core;
use Source\Controller\ProductController;

$quantidadeRegistrosAdicionados = new ProductController();
$selectAll = new ProductController();
$paginateLink = new ProductController();
$core = new Core();
$core->manageQuery($_GET);

?>
<!doctype html>
<html lang='pt-br'>
<head>
  <title>Webjump | Backend Test | Dashboard</title>
  <meta charset="utf-8">

<link  rel="stylesheet" type="text/css"  media="all" href="./assets/css/style.css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
<meta name="viewport" content="width=device-width,minimum-scale=1">
<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
<script async src="https://cdn.ampproject.org/v0.js"></script>
<script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script></head>
  <!-- Header -->
<amp-sidebar id="sidebar" class="sample-sidebar" layout="nodisplay" side="left">
  <div class="close-menu">
    <a on="tap:sidebar.toggle">
      <img src="./assets/images/bt-close.png" alt="Close Menu" width="24" height="24" />
    </a>
  </div>
  <a href="dashboard.html"><img src="./assets/images/menu-go-jumpers.png" alt="Welcome" width="200" height="43" /></a>
  <div>
    <ul>
      <li><a href="./src/view/categories.php" class="link-menu">Categorias</a></li>
      <li><a href="./src/view/products.php" class="link-menu">Produtos</a></li>
    </ul>
  </div>
</amp-sidebar>
<header>
  <div class="go-menu">
    <a on="tap:sidebar.toggle">☰</a>
    <a href="./index.php" class="link-logo"><img src="./assets/images/go-logo.png" alt="Welcome" width="69" height="430" /></a>
  </div>
  <div class="right-box">
    <span class="go-title">Administration Panel</span>
  </div>    
</header>  
<!-- Header -->
  <!-- Main Content -->
  <main class="content">
    <div class="header-list-page">
      <h1 class="title">Dashboard</h1>
    </div>
    <div class="infor">
      <h1>Registros adicionados: <?php echo $quantidadeRegistrosAdicionados->contarRegistros() ?> </h1>
       <a href="./src/view/addProduct.php" class="btn-action">Add new Product</a>

       
    </div>
    <ul class="product-list">
      <?php foreach($selectAll->index() as $value){ ?>
        

      <li>
        <div class="product-image">
          <img src="./assets/images/product/tenis-runner-bolt.png" layout="responsive" width="164" height="145" alt="Tênis Runner Bolt" />
        </div>

        <div class="product-info">
          <div class="product-name"><a href="?pagina=product&method=pageProduct&id=<?= $value['id'] ?>"><?php echo substr($value['nome'], 0, 10) . '...';?></a></div>
          <div class="product-price"><span class="special-price"><?php echo $value['quantidade'];?> available</span> <span><?php echo $value['preco']; ?></span></div>
        </div>
      </li>

      <?php }?>

      <div class="containerPagination">
        <?php 
        
        if($quantidadeRegistrosAdicionados->contarRegistros())
        {
        foreach ($paginateLink->contarPaginasLink() as $numberPages) { ?>
          <a href="?pagina=<?= $numberPages ?>" class="category-link"><?php echo $numberPages ?></a>
        <?php }}?>
      </div>
     
      
      
    </ul>
  </main>
  <!-- Main Content -->

  <!-- Footer -->
<footer>
	<div class="footer-image">
	  <img src="./assets/images/go-jumpers.png" width="119" height="26" alt="Go Jumpers" />
	</div>
	<div class="email-content">
	  <span>go@jumpers.com.br</span>
	</div>
</footer>
 <!-- Footer --></body>
</html>
