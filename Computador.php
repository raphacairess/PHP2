<?php

class Computador {
    private $usuarioPrincipal;
    private $nomeMaquina;
    private $status;
    private $programaEmExecucao;

    public function __construct($usuarioPrincipal, $nomeMaquina) {
        $this->usuarioPrincipal = $usuarioPrincipal;
        $this->nomeMaquina = $nomeMaquina;
        $this->status = false;
        $this->programaEmExecucao = null;
    }

    public function getUsuarioPrincipal() {
        return $this->usuarioPrincipal;
    }

    public function setUsuarioPrincipal($usuarioPrincipal) {
    if(empty($usuarioPrincipal)){
    $this->usuarioPrincipal = "Usuario Não encontrado";
    } else {
    $this->usuarioPrincipal = $usuarioPrincipal;
    }
    }

    public function getNomeMaquina() {
        return $this->nomeMaquina;
    }

    public function setNomeMaquina($nomeMaquina) {
     if (empty($nomeMaquina)){
    $this->nomeMaquina = "Nome Não Encontrado";
     }
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getProgramaEmExecucao() {
        return $this->programaEmExecucao;
    }

    public function setProgramaEmExecucao($programaEmExecucao) {
        $this->programaEmExecucao = $programaEmExecucao;
    }

    public function ligar() {
        if (!$this->status) {
            $this->status = true;
            return true;
        } else {
            return false;
        }
    }

    public function desligar() {
        if ($this->status && $this->programaEmExecucao === null) {
            $this->status = false;
            return true;
        } else {
            return false;
        }
    }

    public function executaPrograma($programa) {
        if ($this->status) {
            $this->programaEmExecucao = $programa;
            return true;
        } else {
            return false;
        }
    }

    public function show() {
        echo "Usuário Principal: {$this->getUsuarioPrincipal()} Nome da Máquina: {$this->getNomeMaquina()}";
        echo " Status: " . ($this->getStatus() ? "Ligado" : "Desligado") . "</br>";
        if ($this->getStatus()) {
            echo "Programa em Execução: " . ($this->getProgramaEmExecucao() ?: "Nenhum") . "</br>";
        }
    }
}

// Teste
$computador1 = new Computador("Valdir", "Acer Nitro");
$computador2 = new Computador("Borba", "macBook");

$computador1->ligar();
$computador1->executaPrograma("VScode");

$computador2->ligar();
$computador2->executaPrograma("Valorant");

$computador1->show();
$computador2->show();