<?php
require_once(dirname(__FILE__).'/../pojo/PojoEstabelecimento.php');
require_once(dirname(__FILE__).'/../../db/dbFitcard.php');


/*
 * @author Vitor Prado de Lima <vvpll@outlook.com>
 * @date 14/10/2018
 */


class DaoEstabelecimento{
    
    public static $conn;
    
    function __construct(){
        //
    }
    
    
    public function Inserir(PojoEstabelecimento $estabelecimento) {
        try {
            $sql = "INSERT INTO estabelecimento (
                cnpj,
                razao_social,
                nome_fantasia,
                email,
                endereco,
                cidade,
                id_uf,
                telefone,
                data_cadastro,
                id_categoria,
                id_situacao,
                agencia,
                conta)
                VALUES (
                :cnpj,
                :razaoSocial,
                :nomeFantasia,
                :email,
                :endereco,
                :cidade,
                :idUf,
                :telefone,
                :dataCadastro,
                :idCategoria,
                :idSituacao,
                :agencia,
                :conta)";
            
            $p_sql = dbFitcard::getCon()->prepare($sql);
            
            
            $p_sql->bindValue(":cnpj", $estabelecimento->getCnpj());
            $p_sql->bindValue(":razaoSocial", $estabelecimento->getRazaoSocial());
            $p_sql->bindValue(":nomeFantasia", $estabelecimento->getNomeFantasia());
            $p_sql->bindValue(":email",$estabelecimento->getEmail());
            $p_sql->bindValue(":endereco", $estabelecimento->getEndereco());
            $p_sql->bindValue(":cidade", $estabelecimento->getCidade());
            $p_sql->bindValue(":idUf", $estabelecimento->getEstado());
            $p_sql->bindValue(":telefone", $estabelecimento->getTelefone());
            $p_sql->bindValue(":dataCadastro", $estabelecimento->getDataCadastro());
            $p_sql->bindValue(":idCategoria", $estabelecimento->getCategoria());
            $p_sql->bindValue(":idSituacao", $estabelecimento->getStatus());
            $p_sql->bindValue(":agencia", $estabelecimento->getAgencia());
            $p_sql->bindValue(":conta", $estabelecimento->getConta());
            
            
            return $p_sql->execute();
        }catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.".$e;
            dbFitcard::setCon();
        }
    }
    
    
    
    
}





?>