<?php


/*
 * @author Vitor Prado de Lima <vvpll@outlook.com>
 * @date 14/10/2018
 */

    require_once 'entities/dao/DaoEstabelecimento.php';
    require_once 'entities/pojo/PojoEstabelecimento.php';
    
    header("Content-Type: application/json; charset=UTF-8");
    // Fetching Values From URL
    $razaoSocial = $_POST['razaoSocial'];
    $nomeFantasia = $_POST['nomeFantasia'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $telefone = $_POST['telefone'];
    $categoria= $_POST['categoria'];
    $status = $_POST['status'];
    $agencia = $_POST['agencia'];
    $conta = $_POST['conta'];
    $dataCadastro = $_POST['dataCadastro'];
    
    $estabelecimentoPojo = new PojoEstabelecimento();
    
    $estabelecimentoPojo->setRazaoSocial($razaoSocial);
    $estabelecimentoPojo->setNomeFantasia($nomeFantasia);
    $estabelecimentoPojo->setCnpj($cnpj);
    $estabelecimentoPojo->setEmail($email);
    $estabelecimentoPojo->setEndereco($endereco);
    $estabelecimentoPojo->setEstado($estado);
    $estabelecimentoPojo->setCidade($cidade);
    $estabelecimentoPojo->setTelefone($telefone);
    $estabelecimentoPojo->setCategoria($categoria);
    $estabelecimentoPojo->setStatus($status);
    $estabelecimentoPojo->setAgencia($agencia);
    $estabelecimentoPojo->setConta($conta);
    $estabelecimentoPojo->setDataCadastro($dataCadastro);
    
    $estabelecimentoDao = new DaoEstabelecimento();
    $estabelecimentoDao->Inserir($estabelecimentoPojo);
    
?>