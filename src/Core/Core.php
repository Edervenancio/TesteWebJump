<?php 

namespace Source\Core; 

class Core 
{

    public function manageQuery($url)
    {
        $directory = "Source\\Controller\\";

       
        if (isset($url['pagina'])) {
            $correspodentController = $directory . ucfirst($url['pagina'] . 'Controller');
        } else {
            $correspodentController = $directory . "ProductController";
        }

        if (isset($url['method'])) {
            $acao = $url['method'];
        } else {
            $acao = 'index';
        } 

        if(!class_exists($correspodentController)) {
           $correspodentController = $directory . "ProductController";
        } 

        if (isset($url['id']) && $url['id'] != null) {
            $id = $url['id'];
        } else {
            $id = null;
        }

      
        echo '<pre>';
        var_dump($correspodentController, $acao);
        echo '</pre>';

        call_user_func_array(array(new $correspodentController, $acao), array($id));

    }


}