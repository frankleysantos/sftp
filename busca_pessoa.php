<?php
include "functions.php";
$cpf = $_POST['CPF'];
if (!empty($_POST['CPF'])) {
	buscapessoa($cpf);
}else{
	header("Location: /");
}
?>