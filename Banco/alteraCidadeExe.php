<?php
include('includes/conexao.php');

$nomecidade = $_POST['nomecidade'];
$estado = $_POST['estado'];

$sql = "INSERT INTO Cidade (nomecidade, estado) VALUES ('$nomecidade', '$estado')";
$result = mysqli_query($con, $sql);

if ($result) {
    echo "Cidade cadastrada com sucesso.";
} else {
    echo "Erro ao cadastrar a cidade: " . mysqli_error($con);
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cidade</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <button class="btn"><a href="./index.php">Voltar</a></button>
</body>
</html>
