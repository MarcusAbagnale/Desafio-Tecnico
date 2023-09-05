<!DOCTYPE html>
<html>
<head>
    <title>Lista de Funcionários</title>
</head>
<body>
    <h5>Lista de Funcionários</h5>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Cargo</th>
            <th>Data de Nascimento</th>
            <th>Salário</th>
            <th>Aniversário</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($funcionarios as $funcionario) { ?>
            <tr>
                <td><?php echo $funcionario->getId(); ?></td>
                <td><?php echo $funcionario->getNome(); ?></td>
                <td><?php echo $funcionario->getSobrenome(); ?></td>
                <td><?php echo $funcionario->getidCargo(); ?></td>
                <td class="txt_center"><?php echo $funcionario->getDtNasc(); ?></td>
                <td><?php echo $funcionario->getSalario(); ?></td>
                <td>
                    <?php

                    $dataNascimento = $funcionario->getDtNasc();
                    $dataAtual = date('d/m');

                    list($diaNascimento, $mesNascimento) = explode('/', $dataNascimento);
                    list($diaAtual, $mesAtual) = explode('/', $dataAtual);

                    if ($diaNascimento === $diaAtual && $mesNascimento === $mesAtual) {
                        echo "Parabéns por mais um ano de vida! Tenha um dia repleto de felicidades.";
                    }



                    ?>
                </td>
                <td>
                    <a href="index.php?action=editarFuncionario&id=<?php echo $funcionario->getId(); ?>">Alterar</a> |
                    <a href="index.php?action=excluirFuncionario&id=<?php echo $funcionario->getId(); ?>">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <a href="index.php?action=cadastrarFuncionario">Inserir Novo Funcionário</a>
</body>
</html>
