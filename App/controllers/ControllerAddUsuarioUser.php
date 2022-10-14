<?php

require_once __DIR__ . '/../../vendor/autoload.php';
use app\model\Clientes;
use app\model\Endereco;
use app\model\Ferramentas;
use app\model\Manager;

session_start();

if (!empty($_SESSION["USER-D"])) {

    ?>

    <form action="../view/login.php" name="myForm" id="myForm" method="post">
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
        //Retornar à pagina de login
        //Tentativa de antiinjection
        $msgError = '25';

        //TODO: Fazer tratamento de Erro
        header("Location: ../view/login.php?msgERROR=$msgError");
        exit();
    }


    $verifyEmail = $user->validaEmail($_REQUEST['emailUser']);
    $verifySenha = $user->validaSenha($_REQUEST['senhaUser']);

    //Checar se o email já existe no banco
    $checkEmail = $user->checkEmailExist($verifyEmail);
    if ($checkEmail === 0){
        //TODO: Tratamento de Erro
        header("Location: ../view/login.php");
        exit();
    }

    if ($verifyEmail !== false && $verifySenha === 1){

        $senhaHash = $ferramentas->hash256($verifySenha);

        $dadosUsuario[] = $_REQUEST['nomeUser'];
        $dadosUsuario[] = $verifyEmail;
        $dadosUsuario[] = $senhaHash;

        header("Location: ../view/register.php?nome=$dadosUsuario[0]&email=$dadosUsuario[1]&senhaCripto=$dadosUsuario[2]");
        exit();
    }
}


if (isset($_REQUEST['cadastroCompletoForm'])){
    $user = new Clientes();
    $endereco = new Endereco();
    $ferramentas = new Ferramentas();
    $manager = new Manager();

    $cpfVerify = $user->CPFVerify($_REQUEST['cpf']);

    if ($cpfVerify !== true){

        //TODO: Tratamento de Erro
        header("Location: ../view/register.php");
        exit();
    }


    //Assinalando os dados
    $dadosUsuario['nome_cliente'] = $_REQUEST['nomeCompleto'];
    $dadosUsuario['email_cliente'] = $_REQUEST['emailUserVerify'];
    $dadosUsuario['senha_cliente'] = $_REQUEST['senhaUserVerify'];
    $dadosUsuario['cpf_cliente'] = $_REQUEST['cpf'];
    $dadosUsuario['data_nasc_cliente'] = $_REQUEST['dataNasc'];
    $dadosUsuario['telefone_cliente'] = $_REQUEST['numeroCelular'];
    $dadosUsuario['telefoneFixo_cliente'] = $_REQUEST['numeroFixo'] !== '' ? $_REQUEST['numeroFixo'] : 'NULL';
    $dadosUsuario['genero_cliente'] = $_REQUEST['gender'];

    //INSERT USUARIO
    try {
        $manager->insertClient("user_cliente", $dadosUsuario);
        //TODO: Tratamento de Erros
    }catch (PDOException $exception){
        return $exception->getMessage();
    }

    $cepVerify = $endereco->verifyCEP($_REQUEST['cep']);

    if ($cepVerify !== true){

        //TODO: Tratamento de Erro
        header("Location: ../view/register.php");
        exit();
    }

    $lastInsert = $manager->lastInsertId('user_cliente', 'id_cliente');

    $dadosEndereco['id_cliente'] = $lastInsert[0];
    $dadosEndereco['cep_cliente'] = $_REQUEST['cep'];
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
        header("Location: ../view/homepage.php");
        exit();
        //TODO: Tratamento de Erro
    }catch (PDOException $exception){
        echo $exception->getMessage();
    }


}