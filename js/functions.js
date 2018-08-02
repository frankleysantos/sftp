function adicionarLinha(){
	var local=document.getElementById('TabParentesco');
	var tblBody = local.tBodies[0];
	var newRow = tblBody.insertRow(-1);  
	var total  = document.getElementById('familiatotal').value;
	var newCell0 = newRow.insertCell(0);
	newCell0.innerHTML = '<td><input type="text" name="FamiliarNome'+total+'"  value="" class="form-control" placeholder="Nome"></td>'; 
	
	var newCell1 = newRow.insertCell(1);
	newCell1.innerHTML = '<td><input type="text" name="FamiliarDataNasc'+total+'"  value="" class="form-control" maxlength="10" placeholder="Data de Nascimento" onkeyup=dataConta(this)></td>';
	var newCell2 = newRow.insertCell(2);
	var tmp12 = '<td><select class="form-control" name="FamiliarParentesco'+total+'">'
	tmp12 = tmp12+'<option value="">Escolha</option>'
	tmp12 = tmp12+'<option value="Pai">Pai</option>'
	tmp12 = tmp12+'<option value="Mãe">Mãe</option>'
	tmp12 = tmp12+'<option value="Filho(a)">Filho(a)</option>'
	tmp12 = tmp12+'<option value="Cônjuge/Companheiro(a)">Cônjuge/Companheiro(a)</option>'
	tmp12 = tmp12+'<option value="Tio(a)">Tio(a)</option>'
	tmp12 = tmp12+'<option value="Irmã(o)">Irmã(o)</option>'
	tmp12 = tmp12+'<option value="Primo(a)">Primo(a)</option>'
	tmp12 = tmp12+'<option value="Sobrinho">Sobrinho(a)</option>'
	tmp12 = tmp12+'<option value="Enteado(a)">Enteado(a)</option>'
	tmp12 = tmp12+'<option value="Avô(ó)">Avô(ó)</option>'
	tmp12 = tmp12+'<option value="Outro">Outro</option></select></td>';
	newCell2.innerHTML = tmp12;
	var newCell3 = newRow.insertCell(3);
	var tmp13 = '<td><select class="form-control" name="FamiliarEscolaridade'+total+'">'
	tmp13 = tmp13+'<option value="">Escolha</option>'
	tmp13 = tmp13+'<option value="Não Alfabetizado">Não Alfabetizado</option>'
	tmp13 = tmp13+'<option value="Ensino Fundamental">Ensino Fundamental</option>'
	tmp13 = tmp13+'<option value="Ensino Médio">Ensino Médio</option>'
	tmp13 = tmp13+'<option value="Superior">Superior</option>'
	tmp13 = tmp13+'<option value="Pós-Graduação">Pos-Graduação</option>'
	tmp13 = tmp13+'<option value="Mestrado">Mestrado</option>'
	tmp13 = tmp13+'<option value="Doutorado">Doutorado</option>'
	tmp13 = tmp13+'<option value="Pós-Doutorado">Pós-Doutorado</option></select></td>';
	newCell3.innerHTML = tmp13;	
	var newCell4 = newRow.insertCell(4);
	newCell4.innerHTML = '<td><input type="text" name="FamiliarOcupacao'+total+'"  value="" class="form-control" placeholder="Ocupação"></td>';
	var newCell5 = newRow.insertCell(5);
	newCell5.innerHTML = '<td><input type="text" name="FamiliarRemuneracao'+total+'" onkeyup=moeda(this)  value="" class="form-control" placeholder="Remuneração"></td>';
	var newCell6 = newRow.insertCell(6);
	newCell6.innerHTML = '<td><button class="btn btn-large btn-danger fa fa-trash" onclick="deleteRow(this.parentNode.parentNode.rowIndex)"></button></td>';
	var total=document.getElementById('familiatotal').value++;

}

function deleteRow(i){
	document.getElementById('TabParentesco').deleteRow(i);
}

function mascara(o,f){
	v_obj=o
	v_fun=f
	setTimeout("execmascara()",1)
}

function execmascara(){
	v_obj.value=v_fun(v_obj.value)
}

