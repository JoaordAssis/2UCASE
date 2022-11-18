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
                        Pergunta muito requisitadaasva
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>Lorem ipsum...</p>
                    </div>
                </div>

                <!--ENTREGA-->
                <div class="pergunta entrega-pergunta">
                    <button class="accordion">
                        Pergunta muito requisitadabdfgd
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>Lorem ipsum...</p>
                    </div>
                </div>

                <!--PRODUTO E GARANTIA-->
                <div class="pergunta prod-garantia-pergunta">
                    <button class="accordion">
                        Pergunta muito requisitadasdvsBBB
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>Lorem ipsum...</p>
                    </div>
                </div>

                <!--TDR-->
                <div class="pergunta tdr-pergunta">
                    <button class="accordion">
                        Pergunta muito requisitadaasdadav
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>Lorem ipsum...</p>
                    </div>
                </div>

                <!--PROMOÇÕES E CUPONS-->
                <div class="pergunta promo-pergunta">
                    <button class="accordion">
                        Pergunta muito requisitadaasdadav
                        <img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown">
                    </button>
                    <div class="panel">
                        <p>Lorem ipsum...</p>
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
                        <input type="text" required data-js="phone" placeholder="Telefone" id="input-phone"
                               class="input-contact"
                               name="phone" maxlength="15">
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