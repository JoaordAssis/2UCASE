
//Variavéis de Erro
let errors = {
    "FR00" : "Falha ao enviar formulário. Tente novamente em alguns instantes",
    "FR01" : "Dados não preenchidos. Preencha todos os campos para prosseguir",
    "FR02" : "Dados preenchidos incorretamente. Revise os campos preenchidos",
    "FR03" : "Senha incorreta. Se não se lembra da sua senha clique em 'Esqueceu a senha?'",
    "FR04" : "As duas senhas não são iguais. Verifique se as senhas estão certas",
    "FR06" : "Esse email já está em uso. Utilize outro email",
    "FR07" : "CPF incorreto. Verifique se o CPF digitado está certo",
    "FR08" : "CPF desconhecido. Verifique se o CPF digitado está certo",
    "FR09" : "E-mail incorreto. Por favor, digite novamente.",
    "FR10" : "E-mail desconhecido.",
    "FR13" : "Escolha apenas uma opção.",
    "FR14" : "Escolha no máximo duas opções.",
    "FR15" : "Escolha no máximo três opções.",
    "FR16" : "Arquivo incorreto.",
    "FR17" : "Tamanho do arquivo excede o limite permitido.",
    "FR19" : "Esse tipo de arquivo não é aceito. Aceitamos apenas arquivos .png, .pdf e .jpg, .jpeg",
    "FR21" : "Arquivo sem extensão não é aceito.",
    "FR22" : "Nome de arquivo não aceito.",
    "FR24" : "Caracteres não são aceitos. Tente outro nome",
    "FR25" : "Conta não encontrada! Verifique se a senha e o email/CPF estão corretos e tente novamente!",
    "FR26" : "A senha deve conter um mínimo de 6 e no máximo 15 caracteres.\n" +
        "Deve ter somente letras, números e caracteres especiais(!#@$%&)\n" +
        "Deve ter no mínimo uma letra maiúscula e minúscula.\n" +
        "Deve ter no mínimo um numero.\n" +
        "Deve ter no mínimo caractere especial(!#@$%&)",
    "FR27" : "Email inválido, tente outro",
    "FR28" : "CPF inválido. Verifique se ele foi digitado corretamente",
    "FR29" : "CEP inválido. Verifique se ele foi digitado corretamente",
    "FR30" : "Dados não recebidos corretamente, por favor tente novamente em alguns instantes!",
    "FR31" : "Falha ao criar a sua conta, tente novamente em alguns instantes!",
    "FR32" : "Falha ao armazenar o seu endereço, tente novamente em alguns instantes!",
    "FR33" : "Verifique se o CEP foi digitado corretamente e clique novamente no botão",
    "FR34" : "Não foi possível atualizar as suas informações, tente novamente em alguns instantes!",
    "FR35" : "Os dois emails não são iguais. Verifique se os emails estão certas",
    "FR36" : "Já existe uma conta com este CPF, caso não se lembre da senha; volte e clique em 'Esqueceu a senha?'",
    "FR37" : "Você já está logado, para entrar em outra conta se deslogue primeiro!",
    "FR38" : "Falha ao enviar o email, tente novamente em alguns instantes.",
    "FR39" : "Falha ao realizar o login com o Google, tente novamente em alguns minutos!.",
    "FR40" : "Já existe uma conta cadastrada com esse email, realize o login por ela!.",
    "FR41" : "Por favor, verifique se selecionou os campos necessarios.",
    "FR50" : "Conta criada com sucesso.",
    "FR51" : "Arquivo enviado com sucesso.",
    "FR52" : "Informações atualizadas com sucesso!",
    "FR53" : "Email enviado com sucesso, em instantes responderemos.",
    "OA00" : "Faça o login antes de prosseguir.",
    "OA01" : "Não há autorização para acessar a área solicitada.",
    "OA02" : "Erro: não foi possível efetuar o login. Tente novamente em alguns instantes",
    "OA50" : "Você foi logado com sucesso",
    "OA51" : "Sessão finalizada com sucesso.",
    "CP01" : "Não foi possivel localizar o seu carrinho, tente novamente em alguns instantes!.",
    "CP02" : "Não foi possivel adicionar o produto ao seu carrinho, tente novamente em alguns instantes!.",
    "CP03" : "Não foi possivel deletar o produto, tente novamente em alguns instantes!",
    "CP04" : "Ocorreu um erro ao atualizar o seu carrinho, tente novamente em alguns instantes!",
    "CP05" : "Não foi possivel concluir a compra, tente novamente em alguns instantes!",
    "CP50" : "Produto adicionado ao seu carrinho com sucesso!",
    "CP51" : "Produto apagado do seu carrinho com sucesso!",
    "CP52" : "Compra concluida com sucesso!",
    "CP53" : "Produto atualizado com sucesso!",
    "PG01" : "Pagina não encontrada.",
    "PG02" : "Não foi possivel encontrar os resultados desejados!.",
    "PG03" : "Não foi possivel avaliar o produto, tente novamente em alguns instantes!.",
    "PG04" : "Cupom inválido, verifique se o digitou corretamente ou se ele é valido para esse produto!",
    "PG50" : "Produto adicionado ao seu carrinho com sucesso!",
    "PG51" : "Produto avaliado com sucesso!",
};

let containerError = document.getElementById("container-error");
let textError = document.getElementById("error-exib");
let urlObject = new URL(window.location.href);
let dataError = urlObject.searchParams.has('error-code');

if (dataError === true){
    let errorGet = urlObject.searchParams.get('error-code');
    containerError.style.display = 'block';
    textError.innerText = errors[errorGet];
}

