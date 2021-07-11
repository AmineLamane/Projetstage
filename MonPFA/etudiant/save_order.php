<?php
require 'Classes.php';
session_start();
$link = mysqli_connect("localhost","root","","pfa");
$etudiant = $_SESSION['etudiant'];    
$ids = $_POST['ids'];
echo $ids;
$arr = explode(',',$ids);
$query = "UPDATE binome SET classement_sujet = '".$ids."' WHERE cne1 = '".$etudiant->cne."' OR cne1 = '".$etudiant->cne_binome."'";
$r = mysqli_query($link,$query);
for($i=1;$i<=count($arr);$i++)
{
	$q = "UPDATE sujet SET display_order = ".$i." WHERE id_sujet = ".$arr[$i-1];
	mysqli_query($link,$q);
}
?>