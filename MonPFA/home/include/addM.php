<?php
require "config.php";
    
    $nom =mysqli_real_escape_string($conn,$_POST["nom"]);
    $prenom =mysqli_real_escape_string($conn,$_POST["prenom"]);
    $email =mysqli_real_escape_string($conn,$_POST["email"]);

    $password =mysqli_real_escape_string($conn,$_POST["password"]);
    $choix =mysqli_real_escape_string($conn,$_POST["choix"]);
    $error = '';

    if (empty($nom) || empty($prenom) || empty($password) || empty($choix))
    {
     $error = "Il y'a un champ vide !!";    
    }
    else
    {
        if(strlen($password) < 8)
        {
            $error ="<b style='color:red;'> le mot de passe doit contenir plus que 7 caracteres!</b><br>";
        }
        if (!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $error .="<b style='color:red;'> l'email est incorrecte !</b><br>";
        }
        if($choix==1)
        {
            $selectM = mysqli_query($conn,"SELECT professeur_mail from professeur WHERE professeur_mail= '".$email."'")
            or die(mysqli_error($conn));
            $numM = mysqli_num_rows($selectM);
            if ($numM != 0)
            {
                $error .="<b style='color:red;'> l'email existe deja !</b><br>";
            }
        }
        if($choix==2)
        {
            $selectM = mysqli_query($conn,"SELECT etudiant_mail from etudiant WHERE etudiant_mail= '".$email."'")
            or die(mysqli_error($conn));
            $numM = mysqli_num_rows($selectM);
            if ($numM != 0)
            {
                $error .="<b style='color:red;'> l'email existe deja !</b><br>";
            }
        }
        
        if(empty($error))
        {
            if($choix==1)
            {
                $pass = password_hash($password,PASSWORD_BCRYPT);

                $insertM = mysqli_query($conn,"INSERT INTO Professeur(nom,prenom,professeur_mail,professeur_mdp)
                            VALUE('$nom','$prenom','$email','$pass')
                ") or die(mysqli_error($conn));
                if($insertM)
                {
                    $error .= "<b style='color:green;'>Inscription complete</b> ";
                }
                else
                {
                    $error .= "<b style='color:red;'>Inscription incomplete</b> ";
                }
            }
            if($choix==2)
            {
                $pass = password_hash($password,PASSWORD_BCRYPT);
                $insertM = mysqli_query($conn,"INSERT INTO Etudiant(nom,prenom,etudiant_mail,etudiant_mdp)
                            VALUE('$nom','$prenom','$email','$pass')
                ") or die(mysqli_error($conn));
                if($insertM)
                {
                    $error .= "<b style='color:green;'>Inscription complete</b> ";
                }
                else
                {
                    $error .= "<b style='color:red;'>Inscription incomplete</b> ";
                }

            }

            
            
        }
    }
    
echo $error;


?>