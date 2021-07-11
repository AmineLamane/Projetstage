<?php 
    //include_once 'lancer_tirage.php';
    $myfile = fopen("../adminpages/check.txt", "r") or die("Unable to open file!");
    $read =  fread($myfile,filesize("../adminpages/check.txt"));
    fclose($myfile);
 ?>
<div class="sidebar" data-color="orange" data-image="img/mr.jpeg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="page_prof.php" class="simple-text">


            </a>
        </div>

        <ul class="nav">

            <div class="logo">
                 <a href="#home" class="simple-text">
                     SESSION  ENCADRANT
                 </a>
             </div>
             

             
             

            <li>
                <a href="page_prof.php">
                    <i class='fas fa-stream' style='font-size:24px'></i>
                    <p>Accueil</p>
                </a>
            </li>
            <li>
                <a href="modfier_prof.php">
                    <i class='fas fa-stream' style='font-size:24px'></i>
                    <p>MODIFER PORFILE</p>
                </a>
            </li>
            <?php  if($read == 1) : ?>
            <li>
                <a href="afficher.php">
                    <i class='fas fa-stream' style='font-size:24px'></i>
                    <p>LES BINOMES</p>
                </a>
            
                <a href="comptes_rendus.php">
                    <i class='fas fa-stream' style='font-size:24px'></i>
                    <p>compte rendu </p>
                </a>
            </li>
            <?php else : ?>
            <li>
                <a href="ajouter.php">
                    <i class='fas fa-stream' style="font-size:30px"></i>
                    <p>ajouter projet </p>
                </a>
            </li>
            <li>
                <a href="modifier_projet.php">
                    <i class='fas fa-stream' style='font-size:27px'></i>
                    <p>modifier projet </p>
                </a>
            </li>

            <li>
                <a href="page_supprimer.php">
                    <i class="material-icons" style="font-size:33px">delete_sweep</i>
                    <p>supprimer projet </p>
                </a>
            </li>
            <?php endif ?>

            <li>
                <a href="affichier_PFA.php">
                    <i class='fas fa-stream' style='font-size:24px'></i>
                    <p>afficher les projets </p>
                </a>
            </li>






        </ul>
    </div>
</div>