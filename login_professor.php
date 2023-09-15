<?php
session_start(); // Inicia a sessão

if (empty($_POST) or (empty($_POST["usuario"])  or (empty($_POST["senha"])))) {
    // Verifica se não há dados enviados via POST ou se os campos "usuario" e "senha" estão vazios
    print "<script>location.href='login_professor.php';</script>"; // Redireciona para index.php
}

include('conexao.php'); // Inclui o arquivo de conexão com o banco de dados

$usuario = $_POST["usuario"]; // Obtém o valor do campo "usuario" enviado via POST
$senha = $_POST["senha"]; // Obtém o valor do campo "senha" enviado via POST
$email = $_POST["email"];
$sobremim = $_POST["sobremim"];
$contato = $_POST["contato"];
$certificados = $_POST["certificados"];
$formacao = $_POST["formacao"];
$instituicoes = $_POST["instituicoes"];

$sql = "SELECT * FROM professor
        WHERE usuario = '{$usuario}'
        AND senha = '{$senha}'
        AND email = '{$email}'"; // Query SQL para selecionar o aluno com o usuário e senha fornecidos

$res = $conn->query($sql) or die($conn->error); // Executa a query no banco de dados

$row = $res->fetch_object(); // Obtém a primeira linha do resultado da query como objeto
$qtd = $res->num_rows; // Obtém o número de linhas retornadas pela query

if ($qtd > 0) {
    // Se o número de linhas for maior que zero, significa que o usuário e a senha estão corretos
    $_SESSION["usuario"] = $usuario; // Armazena o usuário na sessão
    $_SESSION["email"] = $row->email; // Armazena o email do aluno na sessão
    $_SESSION["sobremim"] = $row->sobremim;
    $_SESSION["contato"] = $row->contato;
    $_SESSION["certificados"] = $row->certificados;
    $_SESSION["formacao"] = $row->formacao;
    $_SESSION["instituicoes"] = $row->instituicoes;
    $_SESSION["id"] = $row->id;
    
    print "<script>location.href='editar_perfil_prof.php';</script>"; // Redireciona para aluno.php
} else {
    // Se o número de linhas for igual a zero, significa que o usuário ou senha estão incorretos
    print "<script>alert('Usuário ou senha incorretos');</script>"; // Exibe um alerta com a mensagem de erro
    print "<script>location.href='login_professor.php';</script>"; // Redireciona para index.php
}
?>