<?php
require_once 'Conexao.class.php';
class Manager extends Conexao {

	public function listClient($table, $columnName) {
		$res = array();
        $cmd = $this->pdo->query("SELECT * FROM {$table} ORDER by {$columnName} DESC");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
	}

    public function insertClient($table, $data) {
		$fields = implode(", ", array_keys($data));
		$values = ":".implode(", :", array_keys($data));
		$sql = "INSERT INTO $table ($fields) VALUES ($values)";
		$statement = $this->pdo->prepare($sql);
		foreach($data as $key => $value) {
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

    public function updateClient($table, $data, $id) {
		$new_values = "";
		foreach($data as $key => $value) {
			$new_values .= "$key=:$key, ";
		}
		$new_values = substr($new_values, 0, -2);
		$sql = "UPDATE $table SET $new_values WHERE id = :id";
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

		for($i = 0; $i < count($_FILES[$name]['name']); $i++){
			$ext = strtolower(substr($_FILES[$name]['name'][$i], -4)); //Pegando extensão do arquivo
			$x = ((8 + $i) ** 4) * 32;
			$new_name = $nome_produto. "-" . ++$x . $ext; //Definindo um novo nome para o arquivo
			$dir = '../databases/img-database/'; //Diretório para uploads

			move_uploaded_file($_FILES[$name]['tmp_name'][$i], $dir . $new_name);

			$arrayImage[$i] = $dir . $new_name;

		}
		return $arrayImage;
		
	}

}
