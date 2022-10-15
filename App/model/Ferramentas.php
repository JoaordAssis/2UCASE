<?php

namespace app\model;

class Ferramentas {

    public function validaEmail($email): int {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 1; // e-mail válido
        }

        return 0; // e-mail inválido
    }

    public function hash256($string): bool|string {
        // devolve 64 caracteres
        return hash('sha256', $string);
    }

    public function antiInjection($param): string|int {
        // verifica se informações de formulário possui injection
        $strParam = strlen($param);
        $palavras = array("from","select","insert","delete","where","drop","table","show","update","declare","exec","set","alter","cst","union","column","\"","'","\\","--");
        $palavras2 = array("FROM","SELECT","INSERT","DELETE","WHERE","DROP","TABLE","SHOW","UPDATE","DECLARE","EXEC","SET","ALTER","CST","UNION","COLUMN","\"","'","\\","--");
        $paramL = strtolower($param);
        $paramU = strtoupper($param);
        $str = str_replace($palavras,"",$paramL);
        $strParams = strlen($str);
        if($strParam !== $strParams){
            return 0;
        }

        $str = str_replace($palavras2,"",$paramU);
        $strParams = strlen($str);
        if($strParam !== $strParams){
            return 0; // dados inválidos (tentativa de injection)
        }

        return $param; // dados válidos, retorna o paramêtro passado
    }
}