<?php 

namespace Source\Model;

use Exception;
use Source\Controller\DatabaseInterface;

class Categoria 

{

    private $dbConnection;

    public function __construct(DatabaseInterface $dbConnection) {
        $this->dbConnection = $dbConnection;
    }



    public function storeUpdate($dadosPost)
    {
        $pdo = $this->dbConnection->conectar();

        $sql = "UPDATE categoria SET nome = :nom WHERE codigo = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':nom', $dadosPost['nome']);
        $sql->bindValue(':id', $dadosPost['codigo']);
        $resultado = $sql->execute();

        
        if ($resultado == 0) {
            throw new Exception("Falha ao alterar Categoria");
            return false;
        }

        return true;
    }

    public function showCategoria($id) {
        $pdo = $this->dbConnection->conectar();
        $sql = "SELECT * FROM categoria where codigo = :id LIMIT 1";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("id", $id);
        $sql->execute();
        $result = $sql->fetchAll();
        return $result;
    }

    public function deleteCategoria($id)
    {

        $pdo = $this->dbConnection->conectar();

            $child = "DELETE FROM product WHERE categoria = :id";
			$parent = "DELETE FROM categoria WHERE codigo = :id";
            $child = $pdo->prepare($child);
            $child->bindValue(':id', $id);
            $child->execute();
			$parent = $pdo->prepare($parent);
			$parent->bindValue(':id', $id);
			$resultado = $parent->execute();

			if ($resultado == 0) {
				throw new Exception("Falha ao deletar Categoria");

				return false;
			}

			return true;
		}

    public function inserirCategoria($dadosPost)
    {
        if(empty($dadosPost)){
            throw new Exception("Preencha todos os campos");
            return false;
        }

        $pdo = $this->dbConnection->conectar();

			$sql = $pdo->prepare('INSERT INTO categoria (nome) VALUES (:nome)');
			$sql->bindValue(':nome', $dadosPost['nome']);
			$res = $sql->execute();


            if($res == 0)
            {
                throw new Exception("Falha ao inserir Categoria");
                return false;
            }
            return true;
    }

    public function listCategoriaInput()
    {
        $pdo = $this->dbConnection->conectar();
       $sql = "SELECT * FROM categoria ORDER BY codigo ASC";
       $statement = $pdo->query($sql);
       $statement->execute();
       return $statement->fetchAll();
      $pdo = null;
   }

   public function sendToCreatePage($id)
   {
    header('Location: EditCategoria.php?id=' . $id);

   }

   public function paginateCategoria()
   {
       $pdo = $this->dbConnection->conectar();


       /* 
       * a variável $limiteDados é estritamente relacionada ao segundo termo da criação da variável
       * $lastpage na function contarPaginas() para a paginação.
       * */
       $limiteDados = 5;
       $numeroPagina = 1;
       if(isset($_GET['pagina'])){
           $numeroPagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);
       } if(!$numeroPagina){
           $numeroPagina = 1;
       }
       $inicio = ($numeroPagina * $limiteDados) - $limiteDados;
       $sql = "SELECT codigo, nome FROM categoria ORDER BY nome limit $inicio, $limiteDados";
       $statement = $pdo->prepare($sql);
       $statement->execute();

       return $statement->fetchAll();
       $pdo = null;
   }


   // funçao responsavel por contar quantas paginas serao geradas na paginacao
   public function contarPaginas()
   {
       $pdo = $this->dbConnection->conectar();
       $count = "SELECT count(*) FROM categoria WHERE codigo >= 1"; 
       $result = $pdo->prepare($count);
       $result->execute();
       $numeroTabelas = $result->fetchColumn(); 
       $lastPage = ceil($numeroTabelas / 5);
       $numerosDeLinks = range(1, $lastPage);

       return $numerosDeLinks;
       
   }
    
}