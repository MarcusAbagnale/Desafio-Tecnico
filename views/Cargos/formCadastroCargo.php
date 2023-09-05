<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Novo Cargo</title>
</head>
<body>
    <h5>Cadastrar Novo Cargo</h5>
    <form method="POST" action="index.php?action=cadastrarCargo">
        <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="cargo" required>
        <br>
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required></textarea>
        <br>
        <input type="submit" value="Cadastrar">
    </form>
    <br>
    <a href="index.php?action=listarCargos">Voltar para a lista de cargos</a>
</body>
</html>
