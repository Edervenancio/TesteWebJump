<?php 

namespace Source\Controller;

use Source\Model\Produto;

class ProductController
{


    public function index()
     {
       
        $db = new MySQL();
        $selectAll = new Produto($db);

        return $selectAll->paginar();
        }

    public function contarRegistros()
    {
        $db = new MySQL();
        $registros = new Produto($db);
        return $registros->contarRegistrosProdutos();
    }


    public function contarPaginasLink()
    {
    $db = new MySQL();
    $data = new Produto($db);

    return $data->contarPaginas();
    }

    public function pageProduct($id) 
    {
       
         $db = new MySQL();
         $create = new Produto($db);
         return $create->createPage($id);

    }

    public function pageUpdate($id)
    {
        $db = new MySQL();
        $create = new Produto($db);
        return $create->updatePageProduct($id);
    }

    public function delete($id)
    {
        $db = new MySQL();
        $delete = new Produto($db);

        return $delete->deletarProduto($id);
    }

    public function show($id) 
    {
       
         $db = new MySQL();
         $show = new Produto($db);
         return $show->showProduct($id);

    }
    
    public function storeProductUpdate()
    {
        $db = new MySQL();
        $storeUpdate = new Produto($db);
        $storeUpdate->storeUpdate($_POST);
        header('Location: products.php');

        
    }
    
    public function insert()
    {

     $db = new MySQL();
     $insert = new Produto($db);
     $insert->inserirProduto($_POST);
     header('Location: products.php');

     
     
    }
    
}