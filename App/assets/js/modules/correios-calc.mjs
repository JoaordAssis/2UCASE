//Calculo de frete

// import Correios from 'node-correios/lib/correios.js';
import {
    calcularPrecoPrazo
} from 'correios-brasil';


let args = {
    // Não se preocupe com a formatação dos valores de entrada do cep, qualquer uma será válida (ex: 21770-200, 21770 200, 21asa!770@###200 e etc),
    sCepOrigem: '81200100',
    sCepDestino: '05876040',
    nVlPeso: '1',
    nCdFormato: '1',
    nVlComprimento: '20',
    nVlAltura: '20',
    nVlLargura: '20',
    nCdServico: ['04014', '04510'], //Array com os códigos de serviço
    nVlDiametro: '0',
};

calcularPrecoPrazo(args).then(response => {
    console.log(response);
});




