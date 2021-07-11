<?php
      

    include_once '../../Classes/ClasseEtudiant.php';
    include_once '../../professeurPages/Class_prof.php';
    include_once '../../adminpages/Class_admin.php';
	$bdd = null;
	$bdd = new PDO('mysql:host=localhost;dbname=pfa','root','');
	if($bdd){
	    // cette varaiable va contenir (admin,professeur,etudiant) selon la presonne qui veut se connecter
		$personne;
		// connecter un boolean (true : connexion reusssit, false : connexion a echoue).
		$connecter=false;
		$etudiant;
		$admin;
		$professeur;
		if(isset($_POST['email']) and isset($_POST['password'])){
		    // recuperer les donnees de l'admin pour savoir est ce que c'est lui qui veut se connecter
			$result = $bdd->query('SELECT * from admin');
			foreach($result as $row) {
				if($row['email']==$_POST['email'] and $row['mdp']==$_POST['password']){
				    $admin = Class_admin::construct1($row['id_admin'], $row['nom'], $row['prenom'], $row['email'], $row['mdp']);
					$connecter=true;
					$personne='admin';
					break;
				}

			}
			if(!$connecter){
				$result = $bdd->query('SELECT * from etudiant');
				foreach($result as $row) {
					if($row['email']==$_POST['email'] and $row['mdp']==$_POST['password']){
					    $etudiant = ClasseEtudiant::construct3($row);
						$connecter=true;
						$personne='etudiant';
						break;
					}
				}
			}
			
			if(!$connecter){
			    $result = $bdd->query('SELECT * from professeur');
			    foreach($result as $row) {
			        if($row['email']==$_POST['email'] and $row['mdp']==$_POST['password']){
			            $professeur = Class_prof::construct1($row['cin'], $row['nom'], $row['prenom'], $row['email'],$row['mdp'] ,$row['etat_compte']);
			            $connecter=true;
			            $personne='professeur';
			            break;
			        }
			    }
			}
			
			if($connecter){
				session_start();
				// la personne qui veut se connecter est'un admin.
				if($personne == 'admin'){
				    $_SESSION['admin'] = $admin;
				    header('location:http://localhost/MonPFA/adminpages/admin.php');
				}
				// la personne qui veut se connecter est un etudiant.
				else if($personne == 'etudiant'){
				    $_SESSION['etudiant'] = $etudiant;
					header('location:http://localhost/MonPFA/etudiant/profile.php');
				}
				// la personne qui veut se connecter est un professeur.
				else if($personne == 'professeur'){
				    $_SESSION['professeur'] = $professeur;
                    //setTimeout("window.location.href='../../professeurPages/profile.php'",2000);
				    header('location:http://localhost/MonPFA/professeurPages/page_prof.php');
				}
			}
			else{
				echo "erreur";
				$erreur="impossible de se connecter";
                //setTimeout("window.location.href='../login.php'",2000);
				header("location:http://localhost/MonPFA/home/login.php?erreur=$erreur");
			}
		}
	}
?>
