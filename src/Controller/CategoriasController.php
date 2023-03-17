<?php 

namespace Source\Controller;
use Source\Model\Categoria;
class CategoriasController 
{

    public function paginar()
    {
       $db = new MySQL();
       $data = new Categoria($db);

       return $data->paginateCategoria();
    }

    public function insert()
    {
        $db = new MySQL();
        $insert = new Categoria($db);
        $insert->inserirCategoria($_POST);
        header('Location: categories.php');
    }
    
    public function show($id) 
    {
       
         $db = new MySQL();
         $show = new Categoria($db);
         return $show->showCategoria($id);

    }

    public function delete($id)
    {
        $db = new MySQL();
        $delete = new Categoria($db);
        header('Location: categories.php');   
        return $delete->deleteCategoria($id);

    }

    public function storeCategoriaUpdate()
    {
        $db = new MySQL();
        $storeUpdate = new Categoria($db);
        $storeUpdate->storeUpdate($_POST);
        header('Location: categories.php');   

    }

    public function listarInput()
     {
       
        $db = new MySQL();
        $listar = new Categoria($db);
        $result = $listar->listCategoriaInput();

        return $result;


     }

     
    public function pageUpdate($id)
    {
        $db = new MySQL();
        $create = new Categoria($db);
        return $create->sendToCreatePage($id);
    }

    public function gerarLinkPaginacao()
    {
        $db = new MySQL();
        $countLink = new Categoria($db);
        return $countLink->contarPaginas();
    }
    
}