 <?php 
    //include_once 'lancer_tirage.php';
    $myfile = fopen("check.txt", "r") or die("Unable to open file!");
    $read =  fread($myfile,filesize("check.txt"));
    fclose($myfile);
 ?>
 <div class="sidebar" data-color="blue" data-image="img/i4.png">
     <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
     <div class="sidebar-wrapper">
         <div class="logo">
             <a href="page_prof.php" class="simple-text">


             </a>
         </div>

         <ul class="nav">
             
        
     <div class="logo">
                 <a href="#home" class="simple-text">
                     ESPACE ADMINSTRATEUR
                 </a>
             </div>

             

             <li>
                 <a href="admin.php">
                     <i  class='fas fa-stream'   style='font-size:24px'></i>
                     <p>Accueil</p>
                 </a>
             </li>
             <li>
                 <a href="modifier_amdin.php">
                     <i  class='fas fa-stream' style='font-size:24px'></i>
                     <p>modifier profile</p>
                 </a>
             </li>
             <li>
                 <a href="ajouter_compte.php">
                     <i  class='fas fa-stream' style='font-size:24px'></i>
                     <p>AJOUTER UN COMPTE</p>
                 </a>
             </li>
             <li>
                 <a href="page_supprimer_compte.php">
                     <i  class='fas fa-stream' style='font-size:27px'></i>
                     <p>SUPPRIMER UN COMPTE</p>
                 </a>
             </li>
             <li>
                 <a href="page_modifier.php">
                     <i  class='fas fa-stream' style='font-size:24px'></i>
                     <p>MODIFIER UN COMPTE</p>
                 </a>
                 <?php  if($read == 0) : ?>
             </li>
             <li>
                 <a href="tirage.php">
                     <i class='fas fa-stream' style="font-size:30px"></i>
                     <p>LANCER TIRAGE</p>
                 </a>
             </li>
             <?php else : ?>
             </li>
             <li>
                 <a href="Afficher_affectation.php">
                     <i class='fas fa-stream' style="font-size:30px"></i>
                     <p>LES SUJETS AFFECTES</p>
                 </a>
             </li>
             <?php endif ?>
             </li>
             <li>
                 <a href="afficher_binome.php">
                     <i class='fas fa-stream' style="font-size:30px"></i>
                     <p>AFFICHER LES BINOMES</p>
                 </a>
             </li>
             </li>
             <li>
                 <a href="afficherEtudiants.php">
                     <i class='fas fa-stream' style="font-size:30px"></i>
                     <p>LES ETUDIDANTS SANS BINOME</p>
                 </a>
             </li>





         </ul>
     </div>
 </div>