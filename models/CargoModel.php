<?php

class CargoModel {
    private $id;
    private $cargo;
    private $descricao;

    public function __construct($id, $cargo, $descricao) {
        $this->id = $id;
        $this->cargo = $cargo;
        $this->descricao = $descricao;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public static function criarAPartirDeLinha($row) {
        return new CargoModel($row['id'], $row['cargo'], $row['descricao']);
    }
}
