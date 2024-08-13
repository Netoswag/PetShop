<?php
    include('includes/conexao.php');

    if (isset($_GET['id'])) {
        $id_cidade = $_GET['id'];
        $sql = "SELECT * FROM Cidade WHERE id_cidade = $id_cidade";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Cidade não encontrada.";
            exit;
        }
    } else {
        echo "ID da cidade não fornecido.";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Cidade</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container">
        <fieldset>
            <legend>Alteração da Cidade</legend>
            <form action="alteraCidadeExe.php" method="post">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nomecidade" id="nomecidade" required value="<?php echo htmlspecialchars($row['nomecidade']); ?>">
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" required>
                        <option value="SP" <?php echo ($row['estado'] == "SP") ? "selected" : ""; ?>>SP</option>
                        <option value="RJ" <?php echo ($row['estado'] == "RJ") ? "selected" : ""; ?>>RJ</option>
                        <option value="MG" <?php echo ($row['estado'] == "MG") ? "selected" : ""; ?>>MG</option>
                        <option value="ES" <?php echo ($row['estado'] == "ES") ? "selected" : ""; ?>>ES</option>
                    </select>
                </div>
                <div>
                    <input type="hidden" name="id_cidade" value="<?php echo $row['id_cidade']; ?>">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Atualizar</button>
                </div>
            </form>
        </fieldset>
        <button class="btn"><a href="./index.php">Voltar</a></button>
    </div>
</body>
</html>