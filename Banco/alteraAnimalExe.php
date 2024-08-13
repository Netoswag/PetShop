<?php
include('includes/conexao.php');

$id_animal = $_POST['id_animal'];
$nome_animal = $_POST['nome_animal'];
$especie = $_POST['especie'];
$raca = $_POST['raca'];
$dataa = $_POST['dataa'];
$idade = $_POST['idade'];
$ativo = $_POST['ativo'];

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
    echo "<p>Idade: $idade</p>";
    echo "<p>Castrado: " . ($ativo ? 'Sim' : 'Não') . "</p>";

    $sql = "UPDATE Animal SET 
        nome_animal = '$nome_animal',
        especie = '$especie',
        raca = '$raca',
        dataa = '$dataa',
        idade = '$idade',
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
