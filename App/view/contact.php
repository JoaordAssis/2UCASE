<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../assets/styles/contact.css">

</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">
    <main class="contact-questions">
        <article class="duvidas-frequentes">
            <h1>Dúvidas Frequentes</h1>

            <section class="question-buttons">
                <button id="btn-pagamento" class="btn-question active">Pagamentos</button>
                <button id="btn-entrega" class="btn-question">Entrega</button>
                <button id="btn-prod-garantia" class="btn-question">Produtos e Garantia</button>
                <button id="btn-tdr" class="btn-question">Trocas, Devoluções e Reembolsos</button>
                <button id="btn-promo-cupom" class="btn-question">Promoções e Cupons</button>

                <select name="questions-select" id="select-questions-group" onclick="mobileContactPerguntas()">
                    <option value="pagamento">Pagamentos</option>
                    <option value="entrega">Entrega</option>
                    <option value="produto-garantia">Produtos e Garantia</option>
                    <option value="TDR">Trocas, Devoluções e Reebombolsos</option>
                    <option value="promo">Promoções e Cupons</option>
                </select>
            </section>

            <section class="accordion-answers">
                <!--PAGAMENTO-->
                <div class="pergunta pagamento-pergunta active">
                    <button class="accordion">
                        Pagamento via Boleto Bancário
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>Esta forma de pagamento não oferece parcelamento, e tem valor único para pagamento a vista. O boleto tem prazo de validade de 10 dias corridos após a confirmação do pedido. Caso não haja pagamento do boleto, o pedido será automaticamente cancelado do nosso sistema e nenhuma cobrança será gerada. Então não precisa de preocupar, tá?! :)
                            <br><br>
                            As compras realizadas por meio de boleto bancário somente são confirmadas após o pagamento do boleto. Nesse caso, se desejar não prosseguir com a compra, basta ignorar os nossos e-mails de lembretes automáticos e após a data de vencimento dele, a compra será cancelada automaticamente. Não sendo necessário realizar qualquer outro procedimento.
                            <br><br>
                            Para realizar o pagamento através de boleto bancário, selecione a opção Boleto Bancário e clique em Confirmar Pagamento, em seguida clique em Gerar Boleto. Imprima o boleto bancário e realize o pagamento até a data de vencimento em qualquer agência bancária, pela internet ou casa lotérica.
                            <br><br>
                            O prazo para confirmação do pagamento é de até 2 dias úteis. O prazo de produção inicia-se após a confirmação do pagamento pela instituição financeira. Lembrando que finais de semana e feriados não são dias úteis e por isso não contam.
                            <br><br>
                            Assim que o pedido for aprovado você vai receber uma notificação de confirmação no seu e-mail. Caso depois desse prazo seu pedido ainda não tenha sido aprovado, pode entrar em contato com nossa Central de Ajuda.
                            <br><br>
                            <strong>Lembrando que, agendamentos de pagamento, ou pagamentos feitos em valor inferior ao informado no boleto, acarretará na não confirmação de pagamento.</strong>
                        </p>
                    </div>
                </div>


                <div class="pergunta pagamento-pergunta active">
                    <button class="accordion">
                        Pagamento via Cartão de Crédito
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>Trabalhamos com método de pagamento pelo Mercado Pago e PagSeguro. Aceitamos os cartões de crédito Visa, MasterCard, Diners, Hipercard e Elo, as compras podem ser parceladas em até 12x ou 2x s/ juros. Para garantir a sua segurança, contamos com o suporte de empresas especializadas na conferência de dados. Caso haja recusa pela operadora de cartão da solicitação de compra, o pedido será cancelado automaticamente e será enviado um email através do nosso intermediador de pagamento. Portanto, é importante deixá-lo sempre atualizado. Caso isso ocorra, verifique o motivo junto a administradora de seu cartão de crédito.
                            <br><br>
                            Todas as compras realizadas por cartão de crédito passam por um processo de análise de pagamento que pode ser concluída de forma imediata ou em até 48 horas.
                            <br><br>
                            Neste período o status do pedido ficará como AGUARDANDO PAGAMENTO. Depois que terminar a análise, você receberá um e-mail confirmando ou não o pagamento.
                            <br><br>
                            Esse processo é feito para a segurança do titular do cartão, e consequentemente evitará que compras sejam realizadas sem autorização e cobradas incorretamente.
                            <br><br>
                            No prazo de 48 horas após a realização da sua compra, o pedido estará passando por análise de dados da compra. Verificação dos dados fornecidos como: número do cartão, se ele é vinculado a você ou a terceiros e demais processos internos pertencentes a segurança de compra dos nossos clientes junto aos nossos parceiros. 
                            <br><br>
                            Caso o pedido não seja aprovada, será necessário efetuar a compra com outro método de pagamento, como Boleto ou PIX. 
                            <br><br>
                            <strong>Atenção: A reprovação da compra, também poderá ocorrer por parte da sua operadora de cartão. Após a finalização de sua compra, as opções de pagamento e parcelamento não poderão ser alteradas.</strong>
                        </p>
                    </div>
                </div>

                <!--ENTREGA-->
                <div class="pergunta entrega-pergunta">
                    <button class="accordion">
                        Como acompanho o rastreio do meu pedido?
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>
                            Se o seu pedido finalizou a produção recentemente, significa que ele está na fase de processamento da carga, sendo recebido pelos Correios ou Transportadora responsável e encaminhado para o centro de distribuição mais próximo. O tempo estimado para atualização desse processo é de até 24 horas, então basta aguardar esse prazo que em breve você receberá mais informações.
                            <br><br>
                            Assim que o produto for despachado, informaremos por e-mail o código de rastreio para que você acompanhe a entrega do seu pedido. Esse código também estará disponível na sua conta. Basta você acessa a sua conta > meus pedidos > e encontrará o seu código.
                            <br><br>
                            Consultar pelos Correios:
                            <br><br>
                            <br>
                            Para consultar o seu código de rastreamento basta acessar o link abaixo e colar o seu código no espaço indicado.
                            <br><br>
                            <a href="https://rastreamento.correios.com.br/app/index.php" target="_blank">https://rastreamento.correios.com.br/app/index.php</a>
                        </p>
                    </div>
                </div>

                <div class="pergunta entrega-pergunta">
                    <button class="accordion">
                        Como confirmar meu endereço de entrega?
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>
                            Para confirmar o seu endereço de entrega, pedimos que entre na sua conta e clique na opção “Meus endereços”. Lá você poderá editar, remover ou adicionar novos dados.
                            <br><br>
                            No entanto, as alterações de endereço não irão modificar os dados de entrega ou cobrança de pedidos já realizados.
                            <br><br>
                            Caso o seu pedido ainda esteja em produção, pedimos que entre em contato com a nossa Central de Atendimento através de “Fale Conosco” disponível na parte inferior do site dentro do prazo máximo de 5 horas, para que possamos solicitar a alteração do endereço de entrega. Devemos ressaltar que nesse caso, faremos uma análise e a alteração de endereço poderá ficar sujeita, em alguns casos, a alteração do prazo para entrega e/ou cobrança de taxas adicionais.
                            <br><br>
                            Se deseja alterar o endereço da sua entrega e o seu pedido já tiver sido enviado, infelizmente não será mais possível realizar essa solicitação, pois o mesmo estará
                            em andamento nos Correios ou Transportadora não sendo mais permitido nenhum tipo de alteração. 
                        </p>
                    </div>
                </div>

                <div class="pergunta entrega-pergunta">
                    <button class="accordion">
                        Como funciona o Frete Grátis?
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>
                            O Frete Grátis é válido para todos os pedidos do site, desde que cumpram os valores mínimos e regras estabelecidas abaixo. 
                            <br><br>
                            Em compras a partir de R$150,00 o Frete é Grátis para todo o Brasil. Exceto em, casos onde seja utilizado o cupom da Promoção em Dobro e o CEP de entrega esteja localizado em regiões fora de São Paulo capital, pois escolhendo uma das opções será automaticamente anulada a outra.
                            <br><br>
                            <strong>Atenção:</strong> confira o seu CEP no carrinho de compras. 
                        </p>
                    </div>
                </div>

                <!--PRODUTO E GARANTIA-->
                <div class="pergunta prod-garantia-pergunta">
                    <button class="accordion">
                        Qual o material das capinhas?
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>
                            Não é adesivo! Não é sublimação! É impressão digital UV.
                            <br><br>
                            Após muita pesquisa, criamos um produto de altíssima qualidade e totalmente exclusivo reunindo os materiais mais resistentes do mercado.
                            <br><br>
                            <br>
                            Temos capas para todos os gostos: capas totalmente flexíveis produzidas em Poliuretano (TPU) e capas totalmente rígidas produzidas em Policarbonato (PC) Qualidade Premium de alta resistência e mais proteção para o seu celular.
                        </p>
                    </div>
                </div>

                <div class="pergunta prod-garantia-pergunta">
                    <button class="accordion">
                        Qual é a garantia do meu produto?
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>
                            A 2UCASE garante total qualidade do produto e principalmente priorizando a satisfação dos nossos clientes. Se algum dos seus produtos apresentou problemas, não se preocupe, pois todos estão cobertos pela nossa garantia. 
                            <br><br>
                            Damos aos nossos clientes uma garantia de 90 dias corridos a contar da data do recebimento do produto por qualquer defeito de fabricação. Nos casos em que o produto, personalizado ou não, apresentar defeito de fabricação, a Case4you garante a troca do produto, respeitados os prazos e condições legalmente estabelecidos, bem como a nossa política de trocas/devoluções. 
                            <br><br>
                            Caso ocorra qualquer problema com o seu produto, basta entrar em contato com nosso time de atendimento através da nossa Central de Ajuda. 
                        </p>
                    </div>
                </div>

                <div class="pergunta prod-garantia-pergunta">
                    <button class="accordion">
                        Invalidação da Garantia
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>
                            A garantia do seu produto poderá ser invalidada caso ocorra alguma das situações abaixo:
                            <br>
                            <br><br>
                            Se o defeito apresentado for ocasionado por mau uso do produto pelo consumidor ou terceiros. O mau uso se define por cuidados não condizentes com o indicado no artigo do produto em questão na nossa Central de ajuda, também marcas de queda, quebra, riscos/arranhões, dobras incorretas (no caso de cabos, por exemplo), negligência de cuidados com o produto, entre outros;
                            <br><br>
                            Se o produto for examinado, alterado, adulterado, fraudado, ajustado, corrompido ou consertado por pessoa não autorizada pela Case4you;
                            <br><br>
                            Se ocorrer a ligação deste produto à instalações elétricas inadequadas, em casos de produtos eletrônicos;
                            <br><br>
                            Se o dano tiver sido causado por acidente (queda), intempéries ou agentes da natureza;
                            <br><br>
                            Se o dano tiver sido causado por animais. 
                            <br>
                            <br>
                            (*) Em alguns casos será necessária a devolução do produto para avaliação. Essa avaliação será feita por nossa equipe de qualidade em até 10 dias úteis após a chegada do produto em nossa fábrica.
                            <br>
                            •Não tenho certeza de qual é modelo do seu aparelho, o que eu faço?
                            <br>
                            Para saber qual é o seu modelo, basta você acessar as configurações do seu aparelho e confirmar pela numeração disponível.
                            <br>
                            <br>
                            <br>
                            Caso fique com dúvidas, não realize a compra antes de confirmar o modelo correto. Você também pode solicitar auxílio com o nosso time de atendimento através da Central de Ajuda antes de realizar a compra. 
                        </p>
                    </div>
                </div>

                <!--TDR-->
                <div class="pergunta tdr-pergunta">
                    <button class="accordion">
                        Comprei meu produto em uma promoção. Em caso de troca/devolução, qual valor será devolvido?
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>
                            Para produtos adquiridos em promoção, caso seja necessária a troca e / ou devolução, o valor considerado será o pago pelo produto e não o seu valor original.
                            <br><br>
                            Exemplo: Se você adquiriu um item em promoção por R$ 50,00 mas seu valor original era de R$ 100,00, o valor considerado para devolução será o de R$50,00.
                        </p>
                    </div>
                </div>

                <div class="pergunta tdr-pergunta">
                    <button class="accordion">
                        Como funciona o reembolso?
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>
                            O valor do produto será devolvido dependendo da forma de pagamento que você escolheu durante a compra, como mostramos aqui abaixo:
                            <br><br>
                            Cartão de Crédito: 
                            <br><br>
                            <br>
                            O estorno será efetuado em até 10 dias úteis após a confirmação do cancelamento, em sua fatura do cartão de crédito entre a 1° e 2° fatura após o cancelamento do pedido. O valor será estornado diretamente em suas faturas, podendo ser de forma integral ou parcela por parcela. A forma de estorno é determinada pela sua operadora de cartão. 
                            <br><br>
                            <br>
                            Boleto Bancário: 
                            <br><br>
                            <br>
                            Reembolsos por boletos são devolvidos por transferência bancária. Nesse caso o prazo para análise e efetivação do reembolso são até 10 dias úteis após a confirmação do cancelamento.
                        </p>
                    </div>
                </div>

                <div class="pergunta tdr-pergunta">
                    <button class="accordion">
                        Em quanto tempo o valor estará disponível após o reembolso?
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>
                            - Cartão de crédito: Realizaremos o estorno pelo Mercado Pago em seu cartão de crédito e a administradora do cartão irá realizar a devolução do valor cheio em até 2 faturas, mesmo que o valor tenha sido parcelado. Você pode conferir o estorno pela sua fatura.
                            <br><br>
                            <br>
                            - Boleto bancário: Para pagamentos feitos dessa forma, o reembolso será feito para a conta de quem realizou a compra, o estorno será realizado em até 10 dias úteis via PIX. O CPF do dono da conta deve ser o mesmo que consta no cadastro da compra.
                        </p>
                    </div>
                </div>

                <div class="pergunta tdr-pergunta">
                    <button class="accordion">
                        Meu produto apresentou defeito. O que fazer?
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>
                            Todos nossos produtos respeitam a garantia legal mínima de 90 dias corridos. Para realizar a troca de produto com defeito, pedimos que entre em contato com nossa Central de Ajuda. É importante enviar fotos e vídeos (principalmente para eletrônicos) do produto, sinalizando qual defeito o produto apresentou, pois esse procedimento ajuda nossa equipe a entender melhor sua situação e agilizar o seu atendimento.
                            <br><br>
                            Em alguns casos, será solicitado o envio do seu produto para testes e averiguações junto ao nosso time de qualidade. Não se preocupe, isso é um procedimento normal para compreendermos o que ocorreu com o seu produto e realizarmos melhorias em nossos processos de fabricação.
                            <br><br>
                            <br>
                            É importante estar por dentro da garantia do seu produto. Trocas solicitadas fora do período de garantia não serão realizadas em qualquer hipótese.
                        </p>
                    </div>
                </div>

                <!--PROMOÇÕES E CUPONS-->
                <div class="pergunta promo-pergunta">
                    <button class="accordion">
                        Onde posso aplicar meu cupom?
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>
                            O cupom somente pode ser aplicado no carrinho, não sendo possível aplicar qualquer cupom após a compra concluída;
                            <br><br>
                            - Somente é permitido um cupom por compra;
                            <br><br>
                            - Algumas ofertas não permitem o uso de cupons.
                        </p>
                    </div>
                </div>

                <div class="pergunta promo-pergunta">
                    <button class="accordion">
                        Como aplicar o cupom de desconto no meu carrinho?
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>
                            O cupom de desconto deve ser aplicado no seu carrinho antes finalizar a compra no local indicado,
                            contendo a informação: CUPOM DE DESCONTO, do lado direito da sua tela e abaixo do total da compra.
                            Após clicar em APLICAR, o desconto do cupom utilizado irá aparecer no carrinho. Caso o valor do desconto não apareça, insira e aplique novamente o cupom antes de finalizar o pedido.
                            se ainda assim o problema persistir no ato da compra que não permita o uso de cupons de desconto, você deve entrar em contato com a nossa Central de Atendimento através do e-mail
                            <strong>2ucaseshop@gmail.com<strong> para que nosso time possa te ajudar.
                        </p>
                    </div>
                </div>

                <div class="pergunta promo-pergunta">
                    <button class="accordion">
                        Posso acumular cupons?
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>
                            Os cupons não são cumulativos com outras promoções e outros cupons em nosso site.
                        </p>
                    </div>
                </div>

            </section>
        </article>

        <article class="fale-conosco">
            <h1>Fale Conosco</h1>

            <section class="fale-container">
                <form action="../controllers/ControllerEmailContact.php" method="POST" class="form-contato">
                    <input type="text" required placeholder="Nome" id="input-nome" class="input-contact" name="nome">

                    <div class="row-contact">
                        <input type="text" required data-js="phone" placeholder="Telefone" id="input-phone" class="input-contact" name="phone" maxlength="15">
                        <input type="text" placeholder="Número do Pedido (opcional)" id="input-pedido" class="input-contact" name="nPedido">
                    </div>

                    <input type="email" placeholder="Email" id="input-nome" class="input-contact" name="email">


                    <select name="assunto" id="select-assunto">
                        <option selected>Assunto</option>
                        <option>Cadastro</option>
                        <option>Cancelamento</option>
                        <option>Entrega</option>
                        <option>Serviços</option>
                        <option>Troca</option>
                        <option>Pagamento</option>
                        <option>Elogio</option>
                        <option>Reclamação</option>
                        <option>Trabalhe Conosoco</option>
                    </select>

                    <textarea name="mensagem" required placeholder="Mensagem" id="msg-input" cols="30" rows="10"></textarea>

                    <div class="row-contact">
                        <label id="input-file-label" for="archive"><i class="fa-solid fa-file fa-2x"></i> Anexar arquivos
                            <input type="file" name="archive" id="input-file" placeholder="Anexar arquivo">
                        </label>
                        <button id="principal-button" type="submit">Enviar</button>
                    </div>
                </form>

                <section class="contact-informations">
                    <div class="address info-container">
                        <img width="60" height="60" src="../assets/./svg/./Location.svg">
                        <p>Endereço: Caixa Postal,
                            26676, Vila Jaguara,
                            São Paulo, SP - CEP: 05116-970</p>
                    </div>
                    <div class="phone info-container">
                        <img width="60" height="60" src="../assets/./svg/./Phone.svg">
                        <p>+55 11 99612-0093</p>
                    </div>
                    <div class="email info-container">
                        <img width="60" height="60" src="../assets/./svg/./Email.svg">
                        <p>vilicapasdesign@capinhas.com</p>
                    </div>
                </section>
            </section>

        </article>
    </main>
</body>

<script src="../assets/js/contact.js"></script>

<!-- Footer -->
<?php require_once './footer.php'; ?>

</html>