function mcel(v){
	v=v.replace(/\D/g,"");
	v=v.replace(/^(\d{2})(\d)/g,"($1) $2");
	v=v.replace(/(\d)(\d{4})$/,"$1-$2");
	return v;
}

function mfixo(v){
	v=v.replace(/\D/g,"");
	v=v.replace(/^(\d{2})(\d)/g,"($1) $2");
	v=v.replace(/(\d)(\d{4})$/,"$1-$2");
	return v;
}

window.onload = function(){
	id('Fone_Cel').onkeyup = function(){
		mascara( this, mcel );
	}
	id('Fone_Fixo').onkeyup = function(){
        	mascara( this, mfixo );}
}

function cep(o,f){
	v_obj=o
	v_fun=f
	setTimeout("execcep()",1)
}

function execcep(){
	v_obj.value=v_fun(v_obj.value)
}

function mcep(v){
	v=v.replace(/\D/g,"");            
	v=v.replace(/^(\d{2})(\d)/g,"$1.$2"); 
	v=v.replace(/(\d)(\d{3})$/,"$1-$2");    
	return v;
}

function id( el ){
	return document.getElementById( el );
}

window.onload = function(){
	id('End_CEP').onkeyup = function(){
		cep( this, mcep );
	}
}


function mostraTipo(){
	if((document.getElementById("Trans_Forma").value=="carro")||(document.getElementById("Trans_Forma").value=="moto")){
		document.getElementById("Trans_Tipo").style.display="block";
	}else{
		document.getElementById("Trans_Tipo").style.display="none";
	}			
}

function dataConta(c){
	if(c.value.length ==2){
		c.value += '/';
	}
	if(c.value.length==5){
		c.value += '/';	
	}
}

function mostraimovel(){
	if(document.getElementById("Hab_Modo").value=="proprio"){
		document.getElementById("Hab_propria").style.display="block";
		document.getElementById("Hab_valor").style.display="none";
	}else{
		document.getElementById("Hab_propria").style.display="none";
	}

	if((document.getElementById("Hab_Modo").value=="alugada")
		|| (document.getElementById("Hab_Quit").value=="nao")){
		document.getElementById("Hab_valor").style.display="block";
	}else{
		document.getElementById("Hab_valor").style.display="none";
	}

	if(
		(document.getElementById("Hab_Modo").value=="invadida")||
		(document.getElementById("Hab_Modo").value=="cedida")
	){
		document.getElementById("Hab_propria").style.display="none";
		document.getElementById("Hab_valor").style.display="none";
		document.getElementById("Hab_Quit").value="";
		document.getElementById("Hab_Valor").value=null;
	}
}


function moeda(z){ 
	v = z.value; 
	v=v.replace(/\D/g,"")
	v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2")
	z.value = v; 
}

function deficienteOutra(){
	if(document.getElementById("Deficiente_Qual").value=="Outra"){
		document.getElementById("Def_tmp").style.display="block";
		document.getElementById("Def_Outra").required=true;
	}else{
		document.getElementById("Def_tmp").style.display="none";
	}
}
function SetRequired(){
/*	document.getElementById("Status_escolar").attributes="required";
	document.getElementById("CadUnico").attributes"required";
/*	document.getElementById("TimeRes").attributes.required="required";
	document.getElementById("Ling_Ingles").attributes.required="required";
	document.getElementById("Ling_Espanhol").attributes.required="required";
	document.getElementById("Pensao_Paga").attributes.required="required";
	document.getElementById("Pensao_Recebe").attributes.required="required";
	document.getElementById("Renda_Maior").attributes.required="required";
	document.getElementById("Renda_Mensal_Individual").attributes.required="required";
	document.getElementById("Renda_Mensal_Capita").attributes.required="required";
	document.getElementById("Deficiente").attributes.required="required";
	document.getElementById("Transferencia").attributes.required="required";
	document.getElementById("Idoso").attributes.required="required";
	document.getElementById("PlanoDeSaude").attributes.required="required";
*/
	}

function verficaradio(){
	selecionado=document.getElementById("Status_escolar").checked;
	if (selecionado) {
		window.alert("Você selecionou o checkbox.");
		//document.getElementById("Status_escolar").attributes.required="required"=true;
	}
	else {	
		window.alert(selecionado);
		return false;
	}
}
