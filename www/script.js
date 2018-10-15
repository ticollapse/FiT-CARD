
/*
 * @author Vitor Prado de Lima <vvpll@outlook.com>
 * @date 14/10/2018
 */

function sendEstabelecimento(){
	
	//Calcula o dia atual e retorna no formato aceito pelo MySQL
	var hoje = new Date();
	var dd = hoje.getDate();
	var mm = hoje.getMonth()+1; //Janeiro é igual a 0!
	var yyyy = hoje.getFullYear();

	if(dd<10) {
	    dd = '0'+dd // Transforma digitos unicos em 2 digitos ( 9 -> 09)
	} 

	if(mm<10) {
	    mm = '0'+mm // Transforma digitos unicos em 2 digitos ( 5 -> 05)
	} 

	hoje = yyyy + '/' + mm + '/' + dd;
	
	
	
	
	//Fornece valor as variaveis de acordo com o id dos elementos HTML e do calculo acima

	var dataCadastro = hoje;
	var razaoSocial = document.getElementById("razaoSocial").value;
	var nomeFantasia = document.getElementById("nomeFantasia").value;
	var cnpj = document.getElementById("cnpj").value;
	var email = document.getElementById("email").value;
	var endereco = document.getElementById("endereco").value;
	var estado = document.getElementById("estado").value;
	var cidade = document.getElementById("cidade").value;
	var telefone = document.getElementById("telefone").value;
	var categoria = document.getElementById("categoria").value;
	var status = document.getElementById("status").value;
	var agencia = document.getElementById("agencia").value;
	var conta = document.getElementById("conta").value;
	
	var arrayCategoria = document.getElementById("categoria").options;
	var posicaoCategoria = document.getElementById("categoria").selectedIndex;
	var nomeCategoria = arrayCategoria[posicaoCategoria].text;
	alert( nomeCategoria);
	
	//Concatena a mensagem
	var dataString = 'razaoSocial=' + razaoSocial  + '&nomeFantasia=' + nomeFantasia+ '&cnpj=' + cnpj + '&email=' + email + '&endereco=' + endereco + '&estado=' 
	+ estado + '&cidade=' + cidade + '&telefone=' + telefone + '&categoria=' + categoria + '&status=' + status + '&agencia=' + agencia + '&conta=' + conta+ '&dataCadastro=' + hoje;
	
	// Verifica se os campos foram preenchidos
	if ( (razaoSocial == '' || cnpj == '') || (  (nomeCategoria == 'Supermercado')&&(razaoSocial == '' || cnpj == '' || telefone == '')   )   ) {
	alert("Por Favor Preencha todos os campos"+dataString);
	}
	else
	{
		// AJAX code to submit form.
		$.ajax({
			//Metodo de envio
			type: "POST",
			//Local de envio
			url: "sendEstabelecimento.php",
			//Mensagem
			data: dataString,
			
			cache: false,
			success: function(html) {
				alert(html);
			}
		});
	}
	return false;
}
