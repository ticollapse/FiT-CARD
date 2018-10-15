
/*
 * @author Vitor Prado de Lima <vvpll@outlook.com>
 * @date 14/10/2018
 */



//adiciona mascara de cnpj
function MascaraCNPJ(cnpj){
        if(mascaraInteiro(cnpj)==false){
                event.returnValue = false;
        }       
        return formataCampo(cnpj, '00.000.000/0000-00', event);
}

//adiciona mascara ao telefone
function MascaraTelefone(telefone){  
        if(mascaraInteiro(telefone)==false){
                event.returnValue = false;
        }       
        return formataCampo(telefone, '(00) 0000-0000', event);
}

function MascaraAgencia(agencia){  
    if(mascaraInteiro(agencia)==false){
            event.returnValue = false;
    }       
    return formataCampo(agencia, '0000-0', event);
}

function MascaraConta(conta){  
    if(mascaraInteiro(conta)==false){
        event.returnValue = false;
}       
return formataCampo(conta, '00.000-0', event);
}

//valida o CNPJ digitado
function ValidarCNPJ(ObjCnpj){
        var cnpj = ObjCnpj.value;
        var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
        var dig1= new Number;
        var dig2= new Number;

        exp = /\.|\-|\//g
        cnpj = cnpj.toString().replace( exp, "" ); 
        var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));

        for(i = 0; i<valida.length; i++){
                dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);  
                dig2 += cnpj.charAt(i)*valida[i];       
        }
        dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
        dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));

        if(((dig1*10)+dig2) != digito){
        		document.getElementById("cnpj").value = "";//Apaga o valor invalido
                alert('CNPJ Invalido!');	
       	}

}

function validacaoEmail(email) {
	usuario = email.value.substring(0, email.value.indexOf("@"));
	dominio = email.value.substring(email.value.indexOf("@")+ 1, email.value.length);
	 
	if ((usuario.length >=1) &&
	    (dominio.length >=3) && 
	    (usuario.search("@")==-1) && 
	    (dominio.search("@")==-1) &&
	    (usuario.search(" ")==-1) && 
	    (dominio.search(" ")==-1) &&
	    (dominio.search(".")!=-1) &&      
	    (dominio.indexOf(".") >=1)&& 
	    (dominio.lastIndexOf(".") < dominio.length - 1)) {
	document.getElementById("msgemail").innerHTML="E-mail válido";
	alert("E-mail valido");
	}
	else{
	document.getElementById("email").value="";
	alert("E-mail invalido");
	}
	}





//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) { 
      var boleanoMascara; 

      var Digitato = evento.keyCode;
      exp = /\-|\.|\/|\(|\)| /g
      campoSoNumeros = campo.value.toString().replace( exp, "" ); 

      var posicaoCampo = 0;    
      var NovoValorCampo="";
      var TamanhoMascara = campoSoNumeros.length;; 

      if (Digitato != 8) { // backspace 
              for(i=0; i<= TamanhoMascara; i++) { 
                      boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                                              || (Mascara.charAt(i) == "/")) 
                      boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
                                                              || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
                      if (boleanoMascara) { 
                              NovoValorCampo += Mascara.charAt(i); 
                                TamanhoMascara++;
                      }else { 
                              NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
                              posicaoCampo++; 
                        }              
                }      
              campo.value = NovoValorCampo;
                return true; 
      }else { 
              return true; 
      }
}

//valida numero inteiro com mascara
function mascaraInteiro(){
        if (event.keyCode < 48 || event.keyCode > 57){
                event.returnValue = false;
                return false;
        }
        return true;
}
