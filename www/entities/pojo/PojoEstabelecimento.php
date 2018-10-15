<?php

/*
 * @author Vitor Prado de Lima <vvpll@outlook.com>
 * @date 14/10/2018
 */


/*Classe do tipo POJO - Plain Old Java Objec, ou seja sem nada de especial*/
class PojoEstabelecimento {
    
    
    private $razaoSocial;
    private $nomeFantasia;/*Nome Fantasia do estabelecimento - Opcional*/
    private $cnpj;
    private $email;
    private $endereco;
    private $cidade;
    private $estado;
    private $telefone;
    private $dataCadastro;/*Data de Cadastro no Sistema*/
    private $categoria;/* Tipo do estabelecimento (Supermercado, Restaurante, Borracharia, Posto, Oficina)*/
    private $status;/*Estado do estabelecimento (Ativo ou Inativo)*/
    private $agencia;
    private $conta;
    
    function __construct() { 
        //
    }
    
    /**
     Getters
     */
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }
    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }
    public function getCnpj()
    {
        return $this->cnpj;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getEndereco()
    {
        return $this->endereco;
    }
    public function getCidade()
    {
        return $this->cidade;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function getAgencia()
    {
        return $this->agencia;
    }
    public function getConta()
    {
        return $this->conta;
    }
    
    
    
    /**
     Setters
     */
    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;
    }
    public function setNomeFantasia($nomeFantasia)
    {
        $this->nomeFantasia = $nomeFantasia;
    }
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function setAgencia($agencia)
    {
        $this->agencia = $agencia;
    }
    public function setConta($conta)
    {
        $this->conta = $conta;
    }
    
    
    
}


?>