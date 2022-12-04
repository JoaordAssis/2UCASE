<?php

namespace app\class;

class CEP{

    public const CEP_ORIGEM = '05876040';
    public const ALTURA = 8;
    public const LARGURA = 20;
    public const COMPRIMENTO = 20;
    public const FORMATO = 1;
    public const MAO_PROPRIA = 'n';
    public const AVISO_RECEBIMENTO = 'n';
    public const DIAMETRO = 0;
    public const RETORNO = 'xml';

    public int $peso;
    public string $cepDestino;
    public int $valor;

    public function __construct($peso, $cepDestino, $valor){
        $this->peso = $peso;
        $this->cepDestino = $cepDestino;
        $this->valor = $valor;

    }


    public function calcFrete($tipo_frete){
        $urlApi = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?';


        $urlApi .= "nCdEmpresa=";
        $urlApi .= "&sDsSenha=";
        $urlApi .= "&sCepOrigem=" . self::CEP_ORIGEM;
        $urlApi .= "&sCepDestino=" . $this->cepDestino;
        $urlApi .= "&nVlPeso=" . $this->peso;
        $urlApi .= "&nVlLargura=" . self::LARGURA;
        $urlApi .= "&nVlAltura=" . self::ALTURA;
        $urlApi .= "&nCdFormato=" . self::FORMATO;
        $urlApi .= "&nVlComprimento=" . self::COMPRIMENTO;
        $urlApi .= "&sCdMaoProria=" . self::MAO_PROPRIA;
        $urlApi .= "&nVlValorDeclarado=" . $this->valor;
        $urlApi .= "&sCdAvisoRecebimento=" . self::AVISO_RECEBIMENTO;
        $urlApi .= "&nCdServico=" . $tipo_frete;
        $urlApi .= "&nVlDiametro=" .self::DIAMETRO;
        $urlApi .= "&StrRetorno=" . self::RETORNO;

        return simplexml_load_string(file_get_contents($urlApi))->cServico;

    }
}

//Sedex: 40010
//Pac:  04510

/*
 Peso: constante passada nas configurações,
 CEP: POST recebido da fetch API; digitado pelo usuário,
 Valor: Recebido da fetch API; pego do banco de dados
 Tipo de Frete: Constate passada direto nessa página
*/



$val[] = (new CEP('2', $_GET['cep'], $_GET['value']))->calcFrete('04510');
$val[] = (new CEP('2', $_GET['cep'], $_GET['value']))->calcFrete('40010');

try {
    echo json_encode($val, JSON_THROW_ON_ERROR);
} catch (\JsonException $e) {
    echo $e->getMessage();
}


