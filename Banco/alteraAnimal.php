<?php
include('includes/conexao.php');

if (isset($_GET['id'])) {
    $id_animal = $_GET['id'];
    $sql = "SELECT * FROM Animal WHERE id_animal = $id_animal";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Animal não encontrado.";
        exit;
    }
} else {
    echo "ID do animal não fornecido.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração dos Animais</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container">
        <fieldset>
            <legend>Alteração do Animal</legend>
            <form action="alteraAnimalExe.php" method="post">
                <input type="hidden" name="id_animal" value="<?php echo $row['id_animal']; ?>">
                <div class="form-group">
                    <label for="nome_animal">Nome</label>
                    <input type="text" name="nome_animal" id="nome_animal" required value="<?php echo htmlspecialchars($row['nome_animal']); ?>">
                </div>
                <div class="form-group">
                    <label for="especie">Espécie</label>
                    <input type="text" name="especie" id="especie" required value="<?php echo htmlspecialchars($row['especie']); ?>">
                </div>
                <div class="form-group">
                    <label for="raca">Raça</label>
                    <input type="text" name="raca" id="raca" required value="<?php echo htmlspecialchars($row['raca']); ?>">
                </div>
                <div class="form-group">
                    <label for="dataa">Data de Nascimento</label>
                    <input type="text" name="dataa" id="dataa" required value="<?php echo htmlspecialchars($row['dataa']); ?>">
                </div>
                <div class="form-group">
                    <label for="idade">Idade</label>
                    <input type="text" name="idade" id="idade" required value="<?php echo htmlspecialchars($row['idade']); ?>">
                </div>
                <div class="form-group">
                    <label>Castrado?</label>
                    <div class="radio-group">
                        <input type="radio" id="castrado_sim" name="ativo" value="1" <?php echo $row['ativo'] == 1 ? 'checked' : ''; ?>>
                        <label for="castrado_sim">Sim</label>
                    </div>
                    <div class="radio-group">
                        <input type="radio" id="castrado_nao" name="ativo" value="0" <?php echo $row['ativo'] == 0 ? 'checked' : ''; ?>>
                        <label for="castrado_nao">Não</label>
                    </div>
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
