<?php

namespace app\model;

class Endereco {


    public function verifyCEP($cep): bool {

        $formatFields = ['-', '.', ','];
        $cepReplace = str_replace($formatFields, '', $cep);

        return !empty($cepReplace) && strlen($cepReplace) === 8;
    }
}