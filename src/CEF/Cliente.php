<?php
declare(strict_types=1);

namespace CEF;

class Cliente
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $cpf;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var Conta[]|array
     */
    private $contas = [];

    public function __construct(string $id, string $cpf, string $nome)
    {
        $this->id = $id;
        $this->cpf = $cpf;
        $this->nome = $nome;
    }
}
