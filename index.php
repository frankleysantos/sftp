<?php 
session_start();
require "cabecalho.php";
require "config.php";
$login = $_SESSION['id'];
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
	/*Monta a sql para saber se usuario ja cadastrou em algum cargo*/
	$sql = $pdo -> prepare("SELECT * FROM cargos WHERE id_pessoa = :id_pessoa");
	$sql->bindValue(":id_pessoa", $login);
	$sql->execute();

	if ($sql->rowCount() > 0) {
		$sql = $sql->fetchAll();
		foreach ($sql as $cargo) {
			?>
			<form action="update_cargo.php" method="POST" role="form">
				<legend>Atualize para o cargo que deseja participar.</legend>
				<legend><u>Só é possível cadastrar em um cargo para todos os editais.</u></legend>				
			      <p><input type='radio' name='vaga' value='Auxiliar Administrativo - Edital I'<?php if($cargo['vaga'] == 'Auxiliar Administrativo - Edital I') echo 'checked';?>>Auxiliar Administrativo - Edital I</p>
			      <p><input type='radio' name='vaga' value='Motorista 1 - Edital I'<?php if($cargo['vaga'] == 'Motorista 1 - Edital I') echo 'checked';?>>Motorista 1 - Edital I</p>
			      <p><input type='radio' name='vaga' value='Motorista 2 - Edital I'<?php if($cargo['vaga'] == 'Motorista 2 - Edital I') echo 'checked';?>>Motorista 2 - Edital I</p>
			      <p><input type='radio' name='vaga' value='Orientador Social - Edital I'<?php if($cargo['vaga'] == 'Orientador Social - Edital I') echo 'checked';?>>Orientador Social - Edital I</p>
			      <p><input type='radio' name='vaga' value='Psicologo - Edital I'<?php if($cargo['vaga'] == 'Psicologo - Edital I') echo 'checked';?>>Psicologo - Edital I</p>
			      <p><input type='radio' name='vaga' value='Tecnico de Nivel Superior - Edital II'<?php if($cargo['vaga'] == 'Tecnico de Nivel Superior - Edital II') echo 'checked';?>>Técnico de Nivel Superior - Edital II</p>
			      <p><input type='radio' name='vaga' value='Motorista 1 - Edital II'<?php if($cargo['vaga'] == 'Motorista 1 - Edital II') echo 'checked';?>>Motorista 1 - Edital II</p>
			      <p><input type='radio' name='vaga' value='Psicologo - Edital II'<?php if($cargo['vaga'] == 'Psicologo - Edital II') echo 'checked';?>>Psicologo - Edital II</p>
				<button type="submit" class="btn btn-success">Atualizar</button>
			</form>
     <?php
		}
	/* se não tiver cadastrado monta o formulário de cadastro*/	
	}else {
?>

<form action="insc_cargos.php" method="POST" role="form">
	<legend>Cadastre na vaga desejada.</legend>
	<legend><u>Só é possível cadastrar em uma vaga para todos os editais.</u></legend>

	<div class="form-group">
		<label class="fa fa-list">&ensp;Vagas</label>
		<p><input type="radio" name="vaga" value="Auxiliar Administrativo - Edital I">Auxiliar Administrativo - Edital I</p>
		<p><input type="radio" name="vaga" value="Motorista 1 - Edital I">Motorista 1 - Edital I</p>
		<p><input type="radio" name="vaga" value="Motorista 2 - Edital I">Motorista 2 - Edital I</p>
		<p><input type="radio" name="vaga" value="Orientador Social - Edital I">Orientador Social - Edital I</p>
		<p><input type="radio" name="vaga" value="Psicologo - Edital I">Psicologo - Edital I</p>
		<p><input type='radio' name='vaga' value='Tecnico de Nivel Superior - Edital II'>Técnico de Nivel Superior - Edital II</p>
		<p><input type='radio' name='vaga' value='Motorista 1 - Edital II'>Motorista 1 - Edital II</p>
	    <p><input type='radio' name='vaga' value='Psicologo - Edital II'>Psicólogo - Edital II</p>
		
	</div>
	<button type="submit" class="btn btn-primary fa fa-search">&ensp;Cadastrar na Vaga</button>
</form>
<?php
    }    
}
else{
    header("Location: login.php");
}
require "rodape.php";
?>
