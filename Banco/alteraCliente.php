<?php
include('includes/conexao.php');
$id = $_GET['id'];
$sql = "SELECT * FROM Cliente WHERE id=$id";
$result = mysqli_query($con, $sql);
if (!$result || mysqli_num_rows($result) == 0) {
    echo "Cliente não encontrado.";
    exit;
}
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Cliente</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container">
    <fieldset>
        <legend>Alteração do Cliente</legend>
        <form action="alteraClienteExe.php" method="post">
            <div class="form-group">
                <label for="nome">Nome do Cliente</label>
                <input type="text" name="nome" id="nome" required value="<?php echo htmlspecialchars($row['nome']); ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" required value="<?php echo htmlspecialchars($row['email']); ?>">
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" required value="<?php echo htmlspecialchars($row['endereco']); ?>">
            </div>
            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="bairro" required value="<?php echo htmlspecialchars($row['bairro']); ?>">
            </div>
            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep" required value="<?php echo htmlspecialchars($row['cep']); ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <button type="submit" class="btn">Atualizar</button>
            </div>
        </form>
    </fieldset>
    <button class="btn"><a href="./index.php">Voltar</a></button>
</div>
</body>
</html>
