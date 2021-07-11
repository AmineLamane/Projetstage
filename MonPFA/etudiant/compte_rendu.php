<?php 
require 'Classes.php';

session_start();
if(empty($_SESSION['etudiant'])){
    header("location:http://localhost/MonPFA/home/login.php");
}
$etudiant = $_SESSION['etudiant'];
$link1 = mysqli_connect("localhost","root","","pfa");
$query1 = "SELECT * FROM binome WHERE cne1 = '$etudiant->cne' OR cne2 = '$etudiant->cne'";
$r1 = mysqli_query($link1,$query1);
$elemt1 = mysqli_fetch_assoc($r1);
$managerCR = new ManagerCompteRendu(fct_bdd());
$CRs = $managerCR->fct_findAllByUser($elemt1['id']);
if(isset($_POST['importer'])){
    $etudiant = $_SESSION['etudiant'];
    $targetfolder = "Compte_Rendu/";
    
    $targetfolder = $targetfolder . basename( $_FILES['fileToUpload']['name']) ;
    
    $ok=1;
    
    $file_type=$_FILES['fileToUpload']['type'];
    
    if ($file_type=="application/pdf") {
        
        if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetfolder)) {
            $etudiantManager = new ManagerEtudiant(fct_bdd());
            $crManager = new ManagerCompteRendu(fct_bdd());
            $cin = $etudiantManager->fct_findEncadrant($elemt1['id']);
            $date_cr = date('l j F Y, H:i');//date("Y-m-d H:i:s");
            $cr = ClasseCompteRendu::construct3($date_cr, basename( $_FILES['fileToUpload']['name']), $cin[0], $elemt1['id']);
            $crManager->fct_insert($cr);
            $CRs = $managerCR->fct_findAllByUser($elemt1['id']);
            echo "<script>alert('le fichier est charge avec succes')</script>";
        }
        else {
            echo "<script>alert('Probleme dans le chargement')</script>";
        }
    }
    else {
        echo "<script>alert('seulement les fichier PDF')</script>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>ENSIAS Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- style CSS     -->
    <link href="CSS/style.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="css/light-bootstrap-dashboard.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />
    <!--fonte obligatoire-->
    <link href="CSS/navb.css" rel="stylesheet" />
</head>

<body>

    <div class="wrapper">
        <!-- ## start  : inclure le menu -->
        <?php
$nomPage = basename(__FILE__);
require 'menu.php'; 
?>
        <!-- # End. -->


        <div class="main-panel">
            <!-- body -->
            <!-- ## Start : inchengeable -->
            <?php
$nomPage = basename(__FILE__);
require 'nav.php'; 
?>
            <!-- # End.        -->


            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs  nav-justified">
                                    <h2 style="margin-left: 40%"> <kbd>COMPTE RENDU </kbd></h2>
                                        
                                        <li class="active"> <a data-toggle="tab" href="#indexe">Importer le compte
                                                rendu</a></li>
                                        <li><a data-toggle="tab" href="#nonIndexe">Visulaiser les Comptes rendus</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="indexe">
                                            <br>
                                            <form class="form-inline" action="" method="post"
                                                enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="email">Choisissez le fichier:</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="file" name="fileToUpload" id="fileToUpload"
                                                        class="btn btn-default">
                                                </div>
                                                <button type="submit" name="importer" class="btn btn-default">Importer
                                                    fichier</button>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="nonIndexe">
                                            <br>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <i class="fa fa-group  fa-fw"></i> panel 1
                                                </div>
                                                <div class="panel-body">
                                                    <form action="" method="post">

                                                        <div class="table-responsive ">
                                                            <table class="table table-hover table-bordered">
                                                                <thead>
                                                                    <th>Date</th>
                                                                    <th>Lien</th>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                        foreach($CRs as $cr){
                                                                            echo "<tr>";
                                                                            echo "<td>".$cr['date_cr']."</td>";
                                                                            $id_cr = $cr['id'];
                                                                            //var_dump($id_cr);
                                                                            echo "<td><a class='btn btn-outline-primary' href='Compte_Rendu/Telecharger_cr.php?id=$id_cr'>Telecharger</a>
                                                                            </td>";
                                                                            echo "</tr>";
                                                                        }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                    <!-- /.panel -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                    </nav>
                    <p class="copyright">
                    <h8>____ Ecole Nationale Supérieure d’Informatique et d’Analyse des Systèmes ____________________________________________________________________________________________________________________                         .</h8>         &copy; 2021
                    </p>
                </div>
            </footer>


        </div>
    </div>


</body>

<!--   Core JS Files   -->
<script src="js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="js/light-bootstrap-dashboard.js?v=1.4.0"></script>

</html>