<?php
include "functions.php";
include "config.php";
if (!empty($_POST['vaga'])) {
	$vaga = $_POST['vaga'];
	$id = $_SESSION['id'];
	update_cargo($vaga, $id);
}
?>