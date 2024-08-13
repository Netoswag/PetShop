<?php
include('includes/conexao.php');

// Verifique se o id_animal está definido e se é um número válido
if (!isset($_POST['id_animal']) || !is_numeric($_POST['id_animal'])) {
    echo "ID do animal não fornecido ou inválido.";
    exit;
}

$id_animal = intval($_POST['id_animal']); // Sanitize input

// Verifique se os outros campos estão definidos
$nome_animal = isset($_POST['nome_animal']) ? $_POST['nome_animal'] : '';
$especie = isset($_POST['especie']) ? $_POST['especie'] : '';
$raca = isset($_POST['raca']) ? $_POST['raca'] : '';
$dataa = isset($_POST['dataa']) ? $_POST['dataa'] : '';
$ativo = isset($_POST['ativo']) ? intval($_POST['ativo']) : 0;

// Prepare e execute a consulta de atualização
$sql = "UPDATE Animal SET 
    nome_animal = '$nome_animal',
    especie = '$especie',
    raca = '$raca',
    dataa = '$dataa',
    ativo = '$ativo'
    WHERE id_animal = $id_animal";

$result = mysqli_query($con, $sql);

// Verifique se a consulta foi bem-sucedida
if ($result) {
    echo "Dados atualizados com sucesso.";
} else {
    echo "Erro ao atualizar dados: " . mysqli_error($con);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Animal</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Alteração de Animal</h1>
    <button class="btn"><a href="./index.php">Voltar</a></button>
    <?php
    echo "<p>Nome do animal: $nome_animal</p>";
    echo "<p>Espécie: $especie</p>";
    echo "<p>Raça: $raca</p>";
    echo "<p>Data de Nascimento: $dataa</p>";
    echo "<p>Castrado: " . ($ativo ? 'Sim' : 'Não') . "</p>";

    $sql = "UPDATE Animal SET 
        nome_animal = '$nome_animal',
        especie = '$especie',
        raca = '$raca',
        dataa = '$dataa',
        ativo = '$ativo'
        WHERE id_animal = $id_animal";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Dados atualizados com sucesso.";
    } else {
        echo "Erro ao atualizar dados: " . mysqli_error($con);
    }

    mysqli_close($con);
    ?>
</body>
</html>
