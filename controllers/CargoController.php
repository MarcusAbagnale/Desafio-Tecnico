<?php
require_once './models/CargoModel.php';
require_once './config/DatabaseConnection.php';

class CargoController {
    private $conn;

    public function __construct() {
        $this->conn = DatabaseConnection::getConnection();
    }

    public function cadastrarCargo($cargo, $descricao) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO cargos (cargo, descricao) VALUES (:cargo, :descricao)");
            $stmt->bindParam(':cargo', $cargo);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->execute();
            
            $id = $this->conn->lastInsertId();
            return new CargoModel($id, $cargo, $descricao);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function listarCargos() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM cargos");
            $stmt->execute();
            
            $cargos = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cargo = new CargoModel($row['id'], $row['cargo'], $row['descricao']);
                $cargos[] = $cargo;
            }
            
            return $cargos;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function buscarCargoPorId($id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM cargos WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                return new CargoModel($row['id'], $row['cargo'], $row['descricao']);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function atualizarCargo($id, $cargo, $descricao) {
        try {
            $stmt = $this->conn->prepare("UPDATE cargos SET cargo = :cargo, descricao = :descricao WHERE id = :id");
            $stmt->bindParam(':cargo', $cargo);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':id', $id);
            $result = $stmt->execute();
            
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function excluirCargo($id) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM cargos WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $result = $stmt->execute();
            
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
