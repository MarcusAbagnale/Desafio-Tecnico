<?php
require_once './models/FuncionarioModel.php';
require_once './config/DatabaseConnection.php';
require_once('CargoController.php');

class FuncionarioController {
    private $conn;

    public function __construct() {
        $this->conn = DatabaseConnection::getConnection();
    }

    public function cadastrarFuncionario($nome, $sobrenome, $idCargo, $dtnasc, $salario) {
        try {
            $sql = "INSERT INTO funcionarios (nome, sobrenome, idCargo, dtnasc, salario ) VALUES (:nome, :sobrenome, :idCargo, :dtnasc, :salario)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':sobrenome', $sobrenome);
            $stmt->bindParam(':idCargo', $idCargo);
            $stmt->bindParam(':dtnasc', $dtnasc);
            $stmt->bindParam(':salario', $salario);
            $stmt->execute();

            $id = $this->conn->lastInsertId();
            return new FuncionarioModel($id, $nome, $sobrenome, $idCargo, $dtnasc, $salario);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function listarFuncionarios() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM funcionarios");
            $stmt->execute();

            $funcionarios = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

              $salarioFormatado = 'R$ ' . number_format($row['salario'], 2, ',', '.');

              $cargoController = new CargoController();
              $cargo = $cargoController->buscarCargoPorId($row['idCargo']);

              if ($cargo !== false) {
                $nomeCargo = $cargo->getCargo();
            } else {
                $nomeCargo = 'Cargo não encontrado';
            }

            $funcionario = new FuncionarioModel(
                $row['id'],
                $row['nome'],
                $row['sobrenome'],
                $nomeCargo,
                date('d/m/Y', strtotime($row['dtnasc'])), // Correção na formatação da data
                $salarioFormatado
            );
            $funcionarios[] = $funcionario;
        }

        return $funcionarios;
    } catch (PDOException $e) {
        // Lide com a exceção aqui, se necessário
        return false;
    }
}


public function buscarFuncionarioPorId($id) {
    try {
        $stmt = $this->conn->prepare("SELECT * FROM funcionarios WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new FuncionarioModel($row['id'], $row['nome'], $row['sobrenome'], $row['idCargo'], $row['dtnasc'], $row['salario']);
        } else {
            return false;
        }
    } catch (PDOException $e) {
        return false;
    }
}

public function atualizarFuncionario($id, $nome, $sobrenome, $idCargo, $dtnasc, $salario) {
    try {
        $stmt = $this->conn->prepare("UPDATE funcionarios SET nome = :nome, sobrenome = :sobrenome, idCargo = :idCargo, dtnasc = :dtnasc, salario = :salario WHERE id = :id");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':idCargo', $idCargo);
        $stmt->bindParam(':dtnasc', $dtnasc);
        $stmt->bindParam(':salario', $salario);
        $result = $stmt->execute();

        return $result;
    } catch (PDOException $e) {
        return false;
    }
}

public function excluirFuncionario($id) {
    try {
        $stmt = $this->conn->prepare("DELETE FROM funcionarios WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();

        return $result;
    } catch (PDOException $e) {
        return false;
    }
}
}
?>
