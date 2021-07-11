<?php 
include_once '../adminpages/Class_admin.php';
session_start();
if(empty($_SESSION['admin'])){
    header("location:http://localhost/MonPFA/home/login.php");
}
$admin=$_SESSION['admin'];

    $link = mysqli_connect("localhost","root","","pfa");
    $query = "SELECT * FROM binome";
    $r = mysqli_query($link,$query);
    //$numM = mysqli_num_rows($r);
   
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>la PAGE DIRECTEUR</title>


    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="CSS/bootstrap.min.css" rel="stylesheet" />
    <!-- style CSS     -->
    <link href="CSS/style.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="CSS/light-bootstrap-dashboard.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="CSS/pe-icon-7-stroke.css" rel="stylesheet" />
    <!--fonte obligatoire-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="CSS/navbr.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <?php

?>

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
            <!-- # End.        -->

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <!-- Nav tabs -->

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="indexe">
                                            <br>
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <i class="pe-7s-next-2" style="margin-left: 30%"></i> LES BINOMES
                                                </div>
                                                <div class="panel-body">
                                                    <form action="" method="post">
                                                        <div class="table-responsive ">
                                                            <table class="table table-hover table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Premier etudiant </th>
                                                                        <th>cne</th>
                                                                        <th>Deuxieme etudiant</th>
                                                                        <th>cne</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
	// pour chaque ligne (chaque enregistrement)
    while($row1 = mysqli_fetch_assoc($r)){
        $cn1 = $row1['cne1'];
        $cn2 = $row1['cne2'];     
        $sql1 = "SELECT *  FROM etudiant where cne = '".$cn1."' ";
        $valeur1 = mysqli_fetch_assoc(mysqli_query($link, $sql1));
        $sql2 = "SELECT *  FROM etudiant where cne = '".$cn2."' ";
        $valeur2 = mysqli_fetch_assoc(mysqli_query($link, $sql2));
		// DONNEES A AFFICHER dans chaque cellule de la ligne
?>
                                                                    <tr>
                                                                        <td><?php echo $valeur1['nom'].' '.$valeur1['prenom']; ?>
                                                                        </td>
                                                                        <td><?php echo $valeur1['cne']; ?></td>
                                                                        <td><?php echo $valeur2['nom'].' '.$valeur2['prenom']; ?>
                                                                        </td>
                                                                        <td><?php echo $valeur2['cne']; ?></td>
                                                                    </tr>
                                                                    <?php
	} // fin foreach
?>
                                                                </tbody>
                                                            </table>




                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nonIndexe">
                                            <br>
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <i class="fa fa-group  fa-fw"></i> panel 1
                                                </div>
                                                <div class="panel-body">

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
<script src="JS/jquery.3.2.1.min.js" type="text/javascript"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="JS/light-bootstrap-dashboard.js?v=1.4.0"></script>

</html>