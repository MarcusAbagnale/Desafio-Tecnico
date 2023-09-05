<!DOCTYPE html>
<html>
<head>
    <title>Editar Cargo</title>
</head>
<body>
    <h5>Editar Cargo</h5>
    <form method="POST" action="index.php?action=editarCargo&id=<?php echo $cargo->getId(); ?>">
        <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="cargo" value="<?php echo $cargo->getCargo(); ?>" required>
        <br>
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required><?php echo $cargo->getDescricao(); ?></textarea>
        <br>
        <input type="submit" value="Salvar">
    </form>
    <br>
    <a href="index.php?action=listarCargos">Voltar para a lista de cargos</a>
</body>
</html>
