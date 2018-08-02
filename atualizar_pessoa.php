<?php
include "functions.php";
$id = $_SESSION['id'];
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
$nome        = $_POST['nome']; 
$mae         = $_POST['mae']; 
$pai         = $_POST['pai']; 
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
updatepessoa($id, $nome, $mae, $pai, $rg, $data_nasc, $sexo, $email, $rua, $numero, $complemento, $bairro, $cidade, $uf); 
}else{
 header("Location: login.php");
}
?>