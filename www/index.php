<?php 

/*
 * @author Vitor Prado de Lima <vvpll@outlook.com>
 * @date 14/10/2018
 */

require_once 'entities/dao/DaoEstabelecimento.php';
require_once 'entities/pojo/PojoEstabelecimento.php';
require_once 'db/dbFitcard.php';

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
<!-- Definições iniciais -->
<meta charset="UTF-8">
<!-- Definição inicial de resolução com base no monitor -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<!-- Define arquivo de estilo css -->
<link href="style.css" rel="stylesheet" /> 
<!-- Define arquivo js -->
<script src="script.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="MascaraValidacao.js"></script> 

<title>Estabelecimento</title>
</head>

<body id="estabelecimento" >

	<!-- Razão Social;
Nome Fantasia;
CNPJ;
E-mail;
Endereço;
Cidade;
Estado;
Telefone;
Data de Cadastro;
Categoria [Supermercado, Restaurante, Borracharia, Posto, Oficina];
Status [Ativo, Inativo]
Agencia e Conta -->

	<div class="cadEstabelecimento">
		<img src="user.png" class="user">
		<h2>Cadastro de Estabelecimentos</h2>
		
		<form id="cadEstabelecimento" name="cadEstabelecimento">
			<p>Razão Social</p>
			<input type="text" name="razaoSocial" required="required"  id="razaoSocial">
			<p>Nome Fantasia</p>
			<input type="text" name="nomeFantasia"  id="nomeFantasia">
			<p>CNPJ</p>
			<input type="text" name="cnpj" required="required"  id="cnpj" onKeyPress="MascaraCNPJ(cadEstabelecimento.cnpj);" 
maxlength="18" onBlur="ValidarCNPJ(cadEstabelecimento.cnpj);">
			<p>E-mail</p>
			<input type="text" name="email" id="email"onblur="validacaoEmail(cadEstabelecimento.email);">
			
			<p>Categoria</p>
			
			<select name="categoria" id="categoria" class="select">
        		<?php
        		    $sql = "select * from categoria";   
        		  
        		    $p_sql = dbFitcard::getCon()->prepare($sql);
        		    $p_sql->execute();
        		    
        		    
            
        			?>
        			<option value="0" selected="selected"> </option>
        			<?php while($resultCategoria = $p_sql->fetch(PDO::FETCH_ASSOC)){?>
        			<option value="<?php echo $resultCategoria['id'] ?>"><?php echo $resultCategoria['nome'] ?></option>
        			<?php } 
              ?> 
			</select>
			
			<br/><br/>
		
			<p>Status</p>
			
			<select name="status" id="status" class="select">
        		<?php
        		    $sql = "select * from situacao";   
        		  
        		    $p_sql = dbFitcard::getCon()->prepare($sql);
        		    $p_sql->execute();
        		    
        		    
            
        			?>
        			<option value="0" selected="selected"> </option>
        			<?php while($resultStatus = $p_sql->fetch(PDO::FETCH_ASSOC)){?>
        			<option value="<?php echo $resultStatus['id'] ?>"><?php echo $resultStatus['nome'] ?></option>
        			<?php } 
              ?> 
			</select>
			
			<br/><br/>
			<p>Estado</p>
			<select name="estado" id="estado" class="select">
        		<?php
        		    $sql = "select * from uf";   
        		  
        		    $p_sql = dbFitcard::getCon()->prepare($sql);
        		    $p_sql->execute();
        		    
        		    
            
        			?>
        			<option value="0" selected="selected"> </option>
        			<?php while($resultEstado = $p_sql->fetch(PDO::FETCH_ASSOC)){?>
        			<option value="<?php echo $resultEstado['id'] ?>"><?php echo $resultEstado['sigla'] ?></option>
        			<?php } 
              ?> 
			</select>
			<br/><br/>
			<p>Endereço</p>
			<input type="text" name="endereco" id="endereco"> 
			<p>Cidade</p>
			<input type="text" name="cidade" id="cidade">
			<p>Telefone</p>
			<input type="text" name="telefone" id="telefone" onKeyPress="MascaraTelefone(cadEstabelecimento.telefone);" 
maxlength="14"  onBlur="ValidaTelefone(cadEstabelecimento.telefone);">
			<p>Agencia</p>
			<input type="text" name="agencia" id="agencia" onKeyPress="MascaraAgencia(cadEstabelecimento.agencia);" 
maxlength="6">
			<p>Conta</p>
			<input type="text" name="conta" id="conta" onKeyPress="MascaraConta(cadEstabelecimento.conta);" 
maxlength="8">
			
			<input id="submit" name="btn_cadEstabelecimento" type="button" onClick="sendEstabelecimento()" value="Cadastrar">
			
			<!--  <span class="response"></span>-->
		</form>
		
	</div>
<?php 


// Fetching Values From URL
$razaoSocial = 'razaoooSocial';
$nomeFantasia ='nomeFantasia';
$cnpj = 'cnpjooo';
$email ='email';
$endereco ='endereco';
$estado = 1;
$cidade = 'cidade';
$telefone = 'telefone';
$categoria= 'categoria';
$status = 'status';
$agencia = 'age';
$conta = 'conta';
$dataCadastro = 'dataCadastro';

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




?>
</body>
</html>