<?php

namespace app\model;
require_once __DIR__ . "/../../vendor/autoload.php";
use app\model\Manager;


class Clientes {


    public function CPFVerify($cpf): bool {
        $cpfReplace = $this->sanitizeField($cpf);

        //Retorna true se estiver correto
        return !empty($cpfReplace) && strlen($cpfReplace) === 11;
    }

    public function sanitizeField($input): array|string {
        $formatFields = ['-', '.', ',', '(', ')', '+', ' '];
        return str_replace($formatFields, '', $input);
    }

    public function validaEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
        //Retorna falso se for inválida
    }


    //Mínimo de 8 e maximo de 10 caracteres, pelo menos uma letra maiúscula, uma minúscula, um número e um caractere
    // especial
    public function validaSenha($senha): bool|int {
        $regex = "/^(?=.*[A-Z])(?=.*[!#@$%&])(?=.*[0-9])(?=.*[a-z]).{6,15}$/";
        return preg_match($regex, $senha);
        //Returna 1 se estiver ok, 0 Se não estiver correta
    }

    public function checkEmailExist($email): int {
        $manager = new Manager();
        $returnEmail = $manager->selectEmail($email);

        if (count($returnEmail) > 0){
            //Conta já existente
            return 0;
        }
        return 1;
    }

    //Check CPF
    public function checkCPFExist($cpf): int {
        $manager = new Manager();
        $returnCPF = $manager->getInfo('user_cliente', 'cpf_cliente', $cpf);

        if (count($returnCPF) > 0){
            //Conta já existente
            return 0;
        }
        return 1;
    }

    public function checkEmailOrCPF($input): bool|int {

        //Checar a quantidade de caracteres
        $countInput = strlen($input);
        //Contém @
        $checkCaractere = str_contains($input, '@');
        if ($countInput >= 11 && $checkCaractere === true){
            //Filter Email
            //Retorna 0 se for um email
            return 0;
        }

        //Retorna true se for um CPF
        return $this->CPFVerify($input);

    }
}