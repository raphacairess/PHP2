<?php
class ListaDeCompras {
    private $itens;

    public function __construct() {
        $this->itens = [];
    }

    public function adicionarItem($produto) {
        $this->itens[] = $produto;
    }

    public function removerItem($indice) {
        if (isset($this->itens[$indice])) {
            unset($this->itens[$indice]);
            $this->itens = array_values($this->itens); 
            return true;
        } else {
            return false;
        }
    }

    public function mostrarItens() {
        foreach ($this->itens as $indice => $item) {
            echo "$indice. $item\n";
        }
    }
}

$lista = new ListaDeCompras();

$lista->adicionarItem("Ryzen 33200");
$lista->adicionarItem("GTX3090");
$lista->adicionarItem("Rtx2060");

echo "Itens na lista:";
$lista->mostrarItens();
echo "</br>";
$lista->removerItem(1);

echo "Itens na lista após a remoção:";
$lista->mostrarItens();