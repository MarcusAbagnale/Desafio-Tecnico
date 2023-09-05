<?php
require_once 'controllers/CargoController.php';
require_once 'controllers/FuncionarioController.php';

$cargoController = new CargoController();
$funcionarioController = new FuncionarioController();

$listaCargos = $cargoController->listarCargos();

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'listarCargos':
        $cargos = $cargoController->listarCargos();
        include 'views/Cargos/listarCargos.php';
        break;

        case 'cadastrarCargo':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cargo = $_POST['cargo'];
            $descricao = $_POST['descricao'];
            $resultado = $cargoController->cadastrarCargo($cargo, $descricao);
            echo $resultado ? "Cargo cadastrado com sucesso!" : "Erro ao cadastrar o cargo.";
            echo '<hr><a href="index.php?action=listarCargos">Voltar para a lista de cargos</a>';
        } else {
            include 'views/Cargos/formCadastroCargo.php';
        }
        break;

        case 'editarCargo':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $cargo = $_POST['cargo'];
                $descricao = $_POST['descricao'];
                $resultado = $cargoController->atualizarCargo($id, $cargo, $descricao);
                echo $resultado ? "Cargo atualizado com sucesso!" : "Erro ao atualizar o cargo.";
                echo '<hr><a href="index.php?action=listarCargos">Voltar para a lista de cargos</a>';
            } else {
                $cargo = $cargoController->buscarCargoPorId($id);
                if ($cargo) {
                    include 'views/Cargos/formEditarCargo.php';
                } else {
                    echo "Cargo não encontrado.";
                }
            }
        } else {
            echo "ID do cargo não especificado.";
        }
        break;

        case 'excluirCargo':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $resultado = $cargoController->excluirCargo($id);
            echo $resultado ? "Cargo excluído com sucesso!" : "Erro ao excluir o cargo.";
            echo '<hr><a href="index.php?action=listarCargos">Voltar para a lista de cargos</a>';
        } else {
            echo "ID do cargo não especificado.";
        }
        break;

        case 'listarFuncionarios':
        $funcionarios = $funcionarioController->listarFuncionarios();

        include 'views/Funcionarios/listarFuncionarios.php';
        break;

        case 'cadastrarFuncionario':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $idCargo = $_POST['idCargo'];
            $dtnasc = $_POST['dtnasc'];
            $salario = $_POST['salario'];

            $resultado = $funcionarioController->cadastrarFuncionario($nome, $sobrenome, $idCargo, $dtnasc, $salario);

            echo $resultado ? "Funcionario cadastrado com sucesso!" : "Erro ao cadastrar o funcionario.";
            echo '<hr><a href="index.php?action=listarFuncionarios">Voltar para a lista de funcionarios</a>';

        } else {
            include 'views/Funcionarios/formCadastroFuncionario.php';
        }
        break;

        case 'editarFuncionario':


        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $nome = $_POST['nome'];
                $sobrenome = $_POST['sobrenome'];
                $idCargo = $_POST['idCargo'];
                $dtnasc = $_POST['dtnasc'];
                $salario = $_POST['salario'];
                $resultado = $funcionarioController->atualizarFuncionario($id, $nome, $sobrenome, $idCargo, $dtnasc, $salario);
                echo $resultado ? "Funcionario atualizado com sucesso!" : "Erro ao atualizar o funcionario.";
                echo '<hr><a href="index.php?action=listarFuncionarios">Voltar para a lista de funcionários</a>';
            } else {
                $funcionario = $funcionarioController->buscarFuncionarioPorId($id);

                if ($funcionario) {
                    include 'views/Funcionarios/formEditarFuncionario.php';
                    
                } else {
                    echo "Funcionario não encontrado.";
                }
            }
        } else {
            echo "ID do cargo não especificado.";
        }
        break;

        case 'excluirFuncionario':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $resultado = $funcionarioController->excluirFuncionario($id);
            echo $resultado ? "Funcionário excluído com sucesso!" : "Erro ao excluir o funcionario.";
            echo '<hr><a href="index.php?action=listarFuncionarios">Voltar para a lista de funcioanarios</a>';

        } else {
            echo "ID do funcionário não especificado.";
        }
        break;
    }
} else {

    echo '<h1> Seja Bem vindo! </h1></br> <h5>Navegue no menu lateral <--</h5>';
}

?>