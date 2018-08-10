<?php
include "functions.php";
$cpf = $_POST['cpf'];
$email = $_POST['email'];
buscasenha($cpf, $email);
?>