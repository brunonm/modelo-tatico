<?php
declare(strict_types=1);

namespace CEF;

class Agencia
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $cgc;

    /**
     * @var int
     */
    private $digitoVerificador;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var Conta[]|array
     */
    private $contas = [];

    public function __construct(string $id, string $cgc, string $nome)
    {
        $this->id = $id;
        $this->cgc = $cgc;
        $this->nome = $nome;
        $this->digitoVerificador = rand(0, 9);
    }

    public function abrirConta(
        string $idConta, 
        Cliente $cliente
    ) {
        $numero = $this->proximoNumeroConta();
        $novaConta = new Conta(
            $idConta, 
            $cliente,
            $numero,
            $this
        );
        return $novaConta;
    }

    private function proximoNumeroConta(): string
    {
        $ultimoNumero = 0;
        foreach ($this->contas as $conta) {
            if ($conta->getNumero() > $ultimoNumero) {
                $ultimoNumero = $conta->getNumero();
            }
        }
        return str_pad(++$ultimoNumero, 11, '0', STR_PAD_LEFT);
    }
}
