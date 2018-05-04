<?php
declare(strict_types=1);

namespace CEF;

class Conta
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var Cliente
     */
    private $cliente;

    /**
     * @var string
     */
    private $numero;

    /**
     * @var Agencia
     */
    private $agencia;

    /**
     * Transacao[]
     */
    private $transacoes;

    public function __construct(
        string $id, 
        Cliente $cliente,
        string $numero,
        Agencia $agencia
    ) {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->numero = $numero;
        $this->agencia = $agencia;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function getSaldo(): float
    {
        $saldo = 0;
        foreach ($this->transacoes as $transacao) {
            $saldo += $transacao->getValor();
        }
        return $saldo;
    }

    public function depositar(string $transacaoId, float $valor)
    {
        if ($valor < 0.01) {
            throw new DepositoInvalidoException();
        }

        $transacao = Transacao::deposito(
            $transacaoId,
            $valor,
            $this
        );

        $this->transacoes[] = $transacao;
    } 
}
