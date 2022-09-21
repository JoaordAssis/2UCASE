<?php
require_once 'Conexao.class.php';
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
		var_dump($statement);
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

	public function LeftJoinMenu(){
		$sql = "SELECT SubMenu.id, SubMenu.nomeSub, SubMenu.urlSub, SubMenu.SubstatusM, SubMenu.SubDataC, Menu.id AS idDoMenu, Menu.NOME, Menu.urlMenu
		FROM Menu
		INNER JOIN SubMenu
		ON Menu.Id = SubMenu.idMenu;";

		$res = array();
        $cmd = $this->pdo->query($sql);
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
	}

	public function imgUpload($name, $nome_produto){

			$ext = strtolower(substr($_FILES[$name]['name'], -4)); //Pegando extensão do arquivo
			$roundNumber = random_int(100, 200);
			$x = $roundNumber ** 4;
			date_default_timezone_set('America/Sao_Paulo');
			$date = date('d-m-Y H-i-s');
			$dirName = '../databases/img-database/' . $nome_produto . '---' . $date . '/';
			$new_name = $nome_produto . "-" . ++$x . $ext; //Definindo um novo nome para o arquivo
			if(!is_dir($dirName)){
				mkdir($dirName, 0777, true); 
			}

			move_uploaded_file($_FILES[$name]['tmp_name'], $dirName . $new_name);

			$dataReturn[0] = $dirName . $new_name;
			$dataReturn[1] = $dirName;

			return $dataReturn;
	}

	public function imgMultipleUpload($name, $nome_produto){
			$dirUseMultiple = $this->imgUpload('imagem_principal_produto', $nome_produto);
		for($i = 0; $i < count($_FILES[$name]['name']); $i++){
			$ext = strtolower(substr($_FILES[$name]['name'][$i], -4)); //Pegando extensão do arquivo
			$x = ((8 + $i) ** 4) * 2;
			$new_name = $nome_produto. "-" . ++$x . $ext; //Definindo um novo nome para o arquivo
			// $dir = '../databases/img-database/'; //Diretório para uploads

			move_uploaded_file($_FILES[$name]['tmp_name'][$i], $dirUseMultiple[1] . $new_name);

			$arrayImage[$i] = $dirUseMultiple[1] . $new_name;

		}
		return $arrayImage;
		
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

		for ($i = 0; $i < count($columns); $i++) {
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


	public function selectWhere($numParams, $params, $paramPost, $tabela){
		$queryDinamica = '';
		$qd = '';
		$pdo =  $this->pdo;


		for ($i = 0; $i < $numParams; $i++) {
			$bindParams = substr_replace($params[$i], ':', 0, 0);
			$addPlus = $params[$i] . ' = ' . $bindParams . ' && ';
			$qd .= $addPlus;
			$queryDinamica = substr($qd, 0, -4);
		}
		$sql = "SELECT * FROM $tabela WHERE $queryDinamica";
		$statement = $pdo->prepare($sql);

		for ($i = 0; $i < $numParams; $i++) {
			$statement->bindValue(
				":" . $params[$i],
				$paramPost[$i]
			);
		}
		$statement->execute();
		return $statement->fetchAll();
	}

}
