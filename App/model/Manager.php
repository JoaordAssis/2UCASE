<?php


namespace app\model;

use app\database\Conexao;
use PDO;


class Manager extends Conexao {

    public function listClient($table, $columnName): bool|array {
        $cmd = $this->pdo->query("SELECT * FROM {$table} ORDER by {$columnName} DESC");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertClient($table, $data): bool {
        $fields = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($fields) VALUES ($values)";
        $statement = $this->pdo->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value, PDO::PARAM_STR);
        }
        return $statement->execute();
    }

    public function getInfo($table, $columnName, $id): bool|array {
        $sql = "SELECT * FROM $table WHERE {$columnName} = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();

        try {
            return $statement->fetchAll();
        }catch (\PDOException $exception){
            return $exception->getMessage();
        }

    }

    public function updateClient($table, $data, $id, $columnName): bool {
        $new_values = "";
        foreach ($data as $key => $value) {
            $new_values .= "$key=:$key, ";
        }
        $new_values = substr($new_values, 0, -2);
        $sql = "UPDATE $table SET $new_values WHERE {$columnName} = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":id", $id);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value, PDO::PARAM_STR);
        }
        return $statement->execute();
    }

    public function deleteClient($table, $columnName, $id): bool {
        $sql = "DELETE FROM $table WHERE {$columnName} = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":id", $id);
        return $statement->execute();
    }

    public function selectEmail($email): bool|array {
        $sql = "SELECT * FROM user_cliente WHERE email_cliente = :email";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":email", $email);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectPerField($table, $field, $param): bool|array {
        $sql = "SELECT * FROM $table WHERE $field = :param";

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":param", $param);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function dadosClient($table, $email): bool|array {
        $sql = "SELECT * FROM $table WHERE email_adm = :email";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":email", $email);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function loginCliente($senha, $email): bool|array {
        $sql = "SELECT * FROM user_cliente WHERE email_cliente = :email && senha_cliente = :senha";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":senha", $senha);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function novaSenhaClient($table, $senha, $id): void {
        $sql = "UPDATE $table SET senha = :senha  WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->bindValue(":senha", $senha);
        $statement->execute();

    }

    public function getInfoSub($table, $id): bool|array {

        $sql = "SELECT * FROM $table WHERE id_menu = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function exibProducts($column, $categoria, $orderBy, $limit): bool|array {
        $sql = "SELECT * FROM user_produto WHERE $column = '$categoria' ORDER BY $orderBy LIMIT $limit";
        return $this->pdo->query($sql)->fetchAll();
    }

    public function imgUpload($name, $nome_produto): array {

        $ext = strtolower(substr($_FILES[$name]['name'], -4)); //Pegando extensão do arquivo
        $roundNumber = random_int(100, 200);
        $x = $roundNumber ** 4;
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('d-m-Y H-i-s');
        $dirName = '../databases/img-database/' . $nome_produto . '---' . $date . '/';
        $new_name = $nome_produto . "-" . ++$x . $ext; //Definindo um novo nome para o arquivo
        if (!is_dir($dirName)) {
            mkdir($dirName, 0777, true);
        }

        move_uploaded_file($_FILES[$name]['tmp_name'], $dirName . $new_name);

        $dataReturn[0] = $dirName . $new_name;
        $dataReturn[1] = $dirName;

        return $dataReturn;
    }

    //BUG: Não funciona;

    public function imgMultipleUpload($name, $nome_produto): array {
        $dirUseMultiple = $this->imgUpload('imagem_principal_produto', $nome_produto);
        for ($i = 0, $iMax = count($_FILES[$name]['name']); $i < $iMax; $i++) {
            $ext = strtolower(substr($_FILES[$name]['name'][$i], -4)); //Pegando extensão do arquivo
            $x = ((8 + $i) ** 4) * 2;
            $new_name = $nome_produto . "-" . ++$x . $ext; //Definindo um novo nome para o arquivo
            // $dir = '../databases/img-database/'; //Diretório para uploads

            move_uploaded_file($_FILES[$name]['tmp_name'][$i], $dirUseMultiple[1] . $new_name);

            $arrayImage[$i] = $dirUseMultiple[1] . $new_name;

        }
        return $arrayImage;

    }

    public function lastInsertId($table, $columnName) {
        $sql = "SELECT $columnName FROM $table ORDER BY $columnName DESC LIMIT 1";
        return $this->pdo->query($sql)->fetch();
    }


    //AO DECLARAR AS COLUNAS, COLOCAR UM ESPAÇAMENTO APÓS A ULTIMA LETRA!!!
    public function selectLike($tabela, $columns, $search): bool|array {
        $sql = "SELECT * FROM $tabela WHERE ";
        $queryDinamica = '';
        $qd = '';

        for ($i = 0, $iMax = count($columns); $i < $iMax; $i++) {
            $bindParams = substr_replace($columns[$i], " LIKE '%$search%' && status = 1 OR ", -1);
            $addPlus = $bindParams;
            $qd .= $addPlus;
            $queryDinamica = substr($qd, 0, -4);
        }

        $sqlQuery = $sql . $queryDinamica;

        $cmd = $this->pdo->query($sqlQuery);
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }


    public function selectWhere($params, $paramPost, $tabela): bool|array {
        $queryDinamica = '';
        $qd = '';
        $pdo = $this->pdo;


        for ($i = 0, $iMax = count($params); $i < $iMax; $i++) {
            $bindParams = substr_replace($params[$i], ':', 0, 0);
            $addPlus = $params[$i] . ' = ' . $bindParams . ' && ';
            $qd .= $addPlus;
            $queryDinamica = substr($qd, 0, -4);
        }
        $sql = "SELECT * FROM $tabela WHERE $queryDinamica";
        $statement = $pdo->prepare($sql);

        for ($i = 0, $iMax = count($paramPost); $i < $iMax; $i++) {
            $statement->bindValue(":" . $params[$i], $paramPost[$i]);
        }
        $statement->execute();
        return $statement->fetchAll();
    }

    public function selectOrderBy($tabela, $column, $order): bool|array {
        $sql = "SELECT * FROM $tabela ORDER BY $column $order";

        $cmd = $this->pdo->query($sql);
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOrderMeusPedidos($tabela, $column, $order, $where, $id): bool|array {
        $sql = "SELECT * FROM $tabela WHERE $where = $id ORDER BY $column $order";

        $cmd = $this->pdo->query($sql);
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }


    public function selectCategoriaOrder($tabela, $column, $order, $categoria, $postCategoria): bool|array {
        $sql = "SELECT * FROM $tabela WHERE $categoria = $postCategoria && status = 1 ORDER BY $column $order";

        $cmd = $this->pdo->query($sql);
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectSearchOrder($tabela, $columns, $search, $coluna, $order): bool|array {
        $sql = "SELECT * FROM $tabela WHERE ";
        $queryDinamica = '';
        $qd = '';

        for ($i = 0, $iMax = count($columns); $i < $iMax; $i++) {
            $bindParams = substr_replace($columns[$i], " LIKE '%$search%' OR ", -1);
            $addPlus = $bindParams;
            $qd .= $addPlus;
            $queryDinamica = substr($qd, 0, -4);
        }

        $sqlOrder = " && status = 1 ORDER BY $coluna $order";
        $sqlQuery = $sql . $queryDinamica . $sqlOrder;

        $cmd = $this->pdo->query($sqlQuery);
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    public function dateCountClientes($tabela, $column, $dataAtual, $dataCount) {
        $sql = "SELECT COUNT(*) FROM $tabela WHERE $column < '$dataAtual' 
		AND $column >= '$dataCount'";

        $cmd = $this->pdo->query($sql);
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }


    public function selectPerDate($tabela, $column, $dataAtual, $dataCount) {
        $sql = "SELECT * FROM $tabela WHERE $column BETWEEN '$dataAtual' 
		AND '$dataCount'";

        $cmd = $this->pdo->query($sql);
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countProdutoCarrinho($table, $countColumn, $columnWhere, $param): bool|array {
        $sql = "SELECT COUNT($countColumn) FROM $table WHERE $columnWhere = $param";

        $cmd = $this->pdo->query($sql);
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cupomSelect($coluna, $post): bool|array {
        $sql = "SELECT * FROM user_cupom WHERE $coluna = '$post' AND status = 1";

        $cmd = $this->pdo->query($sql);
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }


    //EXCLUSIVO PARA PAGINA DE ACESSORIOS


    public function selectWhereAcessorios($colunaPop, $idPop, $idPod): bool|array {
        $sql = "SELECT * FROM user_produto WHERE $colunaPop = $idPop AND status = 1 OR $colunaPop = $idPod AND status = 1";

        $cmd = $this->pdo->query($sql);
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }


    public function selectCategoriaOrderAcessorios($tabela, $column, $order, $categoria, $categoriaPop, $categoriaPod): bool|array {
        $sql = "SELECT * FROM $tabela WHERE $categoria = $categoriaPop && status = 1 OR $categoria = $categoriaPod && status = 1 ORDER BY $column $order";

        $cmd = $this->pdo->query($sql);
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

}
