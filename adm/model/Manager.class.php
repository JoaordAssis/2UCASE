<?php


require_once __DIR__ . "/./conexao.class.php";


class Manager extends Conexao {

	public function listClient($table, $columnName) {
		$res = array();
        $cmd = $this->pdo->query("SELECT * FROM {$table} ORDER by {$columnName} DESC");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
	}

	public function insertClient($table, $data){
		$fields = implode(", ", array_keys($data));
		$values = ":" . implode(", :", array_keys($data));
		$sql = "INSERT INTO $table ($fields) VALUES ($values)";
		$statement = $this->pdo->prepare($sql);
		foreach ($data as $key => $value) {
			$statement->bindValue(":$key", $value, PDO::PARAM_STR);
		}
		$statement->execute();
	}

    public function getInfo($table, $columnName, $id) {
		$sql = "SELECT * FROM $table WHERE {$columnName} = :id";
		$statement = $this->pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();

		return $statement->fetchAll();
	}

    public function updateClient($table, $data, $id, $columnName) {
		$new_values = "";
		foreach($data as $key => $value) {
			$new_values .= "$key=:$key, ";
		}
		$new_values = substr($new_values, 0, -2);
		$sql = "UPDATE $table SET $new_values WHERE {$columnName} = :id";
		$statement = $this->pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		foreach($data as $key => $value) {
			$statement->bindValue(":$key", $value, PDO::PARAM_STR);
		}
		$statement->execute();
	}

    public function deleteClient($table, $columnName, $id) {
		$sql = "DELETE FROM $table WHERE {$columnName} = :id";
		$statement = $this->pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
	}

	public function dadosClient($table, $email){
		$res = array();
		$sql = "SELECT * FROM $table WHERE email_adm = :email";
		$statement = $this->pdo->prepare($sql);
		$statement->bindValue(":email", $email);
		$statement->execute();
		$res = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}

	public function novaSenhaClient($table,$senha,$id){
		$sql = "UPDATE $table SET senha = :senha  WHERE id = :id";
		$statement = $this->pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->bindValue(":senha", $senha);
		$statement->execute();

	}

	public function getInfoSub($table, $id){

		$sql = "SELECT * FROM $table WHERE id_menu = :id";
		$statement = $this->pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();

		return $statement->fetchAll();
	}

	public function imgUpload($name, $nome_produto): array {

			$ext = strtolower(substr($_FILES[$name]['name'], -4)); //Pegando extensão do arquivo
			$roundNumber = random_int(100, 200);
			$x = $roundNumber ** 4;
			date_default_timezone_set('America/Sao_Paulo');
			$date = date('d-m-Y H-i-s');
			$dirName = '../../adm/databases/img-database/' . $nome_produto . '---' . $date . '/';
			$new_name = $nome_produto . "-" . ++$x . $ext; //Definindo um novo nome para o arquivo
            mkdir($dirName, 0777, true);

            move_uploaded_file($_FILES[$name]['tmp_name'], $dirName . $new_name);

            $dataReturn[0] = $dirName . $new_name;
            $dataReturn[1] = $dirName;

            return $dataReturn;
	}

	public function imgMultipleUpload($name, $nome_produto){
			$dirUseMultiple = $this->imgUpload('imagem_principal_produto', $nome_produto);
		for($i = 0, $iMax = count($_FILES[$name]['name']); $i < $iMax; $i++){
			$ext = strtolower(substr($_FILES[$name]['name'][$i], -4)); //Pegando extensão do arquivo
			$x = ((8 + $i) ** 4) * 2;
			$new_name = $nome_produto. "-" . ++$x . $ext; //Definindo um novo nome para o arquivo
			// $dir = '../databases/img-database/'; //Diretório para uploads

			move_uploaded_file($_FILES[$name]['tmp_name'][$i], $dirUseMultiple[1] . $new_name);

			$arrayImage[$i] = $dirUseMultiple[1] . $new_name;

		}
		return $arrayImage;
		
	}

    /*
     * @ Método de Teste
     *
     */

    public function testClass($sql){
        $statement = $this->pdo->query($sql);
        $statement->execute();
    }

	public function lastInsertId($table, $columnName){
		$sql = "SELECT $columnName FROM $table ORDER BY $columnName DESC LIMIT 1";
		$statement = $this->pdo->prepare($sql);
		$statement->execute();

		return $statement->fetch();
	}

