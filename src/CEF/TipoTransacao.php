<?php
declare(strict_types=1);

namespace CEF;

class TipoTransacao
{
    /**
     * @var string
     */
    private $titulo;

    /**
     * @var string
     */
    private $codigo;

    private function __construct(string $titulo, string $codigo)
    {
        $this->titulo = $titulo;
        $this->codigo = $codigo;
    }

    public static function saque(): TipoTransacao
    {
        return new self('Saque', 'S');
    }

    public static function transferencia(): TipoTransacao
    {
        return new self('Transferência', 'T');
    }

    public static function deposito(): TipoTransacao
    {
        return new self('Depósito', 'D');
    }    
}
