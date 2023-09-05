<!DOCTYPE html>
<html>
<head>
    <title>Editar Funcionario</title>
</head>
<body>
    <h5>Editar Funcionario</h5>
    <form method="POST" action="index.php?action=editarFuncionario&id=<?php echo $funcionario->getId(); ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $funcionario->getNome(); ?>" required>
        <br>
        <label for="sobrenome">Sobrenome:</label>
        <input type="text" id="sobrenome" name="sobrenome" required value="<?php echo $funcionario->getSobrenome(); ?>"></input>
        <br>
        <label for="idCargo">Cargo:</label>
        <select name="idCargo" id="idCargo">
            <?php foreach ($listaCargos as $cargo) { ?>
                <option value="<?php echo $cargo->getId(); ?>"><?php echo $cargo->getCargo(); ?></option>
            <?php } ?>
        </select>        
        <br>
        <label for="dtnasc">Data de Nascimento:</label>
        <input type="date" class="date" id="dtnasc" name="dtnasc" required value="<?php echo $funcionario->getDtNasc(); ?>"></input> 
        <br>
        <label for="salario">Salário:</label>
        <input type="text" id="salario" name="salario" required value="<?php echo $funcionario->getSalario(); ?>"></input>
        <br>
        <input type="submit" value="Salvar">
    </form>
    <br>
    <a href="index.php?action=listarFuncionarios">Voltar para a lista de funcionários</a>
</body>
</html>