	function selectLike($tabela, $columns, $search)
	{
		$sql = "SELECT * FROM $tabela WHERE ";
		$queryDinamica = '';
		$qd = '';

		for ($i = 0, $iMax = count($columns); $i < $iMax; $i++) {
			$bindParams = substr_replace($columns[$i]," LIKE '%$search%' OR ", -1);
			$addPlus = $bindParams;
			$qd .= $addPlus;
			$queryDinamica = substr($qd, 0, -4);
		}

		$sqlQuery = $sql . $queryDinamica;

		$res = array();
		$cmd = $this->pdo->query($sqlQuery);
		$res = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}


	public function selectWhere($params, $paramPost, $tabela){
		$queryDinamica = '';
		$qd = '';
		$pdo =  $this->pdo;


		for ($i = 0, $iMax = count($params); $i < $iMax; $i++) {
			$bindParams = substr_replace($params[$i], ':', 0, 0);
			$addPlus = $params[$i] . ' = ' . $bindParams . ' && ';
			$qd .= $addPlus;
			$queryDinamica = substr($qd, 0, -4);
		}
		$sql = "SELECT * FROM $tabela WHERE $queryDinamica";
		$statement = $pdo->prepare($sql);

		for ($i = 0, $iMax = count($params); $i < $iMax; $i++) {
			$statement->bindValue(
				":" . $params[$i],
				$paramPost[$i]
			);
		}
		$statement->execute();
		return $statement->fetchAll();
	}

	public function selectOrderBy($tabela, $column, $order){
		$sql = "SELECT * FROM $tabela ORDER BY $column $order";

		$res = array();
		$cmd = $this->pdo->query($sql);
		$res = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}

	public function dateCountClientes($tabela, $column, $dataAtual, $dataCount){
		$sql = "SELECT COUNT(*) FROM $tabela WHERE $column < '$dataAtual' 
		AND $column >= '$dataCount'";

		$cmd = $this->pdo->query($sql);
		$res = $cmd->fetch(PDO::FETCH_ASSOC);
		return $res;
	}


	public function selectPerDate($tabela, $column, $dataAtual, $dataCount){
		$sql = "SELECT * FROM $tabela WHERE $column BETWEEN '$dataAtual' 
		AND '$dataCount'";

		$res = array();
		$cmd = $this->pdo->query($sql);
		$res = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}

	public function innerJoinRunnerPedidos($id){
		$sql = "SELECT
		adm_venda.id_venda, adm_venda.id_cliente, adm_venda.id_pagamento, adm_venda.id_endereco, adm_venda.valor_desconto_total,
		adm_venda.data_venda, adm_venda.valor_venda_total, adm_venda.quant_produto_total,
		adm_venda.id_status, adm_venda.id_carrinho, adm_venda.numero_venda, adm_venda.frete_carrinho,
		venda_status.status_venda,
		user_carrinho.data_reg_carrinho, user_carrinho.total_carrinho, user_carrinho.desconto_carrinho,
		user_carrinho.quant_carrinho,
		user_cliente.nome_cliente, user_cliente.email_cliente, user_cliente.cpf_cliente,
		user_cliente.telefone_cliente, user_cliente.genero_cliente, user_cliente.data_nasc_cliente,
		user_cliente.status, user_cliente.telefoneFixo_cliente,
		user_endereco_cliente.logradouro_cliente, user_endereco_cliente.bairro_cliente,
		user_endereco_cliente.cep_cliente, user_endereco_cliente.uf_cliente, 
		user_endereco_cliente.numero_cliente, user_endereco_cliente.complemento_cliente,
		user_endereco_cliente.ponto_ref_cliente
		FROM adm_venda
		INNER JOIN venda_status
		ON adm_venda.id_status = venda_status.id_status
		INNER JOIN user_carrinho
		ON adm_venda.id_carrinho = user_carrinho.id_carrinho
		INNER JOIN user_cliente
		ON adm_venda.id_cliente = user_cliente.id_cliente
		INNER JOIN user_endereco_cliente
		ON adm_venda.id_endereco = user_endereco_cliente.id_endereco WHERE id_venda = $id";

		$res = array();
		$statement = $this->pdo->query($sql);
		$res = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}
}
