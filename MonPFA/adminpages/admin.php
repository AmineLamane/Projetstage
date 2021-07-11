<?php 
include_once '../adminpages/Class_admin.php';
session_start();
if(!isset($_SESSION['admin'])){
    header("location:http://localhost/MonPFA/home/login.php");
}
$admin=$_SESSION['admin'];
$link2 = mysqli_connect("localhost","root","","pfa");
$q1 = "SELECT *  FROM etudiant ";
$r1 = mysqli_query($link2, $q1);

$q2 = "SELECT *  FROM professeur ";
$r2 = mysqli_query($link2, $q2);
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
    <style> 
#rcorners1 {
  border-radius: 25px;
  background: #73AD21;
  padding: 20px; 
  width: 200px;
  height: 150px;  
}

#rcorners2 {
  border-radius: 25px;
  border: 2px solid #73AD21;
  padding: 600px; 
  width: 1000px;
  height: 150px;  
}

#rcorners3 {
  border-radius: 25px;
  background: url(paper.gif);
  background-position: left top;
  background-repeat: repeat;
  padding: 20px; 
  width: 200px;
  height: 150px;  
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
            <!-- # End.        -->

            <div class="content" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" >
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <!-- Nav tabs -->

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="indexe">
                                            <br>
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <i class="pe-7s-next-2" style="margin-left: 40%"></i> LISTES DES ETUDIANTS
                                                </div>
                                                <div class="panel-body">
                                                    <form action="" method="post">
                                                        <div class="table-responsive ">
                                                            <table class="table table-hover table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nom </th>
                                                                        <th>cne</th>
                                                                        <th>Adresse email</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                            // pour chaque ligne (chaque enregistrement)
                                                                            while($row3 = mysqli_fetch_assoc($r1)){

                                                                                // DONNEES A AFFICHER dans chaque cellule de la ligne
                                                                        ?>
                                                                    <tr>
                                                                        <td><?php echo $row3['nom'].' '.$row3['prenom']; ?>
                                                                        </td>
                                                                        <td><?php echo $row3['cne']; ?></td>
                                                                        <td><?php echo $row3['email']; ?></td>
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

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="indexe">
                                            <br>
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <i class="pe-7s-next-2" style="margin-left: 40%"></i> LISTES DES ENCADRANT
                                                </div>
                                                <div class="panel-body">
                                                    <form action="" method="post">
                                                        <div class="table-responsive ">
                                                            <table class="table table-hover table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nom </th>
                                                                        <th>cin</th>
                                                                        <th>Adresse email</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                           ,                         <?php
                                                                            // pour chaque ligne (chaque enregistrement)
                                                                            while($row2 = mysqli_fetch_assoc($r2)){

                                                                                // DONNEES A AFFICHER dans chaque cellule de la ligne
                                                                        ?>
                                                                    <tr>
                                                                        <td><?php echo $row2['nom'].' '.$row2['prenom']; ?>
                                                                        </td>
                                                                        <td><?php echo $row2['cin']; ?></td>
                                                                        <td><?php echo $row2['email']; ?></td>
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
                                                    <i class="fa fa-group  fa-fw"></i> panel 2
                                                </div>
                                                <div class="panel-body">

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>

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