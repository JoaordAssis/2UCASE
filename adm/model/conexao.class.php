<?php

//Login no host
//$this->pdo = new PDO("mysql:dbname=dmprog64_2ucase_bd3;host=localhost","dmprog64_root","Davi2706");

//Login no localhost - $this->pdo = new PDO("mysql:dbname=2ucase_bd3;host=localhost","root","");
class Conexao{
    public $pdo;
    
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
?>