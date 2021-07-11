<?php

function fct_bdd(){
	try{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host=localhost;dbname=pfa','root','',$pdo_options);
	}
	catch(Exception $e){
		die('Erruer : '.$e->getMessage());
	}
	return $bdd;
}

?>