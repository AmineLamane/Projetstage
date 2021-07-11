<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $link = mysqli_connect("localhost","root","","pfa");
    $query = "SELECT * FROM compte_rendu WHERE id = $id";
    $r = mysqli_query($link,$query);
    $elemt = mysqli_fetch_assoc($r);
    $nom_fichier = $elemt['fichier'];
    header("Content-type: application/pdf");
    header("Content-Disposition: attachment;filename=$nom_fichier");
    header("Pragma: no-cache");
    header("Expire: 0");
    readfile("$nom_fichier");
    if(!empty($_SESSION['etudiant'])){
        header("location: ../compte_rendu.php");
    }
    else if(!empty($_SESSION['professeur'])){
        header("location: ../../professeurPages/comptes_rendus.php");
    }
    
    exit;
}



?>