<?php 
require '../etudiant/Classes.php';
include_once '../professeurPages/Class_prof.php';
session_start();
if(empty($_SESSION['professeur'])){
    header("location:http://localhost/MonPFA/home/login.php");
}
$prof=$_SESSION['professeur'];
// $connect = mysqli_connect("localhost","root","","pfa");
// $qr = "SELECT * FROM binome WHERE cin_enc = '$prof->cin'";
// $res = mysqli_query($connect,$qr);
// $elemt = mysqli_fetch_assoc($res);
// $managerCR = new ManagerCompteRendu(fct_bdd());
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>la PAGE ENCADRANT</title>


    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="CSS/bootstrap.min.css" rel="stylesheet" />
    <!-- style CSS     -->
    <link href="CSS/style.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="CSS/light-bootstrap-dashboard.css" rel="stylesheet" />
    <link href="https://www.stagiaires.ma/assets/css/plugins/switchery/switchery.css" rel="stylesheet">


    <!--     Fonts and icons     -->
    <link href="CSS/pe-icon-7-stroke.css" rel="stylesheet" />
    <!--fonte obligatoire-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="CSS/styleSwitch.css" rel="stylesheet" />
    <link href="CSS/navbr.css" rel="stylesheet" />
    <style>
    body {

        background-image: url("img/q.png");

    }
    </style>
</head>

<body>

    <div class="wrapper">
        <!--    alia_gauche-->
        <?php
            $nomPage = basename(__FILE__);
            require 'menu.php'; 
            ?>


        <div class="main-panel">
            <!-- body -->
            <!-- ## Start : inchengeable -->
            <?php
                $nomPage = basename(__FILE__);
                require 'nav.php'; 
                ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs  nav-justified">

                                        <li><a data-toggle="tab">Visualiser les Comptes rendus</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active">
                                            <br>

                                        </div>
                                        <br>
                                        <div class="panel panel-primary">
                                        <h1 style="margin-left: 30%">COMPTES RENDUS</h1>
                                            <div class="panel-heading">
                                                <i class="fa fa-group  fa-fw"></i> Comptes rendus
                                            </div>
                                            <div class="panel-body">
                                                <form action="" method="post">

                                                    <?php 
                                                    $connect = mysqli_connect("localhost","root","","pfa");
                                                    $qr = "SELECT * FROM binome WHERE cin_enc = '$prof->cin'";
                                                    $res = mysqli_query($connect,$qr);
                                                    $managerCR = new ManagerCompteRendu(fct_bdd());
                                                    $i=1;
                                                    while ($row = mysqli_fetch_assoc($res)):
                                                    $CRs = $managerCR->fct_findAllByUser($row['id']);
                                                    $q1 = "SELECT *  FROM etudiant where cne = '".$row['cne1']."'";
                                                    $v1 = mysqli_fetch_assoc(mysqli_query($connect, $q1));
                                                    $q2 = "SELECT *  FROM etudiant where cne = '".$row['cne2']."'";
                                                    $v2 = mysqli_fetch_assoc(mysqli_query($connect, $q2));
                                                    $nom1 = $v1['nom']; $prenom1 = $v1['prenom'];
                                                    $nom2 = $v2['nom']; $prenom2 = $v2['prenom'];?>
                                                    <div class="table-responsive">
                                                        <label>Binome
                                                            <?php echo $i.": ".$nom1." ".$prenom1." et ".$nom2." ".$prenom2; $i++;?></label>
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Date</th>
                                                                    <th>Liens</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                        foreach($CRs as $cr){
                                                                            echo "<tr>";
                                                                            echo "<td>".$cr['date_cr']."</td>";
                                                                            $id_cr = $cr['id'];
                                                                            //var_dump($id_cr);
                                                                            echo "<td><a class='btn btn-outline-primary' href='../etudiant/Compte_Rendu/Telecharger_cr.php?id=$id_cr'>Telecharger</a>
                                                                            </td>";
                                                                            echo "</tr>";
                                                                        }
                                                                    ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <?php endwhile ?>

                                                </form>


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