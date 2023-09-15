<?php
session_start(); // Inicia a sessão

if (empty($_POST) or (empty($_POST["usuario"])  or (empty($_POST["senha"])))) {
    // Verifica se não há dados enviados via POST ou se os campos "usuario" e "senha" estão vazios
    print "<script>location.href='index.php';</script>"; // Redireciona para index.php
}

include('conexao.php'); // Inclui o arquivo de conexão com o banco de dados

$usuario = $_POST["usuario"]; // Obtém o valor do campo "usuario" enviado via POST
$senha = $_POST["senha"]; // Obtém o valor do campo "senha" enviado via POST
$escolaridade = $_POST["escolaridade"];
$instituicao = $_POST["instituicao"];
$materia = $_POST["materia"];
$sobremim = $_POST["sobremim"];

$sql = "SELECT * FROM aluno
        WHERE usuario = '{$usuario}'
        AND senha = '{$senha}'"; // Query SQL para selecionar o aluno com o usuário e senha fornecidos

$res = $conn->query($sql) or die($conn->error); // Executa a query no banco de dados

$row = $res->fetch_object(); // Obtém a primeira linha do resultado da query como objeto
$qtd = $res->num_rows; // Obtém o número de linhas retornadas pela query

if ($qtd > 0) {
    
    $_SESSION["usuario"] = $usuario; // Armazena o usuário na sessão
    $_SESSION["email"] = $row->email; // Armazena o email do aluno na sessão
    $_SESSION["escolaridade"] = $row->escolaridade;
    $_SESSION["instituicao"] = $row->instituicao;
    $_SESSION["materia"] = $row->materia;
    $_SESSION["sobremim"] = $row->sobremim;
    $_SESSION["id"] = $row->id;

    print "<script>location.href='tela_inicial_aluno.php';</script>"; // Redireciona para aluno.php
} else {
    // Se o número de linhas for igual a zero, significa que o usuário ou senha estão incorretos
    print "<script>alert('Usuário ou senha incorretos');</script>"; // Exibe um alerta com a mensagem de erro
    print "<script>location.href='login_aluno.php';</script>"; // Redireciona para index.php
}

?>


