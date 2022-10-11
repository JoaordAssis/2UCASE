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
                <button id="pagamento" class="btn-question active">Pagamentos</button>
                <button id="pagamento" class="btn-question">Entrega</button>
                <button id="pagamento" class="btn-question">Produtos e Garantia</button>
                <button id="pagamento" class="btn-question">Trocas, Devoluções e Reembolsos</button>
                <button id="pagamento" class="btn-question">Promoções e Cupons</button>

                <select name="questions-select" id="select-questions-group">
                    <option value="pagamento">Pagamentos</option>
                    <option value="entrega">Entrega</option>
                    <option value="produtogarantia">Produtos e Garantia</option>
                    <option value="TDR">Trocas, Devoluções e Reebombolsos</option>
                    <option value="promo">Promoções e Cupons</option>
                </select>
            </section>

            <section class="accordion-answers">
                <div class="pergunta">
                    <button class="accordion">Pergunta muito requisitada<img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown"></button>
                    <div class="panel">
                        <p>Lorem ipsum...</p>
                    </div>
                </div>

                <div class="pergunta">
                    <button class="accordion">Pergunta muito requisitada<img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown"></button>
                    <div class="panel">
                        <p>Lorem ipsum...</p>
                    </div>
                </div>

                <div class="pergunta">
                    <button class="accordion">Pergunta muito requisitada<img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown"></button>
                    <div class="panel">
                        <p>Lorem ipsum...</p>
                    </div>
                </div>

                <div class="pergunta">
                    <button class="accordion">Pergunta muito requisitada<img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown"></button>
                    <div class="panel">
                        <p>Lorem ipsum...</p>
                    </div>
                </div>

                <div class="pergunta">
                    <button class="accordion">Pergunta muito requisitada<img width="40" height="40" src="../assets/./svg/./arrow.svg" alt="icone de dropdown"></button>
                    <div class="panel">
                        <p>Lorem ipsum...</p>
                    </div>
                </div>
            </section>
        </article>

        <article class="fale-conosco">
            <h1>Fale Conosco</h1>

            <section class="fale-container">
                <form action="#" method="POST" class="form-contato">
                    <input type="text" placeholder="Nome" id="input-nome" class="input-contact" name="nome">

                    <div class="row-contact">

                        <input type="text" data-js="phone" placeholder="Telefone" id="input-phone"
                               class="input-contact"
                               name="phone" maxlength="15">
                        <input type="text" placeholder="Número do Pedido" id="input-pedido" class="input-contact" name="nPedido">
                    </div>

                    <select name="assunto" id="select-assunto">
                        <option selected>Assunto</option>
                        <option value="1">Cadastro</option>
                        <option value="1">Cancelamento</option>
                        <option value="1">Entrega</option>
                        <option value="1">Serviços</option>
                        <option value="1">Troca</option>
                        <option value="1">Pagamento</option>
                        <option value="1">Elogio</option>
                        <option value="1">Reclamação</option>
                        <option value="1">Trabalhe Conosoco</option>
                    </select>
                    <textarea name="mensagem" placeholder="Mensagem" id="msg-input" cols="30" rows="10"></textarea>

                    <div class="row-contact">
                        <label id="input-file-label" for="archive"><i class="fa-solid fa-file fa-2x"></i> Anexar arquivos
                            <input type="file" name="archive" id="input-file" placeholder="Anexar arquivos">
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

<script src="../assets/./js/./contact.js"></script>

<!-- Footer -->
<?php require_once './footer.php'; ?>

</html>