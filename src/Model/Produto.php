<?php


namespace Source\Model;

use Exception;
use Source\Controller\DatabaseInterface;

class Produto {

    private $dbConnection;

    public function __construct(DatabaseInterface $dbConnection) {
        $this->dbConnection = $dbConnection;
    }





    public function showProduct($id) {
        $pdo = $this->dbConnection->conectar();
        $sql = "SELECT * FROM product where id = :id LIMIT 1";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("id", $id);
        $sql->execute();
        $result = $sql->fetchAll();
        return $result;
    }

    public function deletarProduto($id) {
        $pdo = $this->dbConnection->conectar();
        $sql = "DELETE FROM product WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $resultado = $sql->execute();

        if ($resultado == 0) {
            throw new Exception("Falha ao deletar produto");

            return false;
        }

        return true;
    }


    public function storeUpdate($dadosPost) {


        $pdo = $this->dbConnection->conectar();

        $sql = "UPDATE product SET nome = :nom, descricao = :descr, 
                      quantidade = :quant, preco = :prec, categoria = :categ WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':nom', $dadosPost['nome']);
        $sql->bindValue(':descr', $dadosPost['descricao']);
        $sql->bindValue(':quant', $dadosPost['quantidade']);
        $sql->bindValue(':prec', $dadosPost['preco']);
        $sql->bindValue(':categ', $dadosPost['categoria']);
        $sql->bindValue(':id', $dadosPost['id']);
        $resultado = $sql->execute();

        if ($resultado == 0) {
            throw new Exception("Falha ao alterar publicação");

            return false;
        }

        return true;
    }
    
    public function inserirProduto($dadosPost) {
        if (empty($dadosPost)) {
            throw new Exception("Preencha todos os campos");
            return false;
        }


        $pdo = $this->dbConnection->conectar();
        $sql = $pdo->prepare('INSERT INTO product (nome, sku, descricao, quantidade, preco, categoria)
                                 VALUES (:nome, :sku, :descricao, :quantidade, :preco, :categoria)');
        $sql->bindValue(':nome', $dadosPost['nome']);
        $sql->bindValue(':sku', $dadosPost['sku']);
        $sql->bindValue(':descricao', $dadosPost['descricao']);
        $sql->bindValue(':quantidade', $dadosPost['quantidade']);
        $sql->bindValue(':preco', $dadosPost['preco']);
        $sql->bindValue(':categoria', $dadosPost['categoria']);

        $res = $sql->execute();
        if ($res == 0) {
            throw new Exception("Falha ao inserir publicação");
            return false;
        }
        return true;
    }


    public function updatePageProduct($id) {
        header('Location: EditProduct.php?id=' . $id);
    }
    public function createPage($id) 
    {

        header('Location: src/view/ShowProduct.php?id=' . $id);
    }

    public function limitarDadosPaginacao() {
        $dadosPossiveis = 5;
        return $dadosPossiveis;
    }
    public function paginar() {
        $pdo = $this->dbConnection->conectar();

        /* 
       * a variável $limiteDados é estritamente relacionada ao segundo termo da criação da variável
       * $lastpage na function contarPaginas() para a paginação.
       * */
        $limiteDados = 5;
        $numeroPagina = 1;
        if (isset($_GET['pagina'])) {
            $numeroPagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);
        }
        if (!$numeroPagina) {
            $numeroPagina = 1;
        }
        $inicio = ($numeroPagina * $limiteDados) - $limiteDados;
        $sql = "SELECT id, nome, sku, quantidade, preco, categoria FROM product ORDER BY nome limit $inicio, $limiteDados";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function contarPaginas() {
        $pdo = $this->dbConnection->conectar();
        $count = "SELECT count(*) FROM product WHERE id >= 1";
        $result = $pdo->prepare($count);
        $result->execute();
        $numeroTabelas = $result->fetchColumn();
        $lastPage = ceil($numeroTabelas / 5);
        $numerosDeLinks = range(1, $lastPage);

        return $numerosDeLinks;
    }


    public function contarRegistrosProdutos() {

        $pdo = $this->dbConnection->conectar();
        $count = "SELECT count(*) FROM product WHERE id >= 1";
        $result = $pdo->prepare($count);
        $result->execute();
        $numeroTabelas = $result->fetchColumn();

        return $numeroTabelas;
    }
}
