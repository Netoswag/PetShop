<?php
include('includes/conexao.php');

// Verifica se a conexão foi bem-sucedida
if (!$con) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Recebe os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$id_cidade = $_POST['id_cidade'];

// Prepara a consulta SQL
$sql = "INSERT INTO Cliente (nome, email, endereco, bairro, cep, id_cidade) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($con, $sql);

// Verifica se a preparação da consulta foi bem-sucedida
if (!$stmt) {
    die("Erro na preparação da consulta: " . mysqli_error($con));
}

// Bind dos parâmetros
mysqli_stmt_bind_param($stmt, 'sssssi', $nome, $email, $endereco, $bairro, $cep, $id_cidade);

// Executa a consulta
if (mysqli_stmt_execute($stmt)) {
    echo "Cliente cadastrado com sucesso.";
} else {
    echo "Erro ao cadastrar cliente: " . mysqli_error($con);
}

// Fecha a conexão
mysqli_stmt_close($stmt);
mysqli_close($con);
?>
