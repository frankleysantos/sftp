<?php
include "config.php";
$hora_inicio = "07:45:00";  
$hora_fim = "12:00:00";              
$pessoa = 1000;
$porminuto = 10;
$data = "08/08/2018";
$ini = strtotime($hora_inicio);
$fim = strtotime($hora_fim);
$atu = $ini;
$count = 0;

$i = 0;
for ($pessa = 0; $pessa < $pessoa; $pessa++) {
	    $atu = strtotime('+15 minutes', $atu);
        $final = strtotime("18:15:00");
                if ($atu == $final) {
                    $atu = strtotime("08:00:00");
                    if ($atu == strtotime("08:00:00")) {
                        $data = date('d/m/Y', strtotime('+1 days', strtotime($data)));
                    }                    
                }
                if ($atu == strtotime("08:00:00")) {
                        $data = date('d/m/Y', strtotime('+1 days', strtotime($data)));
                    }
     	for ($pessoaini=0; $pessoaini < $porminuto; $pessoaini++) {
     	    $count ++; 
     	    if ($fim == $atu) {
     	    	$atu = strtotime("14:00:00");
        
     	    	if ($count <= $pessoa) {
     	    	$hora = date('H:i', $atu);
                echo $count.$hora.$data."<br>";
                /*
                $sql = $pdo->prepare("INSERT INTO atendimento (horario, id_pessoa, data) VALUES (:horario, :id_pessoa, :data)");
                $sql ->bindValue(":horario", $hora);
                $sql ->bindValue(":id_pessoa", $count);
                $sql ->bindValue(":data", $data);*/
                $sql = $pdo->prepare("UPDATE atendimento SET horario = :horario, data = :data WHERE id_cargo = :id_cargo");
                $sql ->bindValue(":horario", $hora);
                $sql ->bindValue(":id_cargo", $count);
                $sql ->bindValue(":data", $data);
                $sql ->execute();   
     	    }
     	    }else{
     	    if ($count <= $pessoa) {
     	    	$hora = date('H:i', $atu);
                echo $count.$hora.$data."<br>";
                /*
                $sql = $pdo->prepare("INSERT INTO atendimento (horario, id_pessoa, data) VALUES (:horario, :id_pessoa, :data)");
                $sql ->bindValue(":horario", $hora);
                $sql ->bindValue(":id_pessoa", $count);
                $sql ->bindValue(":data", $data);*/
                $sql = $pdo->prepare("UPDATE atendimento SET horario = :horario, data = :data WHERE id_cargo = :id_cargo");
                $sql ->bindValue(":horario", $hora);
                $sql ->bindValue(":id_cargo", $count);
                $sql ->bindValue(":data", $data);
                $sql ->execute();
     	    }
     	    }
            
     	}
     	                                           
}
?>