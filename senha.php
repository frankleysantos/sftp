<?php
session_start();
include "cabecalho.php";
include "config.php";

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    if (isset($_POST['senha']) && !empty($_POST['senha'])) {
    	$senha = addslashes(md5($_POST['senha']));
    	$id  =  $_SESSION['id'];
    	$sql =  $pdo->prepare("UPDATE pessoa SET senha = :senha WHERE id = :id");
    	$sql -> bindValue(":senha", $senha);
    	$sql -> bindValue(":id", $id);
    	$sql -> execute();
    	echo "<label class='form-control btn-info'>Senha Alterada com Sucesso!</label>";
     } 
?>
<form action="" method="POST" role="form">
	<legend>Alterando Senha</legend>

	<div class="form-group">
		<label for="">Senha Nova</label>
		<input type="password" class="form-control" id="senha" placeholder="Senha Nova" name="senha">
		<label for="">Confirme a senha</label>
		<input type="password" id="Confirmar" class="form-control" name="Confirmar" onblur="return validasenha(this.value)" placeholder="Confirmar senha.">
	</div>
	<button type="submit" class="btn btn-primary">Alterar</button>
</form>

<?php 
include "rodape.php";

}else{
header("Location: login.php");	
}

?>