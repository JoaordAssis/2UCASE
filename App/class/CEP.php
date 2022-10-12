<?php

namespace app\class;

class CEP{

    const CEP_ORIGEM = '05876040';
    const ALTURA = 8;
    const LARGURA = 20;
    const COMPRIMENTO = 20;
    const FORMATO = 1;
    const MAO_PROPRIA = 'n';
    const AVISO_RECEBIMENTO = 'n';
    const DIAMETRO = 0;
    const RETORNO = 'xml';

    public int $peso;
    public int $cepDestino;
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

$val = (new CEP('2', '05876040', '145.69'))->calcFrete('04510');



