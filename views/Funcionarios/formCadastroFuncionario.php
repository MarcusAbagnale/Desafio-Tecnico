<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Novo Funcionário</title>
</head>
<body>
    <h5>Cadastrar Novo Funcionário</h5>
    <form method="POST" action="index.php?action=cadastrarFuncionario">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br>
        <label for="sobrenome">Sobrenome:</label>
        <input type="text" id="sobrenome" name="sobrenome" required></input>
        <br>
        <label for="idCargo">Cargo:</label>
        <select name="idCargo" id="idCargo">
            <?php foreach ($listaCargos as $cargo) { ?>
                <option value="<?php echo $cargo->getId(); ?>"><?php echo $cargo->getCargo(); ?></option>
            <?php } ?>
        </select> 
        <br>
        <label for="dtnasc">Data de Nascimento:</label>
        <input type="date" class="date" id="dtnasc" name="dtnasc" required></input>
        <br>
        <label for="salario">Salario:</label>
        <input type="number" class="number" id="salario" name="salario" required></input>
        <br>
        <input type="submit" value="Cadastrar">
    </form>
    <br>
    <a href="index.php?action=listarFuncionarios">Voltar para a lista de funcionarios</a>
</body>
</html>
