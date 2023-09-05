<?php

class FuncionarioModel {
    private $id;
    private $nome;
    private $sobrenome;
    private $idnome;
    private $dtnasc;
    private $salario;

    public function __construct($id, $nome, $sobrenome, $idCargo, $dtnasc, $salario) {
        $this->id = $id;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->idCargo = $idCargo;
        $this->dtnasc = $dtnasc;
        $this->salario = $salario;
    }


    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getsobrenome() {
        return $this->sobrenome;
    }

    public function getIdCargo() {
        return $this->idCargo;
    }

    public function getDtNasc() {
        return $this->dtnasc;
    }

    public function getSalario() {
        return $this->salario;
    }



    public static function criarAPartirDeLinha($row) {
        return new FuncionarioModel($row['id'], $row['nome'], $row['sobrenome'], $row['idCargo'], $row['dtnasc'], $row['salario']);
    }
}
