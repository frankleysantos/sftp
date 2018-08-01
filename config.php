<?php
   try {
   	    global $pdo;
    	$pdo = new PDO ("mysql:dbname=pss; host=localhost", "root", "");
    } catch (PDOException $e) {
    	echo "ERRO:".$e->getMessage();;
    } 
 ?>
