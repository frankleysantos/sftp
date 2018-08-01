<?php
include "functions.php";
include "config.php";
if (!empty($_POST['vaga'])) {
	$vaga = $_POST['vaga'];
	$id = $_SESSION['id'];
	inscricao($vaga, $id);
}else{
	echo "selecione alguma vaga";
}
?>