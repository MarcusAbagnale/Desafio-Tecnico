<!DOCTYPE html>
<html>
<head>
    <title>Lista de Cargos</title>
</head>
<body>
    <h5>Lista de Cargos</h5>
    <table>
        <tr>
            <th>ID</th>
            <th>Cargo</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($cargos as $cargo) { ?>
            <tr>
                <td><?php echo $cargo->getId(); ?></td>
                <td><?php echo $cargo->getCargo(); ?></td>
                <td><?php echo $cargo->getDescricao(); ?></td>
                <td>
                    <a href="index.php?action=editarCargo&id=<?php echo $cargo->getId(); ?>">Alterar</a> |
                    <a href="index.php?action=excluirCargo&id=<?php echo $cargo->getId(); ?>">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <a href="index.php?action=cadastrarCargo">Inserir Novo Cargo</a>
</body>
</html>
