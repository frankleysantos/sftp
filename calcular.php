<?php
include "config.php";
$sqltotal = $pdo->prepare('SELECT count(*) as total FROM pessoa');
$sqltotal ->execute();
$sqltotal = $sqltotal->fetchAll();
foreach ($sqltotal as $total) {
	$total = $total['total'];
}

/*$inteiro = ( (int) ($total/2));
echo "total:".$total/2;
echo "inteiro:".$inteiro."<br>";
$data = date('d/m/Y', strtotime('+2 days', strtotime('06-08-2018')));
$datainicio = date('d/m/Y', strtotime('+0 days', strtotime('06-08-2018'))); 
 echo $data;
 echo $datainicio;*/
$sql = $pdo->prepare('SELECT * FROM pessoa');
$sql ->execute();
$count = 0;
   if ($sql -> rowCount() > 0) {	
   	$hora = '08:00:00';
   	$sql = $sql -> fetchAll();
   	   foreach ($sql as $pessoa) {
   		$count ++;
   		    if ($count <= 10) {
   		    $data = '06-08-2018';
   			echo $pessoa['nome']."&ensp;hora:".$hora."data:".$data."<br>";
   		    }
   		    if ($count > 10 && $count <=20) {
   		    $data = '07-08-2018';
   		    $hora2 = date('H:i:s', strtotime('+30 minute', strtotime($hora)));
   		    echo $pessoa['nome']."&ensp;hora:".$hora2."data:".$data."<br>";
   		    }
   		    if ($count > 4 && $count <=6) {
   		    $data = '08-08-2018';	
   		    $hora2 = date('H:i:s', strtotime('+60 minute', strtotime($hora)));
   		    echo $pessoa['nome']."&ensp;hora:".$hora2."data:".$data."<br>";
   		    }
   		    if ($count > 6 && $count <=8) {
   		    $data = '09-08-2018';
   		    $hora2 = date('H:i:s', strtotime('+90 minute', strtotime($hora)));
   		    echo $pessoa['nome']."&ensp;hora:".$hora2."data:".$data."<br>";
   		    }
       }
       echo $count;
   	}

?>