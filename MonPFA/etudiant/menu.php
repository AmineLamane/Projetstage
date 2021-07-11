<?php 
    //include_once 'lancer_tirage.php';
    $myfile = fopen("../adminpages/check.txt", "r") or die("Unable to open file!");
    $read =  fread($myfile,filesize("../adminpages/check.txt"));
    fclose($myfile);
 ?>

<!--    alia_gauche-->
<div class="sidebar" data-color="blue" data-image="img/h1.jpeg">
    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
    <div class="sidebar-wrapper">

        <ul class="nav">
             <div class="logo">
                 <a href="#home" class="simple-text">
                     SESSION  ETUDIANT
                 </a>
             </div>
            



             

            <li <?php if($nomPage == "notification.php") echo "class='active'";?>>
                <a href="notification.php">
                    <i class='fas fa-stream' style="font-size:30px"> </i>
                    <p>Notification</p>
                </a>
            </li>

            <li <?php if($nomPage == "profile.php") echo "class='active'";?>>
                <a href="profile.php">
                    <i class='fas fa-stream' style='font-size:24px'></i>
                    <p>PORFILE</p>
                </a>
            </li>

            <?php  if($etudiant->cne_binome == "") : ?>
            <li <?php if($nomPage == "binome.php") echo "class='active'";?>>
                <a href="binome.php">
                    <i class='fas fa-stream' style='font-size:24px'></i>
                    <p>Choisir binome </p>
                </a>
            </li>
            <?php else : ?>
            <li <?php if($nomPage == "Afficher_binome.php") echo "class='active'";?>>
                <a href="Afficher_binome.php">
                    <i class='fas fa-stream' style='font-size:24px'></i>
                    <p>Votre Binome </p>
                </a>
            </li>
            <?php endif ?>
            <?php  if($read == 0) : ?>
            <li <?php if($nomPage == "sujets.php") echo "class='active'";?>>
                <a href="sujets.php">
                    <i class='fas fa-stream' style='font-size:27px'></i>
                    <p>Classer les sujets </p>
                </a>
            </li>
            <?php else : ?>
            <li <?php if($nomPage == "Afficher_sujet_affecte.php") echo "class='active'";?>>
                <a href="Afficher_sujet_affecte.php">
                    <i class='fas fa-stream' style='font-size:27px'></i>
                    <p>Le sujet affecte </p>
                </a>
            </li>
            
            <li <?php if($nomPage == "compte_rendu.php") echo "class='active'";?>>
                <a href="compte_rendu.php">
                    <i class='fas fa-stream' style='font-size:24px'></i>
                    <p>Compte rendu</p>
                </a>
            </li>
            <?php endif ?>

        </ul>
    </div>
</div>