<?php
include('includes/conexao.php');
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
    <title>Dados do Cliente</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <div class="container">
    <?php
        include('includes/conexao.php');
        $nome_animal = $_POST['nome_animal'];
        $especie = $_POST['especie'];
        $raca = $_POST['raca'];
        $dataa = $_POST['dataa'];
        $idade = $_POST['idade'];
        $ativo = $_POST['ativo'];
        
        echo "<h1>Dados do Animal</h1>";
        echo "Nome do Animal: $nome_animal<br>";
        echo "Especie: $especie<br>";
        echo "Raça: $raca<br>";
        echo "Data: $dataa<br>";
        echo "Idade: $idade<br>";
        echo "Castrado: $ativo<br>";
        
        $sql =  "INSERT INTO Animal (nome_animal,especie, raca, dataa,idade,ativo)";
        $sql .= " VALUES ('".$nome_animal."','".$especie."','".$raca."','".$dataa."','".$idade."','".$ativo."')";
        echo "<p>" . $sql . "</p>";
        $result = mysqli_query($con,$sql);
        if($result){
            echo "<h2>Dados Cadastrados com sucesso</h2>";
        } else {
            echo "<h2>Erro ao cadastrar</h2>";
            echo "<p>" . mysqli_error($con) . "</p>";
        }
    ?>
    <button class="btn"><a href="./index.php">Voltar</a></button>
  </div>
</body>
</html>