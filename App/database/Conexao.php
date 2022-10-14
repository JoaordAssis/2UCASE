<?php

namespace app\database;

use Exception;
use PDO;
use PDOException;

class Conexao{

    public PDO $pdo;

    public function __construct(){
        // CONEXAO
        try{
            $this->pdo = new PDO("mysql:dbname=2ucase_bd3;host=localhost","root","");
        }catch(PDOException $e){
            echo "Erro com banco de dados: " . $e->getMessage() . "<br>";
            exit();
        }catch(Exception $e){
            echo "Erro generico: " . $e->getMessage() . "<br>";
            exit();
        }
    }
}
