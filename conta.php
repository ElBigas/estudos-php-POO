<?php

class Conta
{
    private $titular;
    private $saldo;
    private static $numeroDeContas = 0;

    //quando uma nova instância for criada, será iniciado este método mágico
    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;
        self::$numeroDeContas++; //sempre que uma nova instancia for criada é incrementado em 1 a variavel
    }

    //quando uma nova instância for destruida, será executado este método mágico
    public function __destruct()
    {
        self::$numeroDeContas--;
    }

    public function sacar(float $valorASacar) : void {

        if($valorASacar > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }

        $this->saldo -= $valorASacar;
    }

    public function depositar(float $valorADepositar): void {
        if (@$valorADepositar < 0){
            echo "Valor precisa ser positivo";
            return;
        }

        $this->saldo += $valorADepositar;
    }

    public function transferir(float $valorATransferir, Conta $contaDeDestino) : void {

        if ($valorATransferir > $this->saldo){
            echo "Saldo indisponível";
            return;
        }

        $this->sacar($valorATransferir);
        $contaDeDestino->depositar($valorATransferir);
    }

    //Métodos getters
    public function getSaldo()
    {
        echo "Seu saldo é: ", $this->saldo ," reais" . PHP_EOL;
    }

    public function getNomeTitular() : string
    {
        return $this->titular->getNome();
    }

    public function getCpfTitular() : string
    {
        return $this->titular->getCpf();
    }
    public static function getNumeroDeContas () : int //método estático para recuperar o atributo estático da classe
    {
        return self::$numeroDeContas;
    }

    //Métodos setters.

    ###
    # Não são mais necessários pois estes atributos são
    # settados quando o objeto é instanciado pelo
    # método construtor
    ####

    /*
    public function definirCpfTitular($cpf): void
    {
        $this->cpfTitular = $cpf;
    }
    public function definirNomeTitular($nome): void
    {
        $this->nomeTitular = $nome;
    }

    */
}
