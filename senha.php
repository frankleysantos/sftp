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
	<legend><b>Redefinir senha</b></legend>
    <p>Realize a troca da sua senha.</p>

	<div class="form-group">
		<label for="">Nova Senha</label>
		<input type="password" class="form-control" id="senha" placeholder="Digite a nova senha..." name="senha">
		<label for="">Repita a nova senha</label>
		<input type="password" id="Confirmar" class="form-control" name="Confirmar" onblur="return validasenha(this.value)" placeholder="Repita a nova senha..." required>
	</div>
	<button type="submit" class="btn btn-success">Redefinir Senha</button>
</form>

<?php 
include "rodape.php";

}else{
header("Location: login.php");	
}

?>