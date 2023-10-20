<?php
class Conta {
    private $banco;
    private $agencia;
    private $numeroConta;
    private $saldo;

    public function __construct($banco, $agencia, $numeroConta, $saldo) {
        $this->banco = $banco;
        $this->agencia = $agencia;
        $this->numeroConta = $numeroConta;
        $this->saldo = max(0, $saldo);
    }

    public function getBanco() {
        return $this->banco;
    }

    public function setBanco($banco) {
     if (empty(banco)) {
    $this->banco = banco;
     }
    }

    public function getAgencia() {
        return $this->agencia;
    }

    public function setAgencia($agencia) {
       if(agencia < 0){
        $this->agencia = 'Numero ínvalido';
       } else {
        $this->agencia = $agencia;
       }
    }

    public function getNumeroConta() {
        return $this->numeroConta;
    }

    public function setNumeroConta($numeroConta) {
    if ($numeroConta < 0){
        $this->numeroConta = 'Numero ínvalido';
    } else {
    $this->numeroConta = $numeroConta;
      }
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function setSaldo($saldo) {
        $this->saldo = max(0, $saldo);
    }

    public function deposito($valor) {
        if ($valor > 0) {
            $this->saldo += $valor;
            return true;
        } else {
            return false;
        }
    }

    public function saque($valor) {
        if ($valor > 0 && $valor <= $this->saldo) {
            $this->saldo -= $valor;
            return $valor;
        } else {
            return false;
        }
    }
}

// Teste
$conta1 = new Conta("Bradesco", "1234", "53289-0", 1000);
$conta2 = new Conta("Nubank", "3238", "12345-6", -500);


$conta1->deposito(500);

$saqueConta2 = $conta2->saque(1000);
$saqueConta1 = $conta1->saque(1000);

echo "Cliente do Banco {$conta1->getBanco()}, Agencia {$conta1->getAgencia()}, Numero Da conta {$conta1->getNumeroConta()},Contém um saldo {$conta1->getSaldo()}";
echo "<strong>-Valor sacado: </strong>" . ($saqueConta1 !== false ? $saqueConta1 : "Saque não realizado") . "</br>" ;

echo "Cliente do Banco {$conta2->getBanco()}, Agencia {$conta2->getAgencia()}, Numero Da conta {$conta2->getNumeroConta()},Contém um saldo {$conta2->getSaldo()}";
echo "<strong>-Valor sacado: </strong>" . ($saqueConta2 !== false ? $saqueConta2 : "Saque não realizado") . "</br>" ;