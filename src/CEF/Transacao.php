<?php
declare(strict_types=1);

namespace CEF;

class Transacao
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $criadoEm;

    /**
     * @var float
     */
    private $valor;

    /**
     * @var Conta|null
     */
    private $contaOrigem;

    /**
     * @var Conta|null
     */
    private $contaDestino;

    /**
     * @var TipoTransacao
     */
    private $tipo;

    private function __contruct()
    {}

    public static function transferencia(
        string $id, 
        float $valor,
        Conta $contaOrigem,
        Conta $contaDestino
    ): Transacao {
        $transacao = new self();
        $transacao->id = $id;
        $transacao->valor = $valor;
        $transacao->contaOrigem = $contaOrigem;
        $transacao->contaDestino = $contaDestino;
        $transacao->tipo = TipoTransacao::transferencia();
        $transacao->criadoEm = new \DateTime();
        return $transacao;
    }

    public static function saque(
        string $id, 
        float $valor,
        Conta $contaOrigem
    ): Transacao {
        $transacao = new self();
        $transacao->id = $id;
        $transacao->valor = $valor;
        $transacao->contaOrigem = $contaOrigem;
        $transacao->tipo = TipoTransacao::saque();
        $transacao->criadoEm = new \DateTime();
        return $transacao;
    }

    public static function deposito(
        string $id, 
        float $valor,
        Conta $contaDestino
    ): Transacao {
        $transacao = new self();
        $transacao->id = $id;
        $transacao->valor = $valor;
        $transacao->contaDestino = $contaDestino;
        $transacao->tipo = TipoTransacao::deposito();
        $transacao->criadoEm = new \DateTime();
        return $transacao;
    }

    public function getValor(): float
    {
        return $this->valor;
    }
}
