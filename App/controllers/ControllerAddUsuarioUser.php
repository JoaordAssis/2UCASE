<?php

require_once __DIR__ . '/../../vendor/autoload.php';
use app\model\Clientes;
use app\model\Endereco;
use app\model\Ferramentas;
use app\model\Manager;

session_start();

if (!empty($_SESSION["USER-ID"])) {

    ?>
<!--Ja esta logado-->
    <form action="../view/login.php?error-code=FR37" name="myForm" id="myForm" method="post">
        <input type="hidden" name="msg" value="Você já esta logado">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>

    <?php

}

//////////////CADASTRO DE NOVO USUARIO//////////
//Verificar recebimento do formulario



if (isset($_REQUEST['cadastroFirstRequest'])){

    $user = new Clientes();
    $ferramentas = new Ferramentas();

    $ferrEmail = $ferramentas->antiInjection($_REQUEST['emailUser']);
    $ferrNome = $ferramentas->antiInjection($_REQUEST['nomeUser']);

    if ($ferrEmail === 0 || $ferrNome === 0){
        //Tentativa de SQL Injection
        header("Location: ../view/login.php?error-code=FR24&form");
        exit();
    }


    $verifyEmail = $user->validaEmail($_REQUEST['emailUser']);
    $verifySenha = $user->validaSenha($_REQUEST['senhaUser']);

    //Checar se o email já existe no banco
    $checkEmail = $user->checkEmailExist($verifyEmail);
    if ($checkEmail === 0){
        header("Location: ../view/login.php?error-code=FR06&form");
        exit();
    }

    if ($verifyEmail !== false && $verifySenha === 1){

        //moreira2706@gmail.com
        $senhaHash = password_hash($_REQUEST['senhaUser'], PASSWORD_ARGON2ID);

        $dadosUsuario[] = $_REQUEST['nomeUser'];
        $dadosUsuario[] = $verifyEmail;
        $dadosUsuario[] = $senhaHash;

        //Sucesso: Prosseguir com o cadastro
        header("Location: ../view/register.php?nome=$dadosUsuario[0]&email=$dadosUsuario[1]&senhaCripto=$dadosUsuario[2]");
        exit();

    }

    if ($verifySenha !== 1){
        header("Location: ../view/login.php?error-code=FR26&form");
        exit();
    }

    if ($verifyEmail === false){
        header("Location: ../view/login.php?error-code=FR27&form");
        exit();
    }


}

//Cadastro Completo

if (isset($_REQUEST['cadastroCompletoForm'])){
    $user = new Clientes();
    $endereco = new Endereco();
    $ferramentas = new Ferramentas();
    $manager = new Manager();

    $nome = filter_input(INPUT_GET, 'nome');
    $email = filter_input(INPUT_GET, 'email');
    $senhaCripto = filter_input(INPUT_GET, 'senhaCripto');

    $injectionCheckLog = $ferramentas->antiInjection($_REQUEST['logradouro']);
    $injectionCheckBairro = $ferramentas->antiInjection($_REQUEST['bairro'] );
    $injectionCheckRef = $ferramentas->antiInjection($_REQUEST['referencia']);
    $injectionCheckCidade = $ferramentas->antiInjection($_REQUEST['cidade']);
    $injectionCheckNomeR = $ferramentas->antiInjection($_REQUEST['nomeR']);
    $injectionCheckComp = $ferramentas->antiInjection($_REQUEST['complemento']);


    if ($injectionCheckLog === 0 || $injectionCheckBairro === 0 || $injectionCheckRef === 0 ||
        $injectionCheckCidade === 0 || $injectionCheckNomeR === 0 || $injectionCheckComp === 0)
    {

        header("Location: ../view/register.php?error-code=FR24&nome=$nome&email=$email&senhaCripto=$senhaCripto");
        exit();
    }

    $cpfVerify = $user->CPFVerify($_REQUEST['cpf']);

    if ($cpfVerify !== true){

        header("Location: ../view/register.php?error-code=FR28&nome=$nome&email=$email&senhaCripto=$senhaCripto");
        exit();
    }


    $sanitizeCPF = $user->sanitizeField($_REQUEST['cpf']);
    $sanitizeNumber = $user->sanitizeField($_REQUEST['numeroCelular']);
    $sanitizeNumeroFixo = $user->sanitizeField($_REQUEST['numeroFixo']);

    //Checar se o CPF já existe no banco
    $checkCPF = $user->checkCPFExist($sanitizeCPF);
    if ($checkCPF === 0){
        $returnPage = $_SERVER['HTTP_REFERER'] . "&error-code=FR36";
        header("Location: $returnPage");
        exit();
    }

    //Assinalando os dados
    $dadosUsuario['nome_cliente'] = $_REQUEST['nomeCompleto'];
    $dadosUsuario['email_cliente'] = $_REQUEST['emailUserVerify'];
    $dadosUsuario['senha_cliente'] = $_REQUEST['senhaUserVerify'];
    $dadosUsuario['cpf_cliente'] = $sanitizeCPF;
    $dadosUsuario['data_nasc_cliente'] = $_REQUEST['dataNasc'];
    $dadosUsuario['telefone_cliente'] = $sanitizeNumber;
    $dadosUsuario['telefoneFixo_cliente'] = $sanitizeNumeroFixo !== '' ? $sanitizeNumeroFixo : 'NULL';
    $dadosUsuario['genero_cliente'] = $_REQUEST['gender'];
    $dadosUsuario['status'] = 1;


    $cepVerify = $endereco->verifyCEP($_REQUEST['cep']);

    if ($cepVerify !== true){

        $returnPage = $_SERVER['HTTP_REFERER'] . "&error-code=FR29";
        header("Location: $returnPage");
        exit();
    }

    //INSERT USUARIO
    try {
       $manager->insertClient("user_cliente", $dadosUsuario);
    }catch (PDOException $exception){
         echo $exception->getCode();
         header("Location: ../view/register.php?error-code=FR31&nome=$nome&email=$email&senhaCripto=$senhaCripto");
         exit();
    }


    $lastInsert = $manager->lastInsertId('user_cliente', 'id_cliente');
    $sanitizeCEP = $user->sanitizeField($_REQUEST['cep']);


    $dadosEndereco['id_cliente'] = $lastInsert[0];
    $dadosEndereco['cep_cliente'] = $sanitizeCEP;
    $dadosEndereco['logradouro_cliente'] = $_REQUEST['logradouro'];
    $dadosEndereco['ponto_ref_cliente'] = $_REQUEST['referencia'] !== '' ? $_REQUEST['referencia'] : NULL;
    $dadosEndereco['uf_cliente'] = $_REQUEST['state'];
    $dadosEndereco['cidade_cliente'] = $_REQUEST['cidade'];
    $dadosEndereco['numero_cliente'] = $_REQUEST['numero'];
    $dadosEndereco['complemento_cliente'] = $_REQUEST['complemento'] !== '' ? $_REQUEST['complemento'] : NULL;
    $dadosEndereco['bairro_cliente'] = $_REQUEST['bairro'];
    $dadosEndereco['nomeR_cliente'] = $_REQUEST['nomeR'];

    //INSERT ENDERECO USUARIO
    try {
        $manager->insertClient("user_endereco_cliente", $dadosEndereco);
        header("Location: ../view/homepage.php?sucess-code=FR50");
        exit();
    }catch (PDOException $exception){
        echo $exception->getMessage();
        header("Location: ../view/login.php?error-code=FR32");
    }


}