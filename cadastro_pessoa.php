<?php
include "functions.php";
$nome        = $_POST['nome']; 
$mae         = $_POST['mae']; 
$pai         = $_POST['pai'];
$cpf         = $_POST['cpf']; 
$rg          = $_POST['rg']; 
$data_nasc   = $_POST['datanasc']; 
$sexo        = $_POST['sexo'];
$email       = $_POST['email'];
$rua         = $_POST['rua'];
$numero      = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro      = $_POST['bairro'];
$cidade      = $_POST['cidade'];
$uf          = $_POST['uf']; 
$senha       = $_POST['senha'];
inserirpessoa($nome, $mae, $pai, $cpf, $rg, $data_nasc, $sexo, $email, $rua, $numero, $complemento, $bairro, $cidade, $uf, $senha); 
?>